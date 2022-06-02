<script src="https://unpkg.com/vue@3"></script>
<div class="c-header">
    <div class="c-header__container">
        <div class="w-full flex items-end p-4">
            <a href="/">
                <img src="{{ asset('images/legoland_logo.svg') }}" />
            </a>
            <div class="w-full flex justify-around">
                <a class="border_under" href="/">
                    Home
                </a>
                <a class="border_under" href="/informatie">
                    Informatie
                </a>
                <a class="border_under" href="/tickets">
                    Tickets
                </a>
                <a class="border_under" href="/nieuwsbrief">
                    Nieuwsbrief
                </a>
                <a class="border_under" href="/contact">
                    Contact
                </a>
                <a class="border_under" href="/accommodation">
                    Accommodaties
                </a>
                <a class="border_under" href="/attracties">
                    Attracties
                </a>
                <a class="border_under" href="/cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </a>
                @if(!auth()->check())
                <div class="flex items-center">
                    <a class="border_under" href="/inloggen">
                        Inloggen
                    </a>
                    <p class="mx-4">
                        |
                    </p>
                    <a class="border_under" href="/inloggen">
                        Registreren
                    </a>
                </div>
                @else
                    <a class="border_under" href="/account/dashboard">
                        <i class="fas fa-user"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
  Vue.component("v-dropdown", require("components/v-dropdown.vue"));

  new Vue({
    el: "#app",
  });
</script>