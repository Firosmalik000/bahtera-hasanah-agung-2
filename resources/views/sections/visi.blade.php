<section class="bg-gradient-to-b from-white via-indigo-50 to-white py-20 px-6 text-gray-800 w-full">
    <div class="max-w-6xl mx-auto">
        <!-- Judul Visi -->
        <div class="text-center mb-10 flex justify-center items-center space-x-2">
            <i class="text-3xl text-indigo-700 fas fa-bullseye"></i>
            <h3 class="text-3xl font-bold text-indigo-700">
                {{ $visi->title }}
            </h3>
        </div>

        <!-- Deskripsi Visi -->
        <div class="mb-16 transition duration-300 hover:shadow-xl">
            <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center">
                {{ $visi->desc }}
            </p>
        </div>
    </div>
</section>
