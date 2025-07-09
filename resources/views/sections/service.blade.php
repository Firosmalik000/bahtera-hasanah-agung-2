<section id="services" class="bg-gray-50 py-20 px-6 text-gray-800 w-full">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold text-indigo-600">
                Layanan yang Kami Tawarkan
            </h2>
            <p class="mt-4 text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                Kami menyediakan berbagai layanan yang dirancang untuk memenuhi kebutuhan proyek dan operasional Anda,
                mulai dari konstruksi hingga tenaga kerja profesional.
            </p>
        </div>

        <!-- Grid Layanan -->
        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-10">
            @foreach ($service as $item)
                @php
                    // Mapping warna dari db ke Tailwind class
                    $colorMap = [
                        'blue' => 'bg-blue-100 text-blue-600',
                        'green' => 'bg-green-100 text-green-600',
                        'yellow' => 'bg-yellow-100 text-yellow-600',
                        'red' => 'bg-red-100 text-red-600',
                        'gray' => 'bg-gray-100 text-gray-600',
                        'grey' => 'bg-gray-100 text-gray-600',
                    ];
                    $colorClass = $colorMap[strtolower($item->color)] ?? 'bg-gray-100 text-gray-600';
                @endphp

                <div
                    class="rounded-2xl p-6 shadow hover:shadow-xl transition duration-300 flex items-start gap-5 {{ $colorClass }}">
                    <div class="p-4 rounded-full text-2xl flex-shrink-0 bg-opacity-20">
                        <i class="{{ $item->icon }}"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                        <p class="text-base leading-relaxed">{{ strip_tags($item->desc) }}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
