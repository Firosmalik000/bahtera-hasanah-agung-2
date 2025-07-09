<section id="home"
    class="relative bg-cover bg-center bg-no-repeat min-h-screen flex items-center justify-center py-32 px-6 text-white bg-white bg-blend-overlay"
    style="background-image: url('{{ asset('storage/' . $hero->image) }}');">

    {{-- Overlay gelap transparan --}}
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    {{-- Konten teks di atas gambar --}}
    <div class="relative z-10 max-w-6xl mx-auto text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 drop-shadow-md">
            {{ $hero->title }}
        </h1>
        <p class="text-lg md:text-xl mb-8 text-gray-200 max-w-3xl mx-auto">
            {{ $hero->desc }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#services"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition shadow">
                Lihat Layanan Kami
            </a>
            <a href="#contact"
                class="bg-white hover:bg-gray-100 text-indigo-600 font-semibold py-3 px-6 rounded-lg transition shadow">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
