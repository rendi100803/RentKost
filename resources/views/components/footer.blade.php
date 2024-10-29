<footer class="bg-gray-200 p-4">
    <div class="container p-3 grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Bagian 1 -->
        <div class="md:col-span-2">
            <h3 class="text-lg font-semibold">Tentang Kami</h3>
            <p class="mt-2 text-sm">Rentkost adalah platform penyedia informasi dan layanan sewa yang dapat membantu
                Anda menemukan kamar kost di sekitar Anda.</p>
        </div>
        <!-- Bagian 2 -->
        <div>
            <h3 class="text-lg font-semibold">Link Penting</h3>
            <ul class="mt-2 space-y-1 text-sm">
                <li><a href="{{ route('dashboard') }}" class="hover:text-blue-500">Beranda</a></li>
                <li><a href="{{ route('kost') }}" class="hover:text-blue-500">Kamar Kost</a></li>
            </ul>
        </div>
        <!-- Bagian 3 -->
        <div>
            <h3 class="text-lg font-semibold">Hubungi Kami</h3>
            <ul class="mt-2 space-y-1 text-sm">
                <li>Email: info@rentkost.com</li>
                <li>Telepon: 123-456-789</li>
                <li>Alamat: Jl. Contoh No. 123</li>
            </ul>
        </div>
    </div>
    <!-- Baris pemisah -->
    <hr class="my-4 border-gray-300">
    <!-- Hak cipta -->
    <div class="text-center text-sm text-gray-600">
        © 2024 Rentkost.com. Hak cipta dilindungi.
    </div>
</footer>
