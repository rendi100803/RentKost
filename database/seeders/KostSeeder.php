<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Rules;
use App\Models\Kost;
use App\Models\Review;
use App\Models\User;
use App\Models\User\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('role_id', 2)->first();
        $member = Member::where("user_id", $user->id)->first();
        $Kost = Kost::create([
            "foto1" => 'https://static.mamikos.com/uploads/cache/data/style/2023-06-27/uhlPPO8g-360x480.jpg',
            "foto2" => 'https://static.mamikos.com/uploads/cache/data/style/2023-06-27/oAJ6IVJ1-360x480.jpg',
            "foto3" => (""),
            "judul" => "Kost Singgahsini Abc Sukakarya Tipe B Sukajadi Bandung M6BY19C7",
            "tag" => "kost campur",
            "user_id" => $member->id,
            "cerita_pemilik" => "Kost ini terdiri dari 3 lantai. Tipe kamar B berada di setiap lantainya dengan jendela menghadap ke arah koridor.

            Apabila Anda membutuhkan bantuan, Anda dapat menghubungi penjaga yang bertugas dari pukul 07.00-22.00 WIB.

            Informasi fasilitas:
            Daya listrik : 450 VA (Pascabayar)
            Sumber air : Sumur
            Wifi : Indihome - 60 Mbps
            Kapasitas parkir : 10 motor

            Biaya tambahan:
            Bisa BERDUA +700 Ribu

            Kost ini berlokasi 400 meter dari jalan raya dengan akses yang dapat dilalui oleh mobil, berlokasi 4 menit dari Universitas Kristen Maranatha dan 11 menit dari Mall PVJ Bandung.",
            "ketentuan_pengajuan_sewa" => "Bisa bayar DP (uang muka) dulu

            Biaya DP adalah 30% dari biaya yang dipilih.",
            "harga" => "550000",
            "alamat_utama" => "Kecamatan Ngaglik, Kabupaten Sleman, Jogja"
        ]);

        Facility::create([
            "kost_id" => $Kost->id,
            "type" => "Fasilitas Umum",
            "facility" => "- wifi
            - CCTV
            - Dapur"

        ]);

        Facility::create([
            "kost_id" => $Kost->id,
            "type" => "Fasilitas Parkir",
            "facility" => "- Parkir Motor
            - Parkir Mobil"

        ]);

        Facility::create([
            "kost_id" => $Kost->id,
            "type" => "Fasilitas Kamar Mandi",
            "facility" => "- R. Cuci
            - R. Jemur
            - K. Mandi Luar"

        ]);

        Rules::create([
            "kost_id" => $Kost->id,
            "type" => "Peraturan di kos ini",
            "rule" => "- Tamu menginap dikenakan biaya
            - Dilarang bawa hewan
            - Denda kerusakan barang kos
            - Maks. 2 orang/ kamar
            - Ada jam malam untuk tamu",
        ]);

        Review::create([
            "kost_id" => $Kost->id,
            "user_id" => $user->id,
            "review" => "enak kost nya, lingkungannya pun enak, strategis pulaaaa",
        ]);
    }
}
