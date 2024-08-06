<div class="relative pl-3 inline-block">
    <a class="no-underline hover:text-black hover:cursor-pointer">
        <div x-data="{ cart: false }" @click.away="cart = false">
            <div @click="cart = !cart">
                <p class="no-underline hover:text-black">
                    <span
                        class="absolute left-7 inline-flex items-center justify-center px-1 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ $total_barang }}</span>
                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24">
                        <path
                            d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                </p>

                <div x-show="cart"
                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
                    <div class="py-1">
                        @foreach ($cart as $item)
                        <div class="flex flex-row justify-between">
                            <p class="block px-4 py-2 text-sm text-gray-700">{{ $item['name'] }}
                                x{{ $item['quantity'] }}</p>
                            <button wire:click="removeFromCart({{ $item['id'] }})"
                                class="block px-4 py-2 text-sm text-gray-700">x</button>
                        </div>
                        <button
                            class="block px-4 py-2 text-sm text-gray-700">Checkout</button>
                        @endforeach
                        @empty($cart)
                            <a class="block px-4 py-2 text-sm text-gray-700">Cart is empty</a>
                        @endempty

                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
