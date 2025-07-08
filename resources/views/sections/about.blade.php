<section class="py-20 bg-gradient-to-b from-white via-indigo-50 to-white text-gray-800 w-full">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        {{-- Gambar About --}}
        <div class="w-full">
            <img src="{{ asset('storage/' . $about->image) }}" alt="Tentang {{ $about->title }}"
                class="w-full rounded-xl shadow-lg object-cover max-h-[450px]">
        </div>

        {{-- Teks About --}}
        <div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-indigo-700 mb-6 drop-shadow-sm">
                {{ $about->title }}
            </h2>
            <div class="text-gray-700 space-y-6 leading-relaxed text-justify">
                @foreach (explode("\n", $about->desc) as $paragraph)
                    @if (trim($paragraph) !== '')
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</section>
