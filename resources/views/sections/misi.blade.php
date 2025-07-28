<section class="bg-gradient-to-b from-white via-indigo-100 to-white py-20 px-6 text-gray-800 w-full">
    <div class="max-w-6xl mx-auto">
        <!-- Judul Misi + Gambar Header -->
        <div class="text-center mb-10">
            <div class="flex justify-center items-center gap-2 mb-4">
                <i class="text-3xl text-indigo-700 fas fa-lightbulb"></i>
                <h3 class="text-3xl font-bold text-indigo-700">
                    {{ $misi->title }}
                </h3>
            </div>
            @if ($misi->image)
                <img src="{{ asset('storage/' . $misi->image) }}" alt="{{ $misi->title }}"
                    class="mx-auto rounded-xl shadow-md  max-h-[300px] object-contain">
            @endif
        </div>

        <!-- Daftar Misi -->
        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($misi->data as $item)
                @php
                    $borderColor = match ($item['color']) {
                        'red' => 'border-red-500',
                        'blue' => 'border-blue-500',
                        'green' => 'border-green-500',
                        'yellow' => 'border-yellow-500',
                        default => 'border-gray-500',
                    };

                @endphp

                <div
                    class="bg-white rounded-xl shadow-md p-6 flex items-start gap-4 hover:shadow-lg transition border-l-4 {{ $borderColor }}">

                    <div class="text-3xl text-{{ $item['color'] }}-500">
                        <i class="{{ $item['icon'] }}"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold mb-1">{{ $item['title'] }}</h4>
                        <p class="text-gray-700">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
