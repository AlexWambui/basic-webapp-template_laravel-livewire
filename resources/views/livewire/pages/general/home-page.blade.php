<div class="HomePage">
    <section class="Hero-1">
        <div class="container">
            <div class="content">
                <h1 class="title">Hero 1</h1>
                <p class="punchline">Best Software Solutions in Town</p>
                <div class="hero_actions">
                    <a href="{{ Route::has('contact-page') ? route('contact-page') : '#' }}">Get a Consultation</a>
                </div>
            </div>

            <x-image image="assets/images/default-image.jpg" />
        </div>
    </section>

    <section class="Hero-2">
        <video src="{{ asset('assets/videos/hero-section.mp4') }}" autoplay loop muted playsinline></video>

        <div class="mask"></div>

        <div class="content">
            <h1 class="title">Hero 2</h1>
            <p class="punchline">Explore African Wildlife</p>

            <div class="hero_actions">
                <a href="{{ Route::has('contact-page') ? route('contact-page') : '#' }}">Get a Consultation</a>
            </div>
        </div>
    </section>
</div>
