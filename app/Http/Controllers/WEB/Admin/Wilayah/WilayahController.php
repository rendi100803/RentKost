<?php

namespace App\Http\Controllers\WEB\Admin\Wilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    public function getKota(Request $request)
    {
        $id_provinsi = $request->provinsi;

        $res_kota_kab = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/" . $id_provinsi . ".json");

        $kota_kab = $res_kota_kab->json();

        foreach ($kota_kab as $data) {
            echo "<option value='" . $data['id'] . "'>" . $data['name'] . "</option>";
        }
    }

    public function getKecamatan(Request $request)
    {
        $id_kota_kab = $request->kota_kab;

        $res_kecamatan = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/" . $id_kota_kab . ".json");

        $kecamatan = $res_kecamatan->json();

        foreach ($kecamatan as $data) {
            echo "<option value='" . $data['id'] . "'>" . $data['name'] . "</option>";
        }
    }
}
