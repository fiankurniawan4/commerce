<x-dashboard-layout>
    <section>
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24" bis_skin_checked="1">
            <div class="flex flex-col w-full mb-12 text-center" bis_skin_checked="1">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-20 h-20 mx-auto mb-5 text-blue-600 rounded-full bg-gray-50"
                    bis_skin_checked="1">
                    <svg class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                    </svg>
                </div>
                <h1
                    class="max-w-5xl text-2xl font-bold leading-none tracking-tighter text-neutral-600 md:text-5xl lg:text-6xl lg:max-w-7xl">
                    Belanja kebutuhan sekarang juga. <br class="hidden lg:block">
                    Jadikan lebih mudah berbelanja
                </h1>

                <p class="max-w-xl mx-auto mt-8 text-base leading-relaxed text-center text-gray-500">Berbelanja dengan mudah dan cepat dimanapun kapanpun.</p>
            </div>
        </div>
    </section>
    <section>
        @livewire('pages.product')
    </section>
</x-dashboard-layout>
