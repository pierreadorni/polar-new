<x-layout title="Nos Produits - Le Polar">
    <div class="bg-tertiary pt-12 flex flex-col items-center min-h-screen">
        <h2 class="text-3xl font-bold text-black text-center">Découvrez tous les produits proposés au Polar</h2>
        <h4 class="text-xl text-center">De nombreux produits à tarifs avantageux</h4>

        <!-- searchbar -->
        <form class="border-2 border-black rounded-full w-fit overflow-hidden flex mt-8 relative">
            <input type="text" class="w-48 md:w-96 border-0" name="q" placeholder="rechercher un produit"
                   value="{{ request()->q }}"/>
            <a href="/products" class="absolute right-20 top-2 {{ request()->q == '' ? 'hidden' : '' }}">
                <svg class="w-6 h-6 text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em"
                     width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" stroke="#000" stroke-width="2" d="M7,7 L17,17 M7,17 L17,7"></path>
                </svg>
            </a>
            <button type="submit" class="py-2 px-6 border-l-2 border-l-black">
                <svg class="w-6 h-6" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                     height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z"></path>
                </svg>
            </button>
        </form>

        <!-- products -->
        <div class="flex flex-wrap justify-center mt-8">
            @foreach($products as $product)
                <article
                   class="w-72 h-52 bg-white rounded-xl overflow-hidden shadow-lg m-4 flex flex-col justify-between">
                    <div class="flex justify-center h-full w-full overflow-hidden">
                        <img src="{{ asset("storage/$product->image") }}" alt="{{ $product->name }}"
                             class="w-full h-full object-cover"/>
                    </div>
                    <div class="flex flex-col justify-center items-center h-14 bg-tertiary relative">
                        <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                        <p class="text-primary">{{ $product->price }}€</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-layout>
