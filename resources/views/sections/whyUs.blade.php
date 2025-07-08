<section class="bg-white py-20 px-6 text-gray-800 w-full">
    <div class="max-w-6xl mx-auto">
        <!-- Judul -->
        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-extrabold text-indigo-600">
                Alasan Memilih PT. Bahtera Hasanah Agung
            </h2>
        </div>

        <!-- Card Why Us -->
        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($whyus as $item)
                @php
                    $colorMap = [
                        'green' => 'bg-green-100 text-green-600',
                        'blue' => 'bg-blue-100 text-blue-600',
                        'yellow' => 'bg-yellow-100 text-yellow-600',
                        'red' => 'bg-red-100 text-red-600',
                        'indigo' => 'bg-indigo-100 text-indigo-600',
                        'gray' => 'bg-gray-100 text-gray-600',
                        'grey' => 'bg-gray-100 text-gray-600',
                    ];
                    $colorClass = $colorMap[strtolower($item->color)] ?? 'bg-gray-100 text-gray-600';
                @endphp

                <div
                    class="bg-white rounded-xl shadow-lg p-6 flex items-start gap-5 hover:shadow-xl transition duration-300">
                    <div class="{{ $colorClass }} p-4 rounded-full text-xl flex-shrink-0">
                        <i class="{{ $item->icon }}"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-1">{{ $item->title }}</h3>
                        <p class="text-gray-600">{{ $item->desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
