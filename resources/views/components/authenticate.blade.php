<div class="c-authenticate">
    <div class="flex w-full">
        <div class="w-6/12 border-r-2 border-black text-center">
            <p class="font-bold">
                Bestaande klant
            </p>
            <form class="mt-4" action="/inloggen/login" method="post">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="E-mailadres" />
                </div>
                <div class="mt-4">
                    <input type="password" name="password" placeholder="Wachtwoord" />
                </div>
                <div class="mt-4">
                    <input type="submit" class="c-button c-button__default cursor-pointer" value="Inloggen" />
                </div>
            </form>
        </div>
        <div class="w-6/12 text-center">
            <p class="font-bold">
                Registreren
            </p>
            <form action="/inloggen/register" method="post">
                @csrf
                <div class="flex justify-around mt-4">
                    <input type="text" name="name" placeholder="Naam" />
                </div>
                <div class="flex justify-center mt-4">
                    <input type="email" name="email" placeholder="E-mailadres" />
                </div>
                <div class="mt-4">
                    <input type="password" name="password" placeholder="Wachtwoord" />
                </div>
                <div class="mt-4">
                    <input name="newsletter" type="checkbox">
                    <label class="newsletterRegister"> sign up for the newsletter</label>
                </div>
                <div class="mt-4 flex items-center justify-center">
                    <input type="submit" class="c-button c-button__default cursor-pointer" value="Registreren" />
                </div>
            </form>
        </div>
    </div>
    @if (session('error'))
        <p class="text-red-500">
            {{ session('error') }}
        </p>
    @endif
</div>
