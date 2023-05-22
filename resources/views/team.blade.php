<x-layout title="L'équipe - Le Polar">
    <div class="bg-tertiary pt-12 flex flex-col items-center min-h-screen">
        <h2 class="text-3xl font-bold text-black text-center">L'équipe du Polar</h2>
        <h4 class="text-xl text-center">Découvrez l'équipe du Polar au complet</h4>

        <!-- team members -->
        <div class="flex flex-wrap justify-center mt-8">
            @foreach($members as $member)
                <article
                   class="w-72 h-52 bg-white rounded-xl overflow-hidden shadow-lg m-4 flex flex-col justify-between">
                    <div class="flex justify-center h-full w-full overflow-hidden">
                        <img src="storage/{{ $member->photo }}" alt="{{ $member->first_name }}"
                             class="w-full h-full object-contain"/>
                    </div>
                    <div class="flex flex-col justify-center items-center h-14 bg-tertiary relative">
                        <h3 class="text-xl font-semibold">{{ $member->first_name }} {{ $member->last_name }}</h3>
                        <p class="text-gray-500">{{ $member->role }}</p>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
</x-layout>
