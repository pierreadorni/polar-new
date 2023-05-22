<section class="bg-gray-100 py-12">
    <h2 class="text-3xl text-center font-bold">Découvrez les différentes offres du Polar</h2>
    <h6 class="text-center">De nombreux produits et services à tarifs avantageux</h6>

    <div class="flex flex-col items-center mt-12">
        <h3 class="text-2xl font-semibold">Nos Services</h3>
        <ul class="flex mt-5 gap-12">
            @foreach($services as $service)
                <li>
                    <a href="/services/{{$service->id}}">
                        <article class="rounded-xl overflow-hidden bg-gray-300 h-52 w-56">
                            <div class="bg-white h-44 flex items-center justify-center">
                                <img src="/storage/{{$service->image}}" alt="image placeholder" class="w-32"/>
                            </div>
                            <div class="flex justify-center items-center h-8">
                                {{ $service->name }}
                            </div>
                        </article>
                    </a>
                </li>
            @endforeach

            <li class="h-52 text-primary font-bold">
                <a class="flex flex-col justify-center items-center h-full hover:text-red-900 transition" href="/services">
                    voir plus
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                         stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l6 0"></path>
                        <path d="M12 9l0 6"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </div>

    <div class="flex flex-col items-center mt-12">
        <h3 class="text-2xl font-semibold">Nos Produits</h3>
        <ul class="flex mt-5 gap-12">
            @foreach($products as $product)
                <li>
                    <a href="/services/{{$product->id}}">
                        <article class="rounded-xl overflow-hidden bg-gray-300 h-52 w-56">
                            <div class="bg-white h-44 flex items-center justify-center">
                                <img src="/storage/{{$product->image}}" alt="image placeholder" class="w-32"/>
                            </div>
                            <div class="flex justify-center items-center h-8">
                                {{ $product->name }}
                            </div>
                        </article>
                    </a>
                </li>
            @endforeach
            <li class="h-52 text-primary font-bold">
                <a class="flex flex-col justify-center items-center h-full hover:text-red-900 transition" href="/products">
                    voir plus
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                         stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l6 0"></path>
                        <path d="M12 9l0 6"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</section>
