<nav x-data="{ open:false }">
    <div class="container">
        <div class="branding">
            <a href="/" wire:navigate>
                {{ config('app.name') }}
            </a>
        </div>

        <div class="burger_menu" @click="open = !open">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav_links" :class="{ 'open' : open }">
            @php
                $links = [
                    ['href' => 'about-page', 'text' => 'Home'],
                    ['href' => 'about-page', 'text' => 'About'],
                    ['href' => 'about-page', 'text' => 'Services'],
                    ['href' => 'about-page', 'text' => 'Contact'],
                ];
            @endphp

            <div class="main_links">
                @foreach ($links as $link)
                    <a href="{{ Route::has($link['href']) ? route($link['href']) : '#' }}" wire:navigate>{{ $link['text'] }}</a>
                @endforeach
            </div>

            <div class="other_links">
                <a href="{{ Route::has('login') ? route('login') : '#' }}">Login</a>
            </div>
        </div>
    </div>
</nav>
