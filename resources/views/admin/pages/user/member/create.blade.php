@extends('index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tambah Member</h2>
                    </div>
                    <div>
                        <a href="{{ url('admin/pengguna/member') }}"
                            class="bg-gray-400 px-3 py-2 rounded-lg hover:bg-gray-500 text-white">Kembali</a>
                    </div>
                </div>
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-blue-400">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        <ul class="font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-lg shadow p-6 mt-3">
                <form class="needs-validation" id="formMember" action="{{ url('/admin/pengguna/member') }}"
                    enctype="multipart/form-data" method="POST" novalidate>
                    @csrf
                    <div class="mb-4">
                        <label for="imageInput"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambahkan Foto
                            Anda</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="file" id="imageInput" accept="image/*" name="image">
                        @error('imageInput')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="validationCustom011">Nama Depan</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="validationCustom011" name="nama_depan" value="{{ old('nama_depan') }}" required>
                            @error('nama_depan')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="validationCustom12">Nama Belakang</label>
                            <input type="text" name="nama_belakang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="validationCustom12" value="{{ old('nama_belakang') }}" required>
                            @error('nama_belakang')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <di class="mb-4"v>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="validationCustom011">Email</label>
                            <input type="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="validationCustom011" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </di>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="validationCustom12">
                                Tanggal Lahir
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="bi bi-calendar-date text-gray-500 dark:text-gray-400"></i>
                                </div>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 fc-datepicker"
                                    id="datepicker-date" placeholder="MM/DD/YY" name="tanggal_lahir" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="validationCustom011">No Telepon</label>
                            <input type="number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="validationCustom011" name="no_telp" value="{{ old('no_telp') }}" required>
                            @error('no_telp')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin
                            </div>
                            <label
                                class="custom-control custom-radio block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                <input type="radio" class="custom-control-input" name="jenis_kelamin" value="pria"
                                    checked>
                                <span class="custom-control-label">Pria</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="jenis_kelamin" value="wanita">
                                <span class="custom-control-label">Wanita</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <select name="provinsi" id="provinsi"
                                class="form-control form-select select2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">--pilih--</option>
                                @foreach ($provinsi as $item)
                                    <option data-tokens="{{ $item['name'] }}" value="{{ $item['id'] }}">
                                        {{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                            <select name="kota" id="kota_kab"
                                class="form-control form-select select2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- pilih --</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan"
                                class="form-control form-select select2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- pilih --</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-2 mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail
                            Alamat</label>
                        <textarea style="resize: none"
                            class="content bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="alamat_utama"></textarea>
                    </div>
                    <div class="grid grid-cols-1 gap-2 mb-4">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="validationCustom011">Kode Pos</label>
                            <input type="number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="validationCustom011" name="kode_pos" value="{{ old('kode_pos') }}" required>
                            @error('kode_pos')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                let provinsi = $("#provinsi").val(); // Mengambil nilai kota/kabupaten yang dipilih
                $.ajax({
                    url: "{{ url('/admin/wilayah/getKota') }}",
                    type: "GET",
                    data: {
                        provinsi: provinsi
                    },
                    success: function(res) {
                        $("#kota_kab").html(res);
                    },
                    error: function(xhr, status, error) {
                        swal.fire({
                            icon: 'error',
                            title: 'Gagal Mengambil Data',
                            text: 'Terjadi kesalahan saat mengambil data kota/kabupaten: ' +
                                error
                        });
                    }
                });
            });

            $("#kota_kab").change(function() {
                let kota_kab = $("#kota_kab").val();
                $.ajax({
                    url: "{{ url('/admin/wilayah/getKecamatan') }}",
                    type: "GET",
                    data: {
                        kota_kab: kota_kab
                    },
                    success: function(res) {
                        $("#kecamatan").html(res);
                    },
                    error: function(xhr, status, error) {
                        swal.fire({
                            icon: 'error',
                            title: 'Gagal Mengambil Data',
                            text: 'Terjadi kesalahan saat mengambil data kecamatan: ' +
                                error
                        });
                    }
                });
            });
            $('#datepicker-date').datepicker({
                format: 'mm/dd/yyyy', // Format tanggal yang diinginkan
                autoclose: true,
                todayHighlight: true,
                orientation: "bottom"
            });
            $('#imageInput').change(function(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    $('#preview-image').attr('src', dataURL);
                };
                reader.readAsDataURL(input.files[0]);
            });

            // $('#formMember').submit(function(event) {
            //     event.preventDefault();
            //     var formData = new FormData($(this)[0]);

            //     $.ajax({
            //         url: $(this).attr('action'),
            //         type: 'POST',
            //         data: formData,
            //         async: false,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         success: function(response) {
            //             console.log('Sukses:', response);
            //         },
            //         error: function(response) {
            //             console.log('Error:', response);
            //         }
            //     });
            // });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datepicker-date", {
                dateFormat: "m/d/Y",
                altInput: true,
                altFormat: "F j, Y",
                allowInput: true,
                locale: {
                    firstDayOfWeek: 1
                }
            });
        });
    </script>
@endsection
