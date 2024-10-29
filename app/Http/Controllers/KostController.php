<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Kost;
use App\Models\Produk\Category;
use App\Models\Rules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KostController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $kosts = Kost::where('user_id', $userId)->get();
        return view("member.pages.kelola.produk.index", compact('kosts'));
    }

    public function create()
    {
        $tags = Kost::TAGS;
        return view("member.pages.kelola.produk.create", compact('tags'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'foto1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string',
            'tag' => 'required|in:kost putra,kost putri,kost campur',
            'cerita_pemilik' => 'required|string',
            'ketentuan_pengajuan_sewa' => 'required|string',
            'harga' => 'required|numeric',
            'alamat_utama' => 'required|string',
            'facilities.*.type' => 'required|in:Fasilitas Umum,Fasilitas Parkir,Fasilitas Kamar Mandi',
            'facilities.*.facility' => 'required|string',
            'rules.*.type' => 'required|string',
            'rules.*.rule' => 'required|string',
        ]);

        // Begin transaction
        DB::beginTransaction();

        try {
            // Simpan file foto
            $foto1 = $request->file('foto1')->move('foto_kost/', time() . '_' . $request->file('foto1')->getClientOriginalName());
            $foto2 = $request->file('foto2') ? $request->file('foto2')->move('foto_kost/', time() . '_' . $request->file('foto2')->getClientOriginalName()) : null;
            $foto3 = $request->file('foto3') ? $request->file('foto3')->move('foto_kost/', time() . '_' . $request->file('foto3')->getClientOriginalName()) : null;

            $userId = auth()->id();

            // Simpan data kost
            $kost = Kost::create([
                'user_id' => $userId,
                'foto1' => $foto1,
                'foto2' => $foto2,
                'foto3' => $foto3,
                'judul' => $request->judul,
                'tag' => $request->tag,
                'cerita_pemilik' => $request->cerita_pemilik,
                'ketentuan_pengajuan_sewa' => $request->ketentuan_pengajuan_sewa,
                'harga' => $request->harga,
                'alamat_utama' => $request->alamat_utama
            ]);

            // Simpan data fasilitas
            if ($request->has('facilities')) {
                foreach ($request->input('facilities') as $facility) {
                    Facility::create([
                        'kost_id' => $kost->id,
                        'type' => $facility['type'],
                        'facility' => $facility['facility'],
                    ]);
                }
            }

            // Simpan data aturan
            if ($request->has('rules')) {
                foreach ($request->input('rules') as $rule) {
                    Rules::create([
                        'kost_id' => $kost->id,
                        'type' => $rule['type'],
                        'rule' => $rule['rule'],
                    ]);
                }
            }

            // Commit transaction
            DB::commit();

            return redirect()->route('member.produk.create')->with('success', 'Data kost berhasil ditambahkan');
        } catch (\Exception $e) {
            // Rollback jika ada error
            DB::rollback();

            return redirect()->route('member.produk.create')->with('error', 'Data kost gagal ditambahkan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $kost = Kost::findOrFail($id);
        $tags = Kost::TAGS;
        return view('member.pages.kelola.produk.edit', compact('kost', 'tags'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|string',
            'tag' => 'required|in:kost putra,kost putri,kost campur',
            'cerita_pemilik' => 'required|string',
            'ketentuan_pengajuan_sewa' => 'required|string',
            'harga' => 'required|numeric',
            'alamat_utama' => 'required|string',
            'facilities.*.type' => 'nullable|in:Fasilitas Umum,Fasilitas Parkir,Fasilitas Kamar Mandi',
            'facilities.*.facility' => 'nullable|string',
            'rules.*.type' => 'nullable|string',
            'rules.*.rule' => 'nullable|string',
        ]);

        // Mulai transaction
        DB::beginTransaction();

        try {
            // Ambil data kost berdasarkan id
            $kost = Kost::findOrFail($id);

            // Cek dan update gambar jika ada
            if ($request->hasFile('foto1')) {
                // Hapus foto lama jika ada
                if ($kost->foto1 && file_exists(public_path($kost->foto1))) {
                    unlink(public_path($kost->foto1));
                }
                $foto1 = $request->file('foto1')->move('foto_kost/', time() . '_' . $request->file('foto1')->getClientOriginalName());
                $kost->foto1 = $foto1;
            }
            if ($request->hasFile('foto2')) {
                // Hapus foto lama jika ada
                if ($kost->foto2 && file_exists(public_path($kost->foto2))) {
                    unlink(public_path($kost->foto2));
                }
                $foto2 = $request->file('foto2')->move('foto_kost/', time() . '_' . $request->file('foto2')->getClientOriginalName());
                $kost->foto2 = $foto2;
            }
            if ($request->hasFile('foto3')) {
                // Hapus foto lama jika ada
                if ($kost->foto3 && file_exists(public_path($kost->foto3))) {
                    unlink(public_path($kost->foto3));
                }
                $foto3 = $request->file('foto3')->move('foto_kost/', time() . '_' . $request->file('foto3')->getClientOriginalName());
                $kost->foto3 = $foto3;
            }

            // Update data kost lainnya
            $kost->update([
                'judul' => $request->judul,
                'tag' => $request->tag,
                'cerita_pemilik' => $request->cerita_pemilik,
                'ketentuan_pengajuan_sewa' => $request->ketentuan_pengajuan_sewa,
                'harga' => $request->harga,
                'alamat_utama' => $request->alamat_utama
            ]);

            // Hapus fasilitas lama dan simpan fasilitas baru jika ada
            Facility::where('kost_id', $kost->id)->delete();
            if ($request->has('facilities')) {
                foreach ($request->input('facilities') as $facility) {
                    Facility::create([
                        'kost_id' => $kost->id,
                        'type' => $facility['type'],
                        'facility' => $facility['facility'],
                    ]);
                }
            }

            // Hapus aturan lama dan simpan aturan baru jika ada
            Rules::where('kost_id', $kost->id)->delete();
            if ($request->has('rules')) {
                foreach ($request->input('rules') as $rule) {
                    Rules::create([
                        'kost_id' => $kost->id,
                        'type' => $rule['type'],
                        'rule' => $rule['rule'],
                    ]);
                }
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('member.produk.edit', $kost->id)->with('success', 'Data kost berhasil diperbarui');
        } catch (\Exception $e) {
            // Rollback jika ada error
            DB::rollback();

            return redirect()->route('member.produk.edit', $kost->id)->with('error', 'Gagal memperbarui data kost: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $kost = Kost::findOrFail($id);

        if ($kost->foto1 && file_exists(public_path($kost->foto1))) {
            unlink(public_path($kost->foto1));
        }

        if ($kost->foto2 && file_exists(public_path($kost->foto2))) {
            unlink(public_path($kost->foto2));
        }

        if ($kost->foto3 && file_exists(public_path($kost->foto3))) {
            unlink(public_path($kost->foto3));
        }

        $kost->delete();

        return redirect()->route('member.produk')->with('success', 'Data kost berhasil dihapus');
    }
}
