<div class="border-solid border-2 border-black grid grid-cols-2 gap-3 rounded-lg">
    <div>
        <img class="rounded-tl-lg rounded-rl-lg" style="height: 100%;" src="{{ asset($accommodation->imageUrl) }}">
    </div>
    <div>
        <h1 class="underline">{{ $accommodation->name }}</h1>
        <p class="mt-2">{{ $accommodation->description }}</p>
        <div class="flex space-x-2 mt-6 w-full">
            <a href="/accommodation/{{ $accommodation->id }}" class="c-button c-button__default c-button__accommodation w-11/12">
                More info
            </a>
        </div>
        <br>
    </div>
</div>
