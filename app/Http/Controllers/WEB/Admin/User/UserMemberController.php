<?php

namespace App\Http\Controllers\WEB\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\CreateMemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;
use App\Models\Auth\Role;
use App\Models\User;
use App\Models\User\Member;
use App\Models\Wilayah\Kecamatan;
use App\Models\Wilayah\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class UserMemberController extends Controller
{
    protected $user;
    protected $role;

    protected $member;

    public function __construct(User $user, Role $role, Member $member)
    {
        $this->user = $user;
        $this->role = $role;
        $this->member = $member;
    }

    public function index(Request $request)
    {
        $title = 'Member';
        $breadcrumb = 'Pengguna';
        $breadcrumb_active = 'Member';
        $search = $request->input('search');

        $query = Member::with('user.getAkses');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $member = $query->paginate(10);

        return view('admin.pages.user.member.index', compact('title', 'breadcrumb', 'breadcrumb_active', 'member'));
    }

    public function create()
    {
        try {
            $getProvinsi = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
            $provinsi = $getProvinsi->json();
        } catch (\Exception $e) {
            Alert::warning('Gagal mengambil data provinsi');
            $provinsi = [];
        }

        $data = [
            'title' => 'Member',
            'breadcrumb' => 'Member',
            'breadcrumb_active' => 'Tambah Member',
            'button_create' => 'Tambah Member',
            'card_title' => 'Tambah Member',
            'provinsi' => $provinsi,
        ];

        return view('admin.pages.user.member.create', $data);
    }

    public function store(CreateMemberRequest $request)
    {
        try {
            DB::beginTransaction();

            $imageExtension = $request->file('image')->getClientOriginalExtension();
            $imageName = 'member_' . (count(File::files(public_path('image_member'))) + 1) . '.' . $imageExtension;
            $imagePath = 'image_member/' . $imageName;

            $request->file('image')->move(public_path('image_member'), $imageName);

            $user = $this->user->create([
                'name' => str_replace(' ', '', $request->nama_depan . $request->nama_belakang),
                'email' => $request->email,
                'password' => bcrypt('password'),
                'role_id' => 2,
            ]);

            $this->member->create(array_merge($request->all(), [
                'user_id' => $user->id,
                'image' => $imagePath,
            ]));

            DB::commit();

            Alert::success('success', 'Success Data Anda Berhasil Ditambahkan!');
            session()->flash('success', 'Data Anda Berhasil Ditambahkan!');
            return redirect('/admin/pengguna/member')->with('success', 'Data Anda Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // Tampilkan pesan error
            Alert::error('Error', 'Error Data Gagal Ditambahkan!' . $e->getMessage());
            session()->flash('error', 'Data Anda Gagal Ditambahkan!');
            return back()->with('error', 'Data Anda Gagal Ditambahkan!');
        }
    }

    public function edit($id)
    {
        try {
            $getProvinsi = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
            $provinsi = $getProvinsi->json();
        } catch (\Exception $e) {
            Alert::warning('Gagal mengambil data provinsi');
            $provinsi = [];
        }

        $data = [
            'member' => $this->member->findOrFail($id),
            'provinsi' => $provinsi,
        ];
        return view('admin.pages.user.member.update', $data);
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'jenis_kelamin' => 'required|string|in:pria,wanita',
            'alamat_utama' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ]);

        $user = Auth::user();

        $member->update([
            'user_id' => $user->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_utama' => $request->alamat_utama,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect('admin/pengguna/member')->with('success', 'Success Data Anda Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $member = $this->member->findOrFail($id);

            $imagePath = public_path('image_member/' . basename($member->image));
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $member->delete();
            $member->user->delete();

            DB::commit();

            Alert::success('success', 'Success Data Berhasil Dihapus!');
            return redirect('/admin/pengguna/member')->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Error', 'Error Data Gagal Dihapus!' . $e->getMessage());
            return back()->with('error', 'Data Gagal Dihapus!');
        }
    }

    public function verify($id, Request $request)
    {
        $member = Member::findOrFail($id);
        $member->status = $request->input('status');
        $member->save();

        return redirect()->back()->with('success', 'Member verification status updated successfully.');
    }
}
