<x-app-layout>
    {{-- KONTEN UTAMA HALAMAN --}}
    <div class="overflow-x-hidden">

        <div class="animated-gradient text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20 md:py-32">
                <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight reveal">
                    <span
                        class="bg-gradient-to-r from-yellow-400 to-yellow-600 bg-clip-text text-transparent">PinterIn</span>
                </h1>
                <p class="mt-4 md:mt-6 max-w-2xl mx-auto text-lg md:text-xl text-gray-300 reveal"
                    style="transition-delay: 200ms;">
                    Kuasai keterampilan baru secara efektif dengan metode belajar yang fleksibel. Kurikulum kami
                    dirancang secara ahli dan terstruktur, dari tingkat dasar hingga mahir, untuk memastikan setiap
                    langkah pembelajaran Anda optimal. Dapatkan bimbingan dari mentor berpengalaman dan raih kompetensi
                    praktis yang siap diterapkan untuk membuka peluang karier dan proyek baru Anda.

                </p>
            </div>
        </div>

        <div class="py-20 bg-gray-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 reveal">
                    <h2 class="text-3xl md:text-4xl font-bold text-white">Perjalanan Kami</h2>
                    <p class="text-yellow-500 mt-2">Dari bercanda menjadi mahakarya.</p>
                </div>

                <div class="relative">
                    <div class="hidden md:block absolute w-0.5 h-full bg-gray-700 left-1/2 transform -translate-x-1/2">
                    </div>

                    <div class="mb-8 flex justify-between items-center w-full right-timeline reveal">
                        <div class="hidden md:block w-5/12"></div>
                        <div class="z-20 flex items-center bg-yellow-500 w-8 h-8 rounded-full"></div>
                        <div class="bg-gray-900 glass-card p-6 rounded-lg w-full md:w-5/12">
                            <p class="text-yellow-500 font-semibold">Maret 2025</p>
                            <h3 class="text-xl font-bold text-white mt-1">Tim Terbentuk</h3>
                            <p class="text-gray-400 mt-2">Berawal dari lima mahasiswa yang tidak menghadiri perkuliahan
                                MPTI yang tidak tahu kejelasan mengenai tugas apa yang dikerjakan.</p>
                        </div>
                    </div>

                    <div class="mb-8 flex justify-between md:flex-row-reverse items-center w-full left-timeline reveal">
                        <div class="hidden md:block w-5/12"></div>
                        <div class="z-20 flex items-center bg-yellow-500 w-8 h-8 rounded-full"></div>
                        <div class="bg-gray-900 glass-card p-6 rounded-lg w-full md:w-5/12">
                            <p class="text-yellow-500 font-semibold">April 2025</p>
                            <h3 class="text-xl font-bold text-white mt-1">Gagasan Lahir</h3>
                            <p class="text-gray-400 mt-2">Sebuah ide sederhana tercetus untuk menciptakan platform
                                belajar yang mudah diakses dan berkualitas.</p>
                        </div>
                    </div>

                    <div class="mb-8 flex justify-between items-center w-full right-timeline reveal">
                        <div class="hidden md:block w-5/12"></div>
                        <div class="z-20 flex items-center bg-yellow-500 w-8 h-8 rounded-full"></div>
                        <div class="bg-gray-900 glass-card p-6 rounded-lg w-full md:w-5/12">
                            <p class="text-yellow-500 font-semibold">Juni 2025</p>
                            <h3 class="text-xl font-bold text-white mt-1">Peluncuran Aplikasi</h3>
                            <p class="text-gray-400 mt-2">Setelah melalui berbulan-bulan penuh perjuangan, kerja keras
                                tanpa henti, dan proses pengembangan yang tak selalu mulus, akhirnya—Pinterin sudah siap
                                untuk dipresentasikan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-20 bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 reveal">
                    <h2 class="text-3xl md:text-4xl font-bold text-white">Para Developer</h2>
                    <p class="text-yellow-500 mt-2">Perkenalkan Tim Luar Biasa Kami</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
                    @php
                        $developers = [
                            [
                                'name' => 'C. Praba Alkautsar',
                                'role' => 'Lead Backend Developer',
                                'img' =>
                                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjv823akFHkllO-QmZTB0iyJJPRj2gpFf17A&s',
                            ],
                            [
                                'name' => 'M. Iqbal Anandra',
                                'role' => 'Lead Frontend Developer',
                                'img' =>
                                    'https://admin.tvrijakartanews.com/uploads/Screenshot_20240423_084508_3_90c72f1b49.png',
                            ],
                            [
                                'name' => 'M. Nadhif Nandhitama',
                                'role' => 'Backend Developer',
                                'img' =>
                                    'https://preview.redd.it/lpg-3-kg-langka-menteri-bahlil-salahkan-warga-jangan-beli-v0-9jl4nw7wm1he1.jpeg?width=586&format=pjpg&auto=webp&s=ac1ec7b8c7358fa1d54b642938f30a508313200d',
                            ],
                            [
                                'name' => 'Jessen R. Allen',
                                'role' => 'Project Manager',
                                'img' => 'https://i.pinimg.com/474x/be/a9/f2/bea9f287b6e10df744a59b573248bdb8.jpg',
                            ],
                            [
                                'name' => 'Ferdinand Lauren',
                                'role' => 'UI/UX Designer',
                                'img' => 'https://koma.id/wp-content/uploads/2022/06/Natalius-Pigai.jpg',
                            ],
                        ];
                    @endphp

                    @foreach ($developers as $index => $dev)
                        <div class="reveal glass-card p-6 rounded-lg text-center hover-glow"
                            style="transition-delay: {{ $index * 150 }}ms;">
                            <img class="w-32 h-32 mx-auto rounded-full border-4 border-gray-700"
                                src="{{ $dev['img'] }}" alt="Foto {{ $dev['name'] }}">
                            <h4 class="mt-4 text-xl font-bold text-white">{{ $dev['name'] }}</h4>
                            <p class="text-yellow-500 font-semibold">{{ $dev['role'] }}</p>
                            <div class="mt-4 flex justify-center space-x-4">
                                <a href="#" class="text-gray-500 hover:text-yellow-500 transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.477 2 12c0 4.286 2.89 7.92 6.737 9.168.49.09.668-.214.668-.475 0-.234-.008-.856-.013-1.68-2.812.605-3.408-1.355-3.408-1.355-.446-1.13-1.09-1.43-1.09-1.43-.89-.608.068-.596.068-.596.984.07 1.503.998 1.503.998.874 1.498 2.293 1.066 2.852.815.09-.633.342-1.066.62-1.31-2.174-.248-4.46-1.08-4.46-4.832 0-1.068.38-1.94.998-2.622-.1-.25-.433-1.24.094-2.585 0 0 .823-.263 2.695.998.78-.217 1.62-.325 2.455-.33.835.005 1.675.113 2.455.33 1.872-1.26 2.695-.998 2.695-.998.527 1.344.194 2.334.094 2.584.62.682.998 1.554.998 2.622 0 3.762-2.29 4.58-4.47 4.824.35.302.662.9.662 1.812 0 1.31-.012 2.37-.012 2.692 0 .263.178.57.672.474C19.11 19.92 22 16.285 22 12c0-5.523-4.477-10-10-10z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="text-gray-400 hover:text-yellow-500 transition-colors duration-200"
                                    aria-label="Instagram">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.584.069-4.85c.149-3.225 1.664-4.771 4.919-4.919C8.416 2.175 8.796 2.163 12 2.163zm0 1.802c-3.141 0-3.504.012-4.726.068-2.733.125-3.951 1.345-4.075 4.075-.056 1.222-.067 1.585-.067 4.726s.011 3.504.067 4.726c.125 2.733 1.345 3.951 4.075 4.075 1.222.056 1.585.067 4.726.067s3.504-.011 4.726-.067c2.733-.125 3.951-1.345 4.075-4.075.056-1.222.067-1.585.067-4.726s-.011-3.504-.067-4.726c-.125-2.733-1.345-3.951-4.075-4.075-1.222-.056-1.585-.067-4.726-.067zM12 6.837a5.163 5.163 0 100 10.326 5.163 5.163 0 000-10.326zm0 8.528a3.363 3.363 0 110-6.726 3.363 3.363 0 010 6.726zM18.802 6.11a1.44 1.44 0 100-2.88 1.44 1.44 0 000 2.88z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                        }
                    });
                }, {
                    threshold: 0.1
                });

                document.querySelectorAll('.reveal').forEach(el => {
                    observer.observe(el);
                });
            });
        </script>
    @endpush
</x-app-layout>
