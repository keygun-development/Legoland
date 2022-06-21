<div class="border-solid border-2 border-black grid grid-cols-2 gap-3 rounded-lg">
    <div>
        <img class="rounded-tl-lg rounded-rl-lg" style="height: 100%;" src="{{ asset($item->imageUrl) }}">
    </div>
    <div class="pr-4">
        <h1 class="underline">{{ $item->name }}</h1>
        <p class="mt-2">{{ $item->description }}</p>
        <div class="flex space-x-2 mt-6 w-full">
            <a href="/{{ $item->getType() }}/{{ $item->id }}" class="c-button c-button__default text-center w-full">
                Meer informatie
            </a>
        </div>
        <br>
    </div>
</div>
