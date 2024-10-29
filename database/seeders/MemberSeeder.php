<?php

namespace Database\Seeders;

use App\Models\Kost;
use App\Models\User;
use App\Models\User\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('role_id', 2)->first();

        DB::table('members')->insert([
            [
                'user_id' => $user->id,
                'nama_depan' => 'Shanna',
                'nama_belakang' => 'Steuber',
                'jenis_kelamin' => 'pria',
                'tanggal_lahir' => '1990-01-01',
                'alamat_utama' => 'Jl. Raya No. 123',
                'provinsi' => 'Jawa Tengah',
                'kota' => 'Tegal',
                'kecamatan' => 'Tegal',
                'kode_pos' => 12345,
                'no_telp' => '081234567890',
                'image' => 'default.jpg',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
