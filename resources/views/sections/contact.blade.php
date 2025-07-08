<section class="bg-indigo-50 py-16 text-gray-800 w-full px-24">
    <div class="max-w-full mx-auto">
        <div class="bg-white rounded-2xl shadow-lg p-8 text-left space-y-6">

            <!-- Kontak Info -->
            <div class=" flex items-center  gap-x-2">
                <!-- Judul & Deskripsi -->
                <div class="text-start w-2/4">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-indigo-700 mb-4">
                        {{ $contact->title }}
                    </h2>
                    <div class="text-lg text-gray-700">
                        {!! $contact->subtitle !!}
                    </div>
                </div>

                <!-- Alamat -->
                <div class="flex items-start w-1/4 space-x-4">
                    <div class="text-xl"><i class="fa fa-location-dot text-red-500"></i></div>
                    <div>
                        <p class="text-gray-700">
                            {{ $contact->address }}
                        </p>
                    </div>
                </div>

                <!-- Kontak Sosial -->
                <div class="flex flex-col w-1/4  items-start">
                    @foreach ($contact->social_media as $media)
                        <div class="flex items-start space-x-4 mb-2">
                            <div class="text-xl">
                                <i
                                    class="{{ $media['icon'] }} {{ str_contains($media['icon'], 'phone') ? 'text-green-500' : 'text-red-500' }}"></i>
                            </div>
                            <div>
                                @if (str_contains($media['name'], '@'))
                                    <p class="text-gray-700">
                                        <a href="mailto:{{ $media['name'] }}" class="text-indigo-600 hover:underline">
                                            {{ $media['name'] }}
                                        </a>
                                    </p>
                                @elseif (preg_match('/[0-9]{8,}/', $media['name']))
                                    <p class="text-gray-700">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $media['name']) }}"
                                            class="text-indigo-600 hover:underline" target="_blank">
                                            {{ trim($media['name']) }}
                                        </a>
                                    </p>
                                @else
                                    <p class="text-gray-700">{{ $media['name'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Footer / Hak Cipta -->
            <div class="border-t pt-6 text-center text-sm text-gray-500">
                Hak Cipta: © {{ now()->year }} <span class="font-medium text-gray-700">PT. Bahtera Hasanah
                    Agung</span>. Seluruh Hak Dilindungi.
            </div>
        </div>
    </div>
</section>
