<section class="bg-gray-200 py-12 flex flex-col items-center">
    <span class="-translate-y-24 h-0 overflow-hidden" id="about">anchor</span>
    <h3 class="text-2xl font-semibold">A propos</h3>
    <div class="prose max-w-5xl text-justify mt-12 p-4">
        <x-markdown>
            {{ $aboutText }}
        </x-markdown>
    </div>
</section>
