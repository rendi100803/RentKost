<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Kost;
use App\Models\Reservasi;
use App\Models\Review;
use App\Models\Rules;
use App\Models\User;
use App\Models\User\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.pages.dashboard.index');
    }

    public function profil()
    {
        return view('admin.pages.profil.index');
    }

    public function transaksi()
    {
        $reservasi = Reservasi::with(['user', 'kost'])->paginate(5);

        return view('member.pages.dashboard.reservasi.index', ['reservasi' => $reservasi,]);
    }

    public function dashboard()
    {
        $data['kost'] = Kost::take(6)->get();
        // dd($data);
        return view('home.dashboard.index', $data);
    }

    public function member()
    {
        $hitungkost = Kost::count();
        $hitungreservasi = Reservasi::count();
        return view('member.pages.dashboard', compact('hitungkost', 'hitungreservasi'));
    }

    public function kost(Request $request)
    {
        $query = Kost::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('alamat_utama', 'like', '%' . $request->search . '%')
                ->orWhere('tag', 'like', '%' . $request->search . '%');
        }

        $data['kost'] = $query->paginate(6);
        return view('home.kost.index', $data);
    }

    public function produk($judul)
    {
        $produk = Kost::where('judul', $judul)->firstOrFail();
        $kostId = $produk->id;

        $facilities = Facility::where('kost_id', $kostId)->get();
        $rules = Rules::where('kost_id', $kostId)->get();
        $reviews = Review::where('kost_id', $kostId)->get();
        $allKost = Kost::take(4)->get();

        return view('home.produk.index', compact('produk', 'facilities', 'rules', 'reviews', 'allKost'));
    }

    public function reservasi(Request $request, Reservasi $reservasi)
    {
        // Validasi input
        $request->validate([
            'kost_id' => 'required|exists:kosts,id',
            'start_date' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            Reservasi::create([
                'user_id' => Auth::id(),
                'kost_id' => $request->kost_id,
                'start_date' => $request->start_date,
            ]);
        });

        return redirect()->route('reservasi.success')
            ->with('success', 'Berhasil reservasi kost');
    }

    public function reservasi_success()
    {
        $reservasi = Reservasi::with(['user', 'kost'])->paginate(5);

        return view('home.reservasi_success.index', [
            'reservasi' => $reservasi,
        ]);
    }

    public function info()
    {
        return view('member.pages.dashboard.info.index');
    }

    public function statistik()
    {
        return view('member.pages.dashboard.statistik.index');
    }

    public function cart()
    {
        return view('home.cart.index');
    }

    public function register_member()
    {
        return view('home.registrasi.index');
    }

    public function register_member_submit(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'kost_id' => 'required|exists:kosts,id',
        //     'nama_depan' => 'required|string|max:255',
        //     'nama_belakang' => 'required|string|max:255',
        //     'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
        //     'tanggal_lahir' => 'required|date',
        //     'alamat_utama' => 'required|string|max:255',
        //     'provinsi' => 'required|string|max:255',
        //     'kota' => 'required|string|max:255',
        //     'kecamatan' => 'required|string|max:255',
        //     'kode_pos' => 'required|string|max:255',
        //     'no_telp' => 'required|string|max:15',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $imagePath = $request->file('image')->store('image_member', 'public');

        Member::create([
            'user_id' => auth()->id(),
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_utama' => $request->alamat_utama,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'no_telp' => $request->no_telp,
            'image' => $imagePath,
            'status' => 'belum verifikasi',
        ]);

        return redirect()->route('home.registrasi')->with('success', 'Registrasi Mitra Berhasil.');
    }
}
