<section class="bg-gray-100 py-12">
    <h3 class="text-2xl font-semibold text-center">L'équipe</h3>
    <ul class="flex flex-col md:flex-row mt-5 gap-12 w-screen justify-around">
        @foreach($members as $member)
            <li class="flex flex-col items-center">
                <img
                    src="{{ asset("/storage/$member->photo") }}"
                    alt="{{ $member->full_name }}"
                    class="w-24 h-24 rounded-full mx-auto object-center object-cover"
                />
                <div class="flex justify-center items-center h-8">
                    {{ $member->first_name }} {{ strtoupper($member->last_name) }}
                </div>
            </li>
        @endforeach
        <li class="h-24 text-primary font-bold">
            <a class="flex flex-col justify-center items-center h-full hover:text-red-900 transition" href="/team">
                voir plus
                <svg class="w-6 h-6" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                     stroke-linecap="round"
                     stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
            </a>
        </li>
</section>
