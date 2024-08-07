<x-dashboard-layout>
    <x-slot name="header">
        <style>
            .form-radio {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                display: inline-block;
                vertical-align: middle;
                background-origin: border-box;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                flex-shrink: 0;
                border-radius: 100%;
                border-width: 2px;
            }

            .form-radio:checked {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                border-color: transparent;
                background-color: currentColor;
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
            }

            @media not print {
                .form-radio::-ms-check {
                    border-width: 1px;
                    color: transparent;
                    background: inherit;
                    border-color: inherit;
                    border-radius: inherit;
                }
            }

            .form-radio:focus {
                outline: none;
            }

            .form-select {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                background-repeat: no-repeat;
                padding-top: 0.5rem;
                padding-right: 2.5rem;
                padding-bottom: 0.5rem;
                padding-left: 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                background-position: right 0.5rem center;
                background-size: 1.5em 1.5em;
            }

            .form-select::-ms-expand {
                color: #a0aec0;
                border: none;
            }

            @media not print {
                .form-select::-ms-expand {
                    display: none;
                }
            }

            @media print and (-ms-high-contrast: active),
            print and (-ms-high-contrast: none) {
                .form-select {
                    padding-right: 0.75rem;
                }
            }
        </style>
    </x-slot>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">

        <div class=" bg-gray-50 py-5">
            <div class="px-5">
                <div class="mb-2">
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-600">Checkout.</h1>
                </div>
            </div>
            <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-10 text-gray-800">
                <div class="w-full">
                    <div class="-mx-3 md:flex items-start">
                        <div class="px-3 md:w-7/12 lg:pr-10">
                            @foreach ($carts as $key => $cart)
                                <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                                    <div class="w-full flex items-center">
                                        <div
                                            class="overflow-hidden rounded-lg w-16 h-16 bg-gray-50 border border-gray-200">
                                            <img src="{{ $cart['image'] }}" alt="">
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <h6 class="font-semibold uppercase text-gray-600">{{ $cart['name'] }}.</h6>
                                            <p class="text-gray-400">x {{ $cart['quantity'] }}</p>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-gray-400 text-sm">Rp.</span> <span class="font-semibold">{{ $harga_barang[$cart['id']] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @empty($carts)
                                <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                                    <div class="w-full flex items-center">

                                        <div>
                                            <span class="font-semibold text-gray-600 text-xl">Cart Is Empty.</span>
                                        </div>
                                    </div>
                                </div>
                            @endempty
                            {{-- TODO: Discount Code --}}
                            {{-- <div class="mb-6 pb-6 border-b border-gray-200">
                                <div class="-mx-2 flex items-end justify-end">
                                    <div class="flex-grow px-2 lg:max-w-xs">
                                        <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">Discount code</label>
                                        <div>
                                            <input class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="XXXXXX" type="text"/>
                                        </div>
                                    </div>
                                    <div class="px-2">
                                        <button class="block w-full max-w-xs mx-auto border border-transparent bg-gray-400 hover:bg-gray-500 focus:bg-gray-500 text-white rounded-md px-5 py-2 font-semibold">APPLY</button>
                                    </div>
                                </div>
                            </div> --}}
                            @if (!empty($carts))
                                <div class="mb-6 pb-6 border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                    <div class="w-full flex items-center">
                                        <div class="flex-grow">
                                            <span class="text-gray-600">Total</span>
                                        </div>
                                        <div class="pl-3">
                                            <span class="font-semibold text-gray-400 text-sm">Rp.</span> <span
                                                class="font-semibold">{{ $total_harga }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if (!empty($carts))
                            <div class="px-3 md:w-5/12">
                                {{-- TODO: IDK --}}
                                {{-- <div class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                <div class="w-full flex mb-3 items-center">
                                    <div class="w-32">
                                        <span class="text-gray-600 font-semibold">Contact</span>
                                    </div>
                                    <div class="flex-grow pl-3">
                                        <span>Scott Windon</span>
                                    </div>
                                </div>
                                <div class="w-full flex items-center">
                                    <div class="w-32">
                                        <span class="text-gray-600 font-semibold">Billing Address</span>
                                    </div>
                                    <div class="flex-grow pl-3">
                                        <span>123 George Street, Sydney, NSW 2000 Australia</span>
                                    </div>
                                </div>
                            </div> --}}
                                <div
                                    class="w-full mx-auto rounded-lg bg-white border border-gray-200 text-gray-800 font-light mb-6">
                                    <div class="w-full p-3 border-b border-gray-200">
                                        {{-- TODO: Payment Gateway MIDTRANS --}}
                                        {{-- <div class="mb-5">
                                        <label for="type1" class="flex items-center cursor-pointer">
                                            <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                                            <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-6 ml-3">
                                        </label>
                                    </div> --}}
                                        <div>
                                            <div class="mb-3">
                                                <label
                                                    class="text-gray-600 font-semibold text-sm mb-2 ml-1">Name</label>
                                                <div>
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="John Smith" type="text" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    class="text-gray-600 font-semibold text-sm mb-2 ml-1">Address</label>
                                                <div>
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                                                        placeholder="NYC Street NO.1" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button
                                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-2 font-semibold"><i
                                            class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>