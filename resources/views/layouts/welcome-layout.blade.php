{{-- <div class="px-4 py-5 my-5 text-center">
    <img class="d-inline-block mb-3" src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/lettre-creative.svg" alt="Le C du logo Créative Formation" style="width: 50px">
    <h1 class="display-5 fw-bold">Bienvenue sur le blog de Créative</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Retrouvez-ici nos dernières actualités !</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a class="btn btn-primary btn-lg px-4 gap-3" href="#lastPost">Accédez aux actualités</a>
        </div>
    </div>
</div> --}}
<section class="hero data-bg-image d-flex align-items-center">
    @if(Route::is('pages.home') )
        <div class="container-nav">
    @elseif(!Route::is('pages.home') )
        <div class="container-other">
    @endif
        <div class="cta text-center">
            <img class="d-inline-block mb-3" src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/logo-creative-dark.svg" alt="Le C du logo Créative Formation" style="width: 300px">
            <h1 class="display-5 fw-bold">Bienvenue sur le blog de Créative</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Retrouvez-ici nos dernières actualités !</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center test">
                    <a class="btn btn-last-article btn-lg px-4 gap-3" href="#lastPost">Accédez aux actualités</a>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 260"><path fill="#FFF" fill-opacity="1" d="M0,256L60,245.3C120,235,240,213,360,218.7C480,224,600,256,720,245.3C840,235,960,181,1080,176C1200,171,1320,213,1380,234.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</section>