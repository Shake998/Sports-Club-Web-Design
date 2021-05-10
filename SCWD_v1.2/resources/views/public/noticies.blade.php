<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
    @livewire('css-imports')
</head>
<body>
    @livewire('navbar')

    <!-- Noticies -->
    <div class="container mt-5 mb-3">
        <!--News Tittle -->
        <div class="col-xs-12 mb-4 border-bottom">
            <h2>Notícies</h2>
        </div>

        <!--Main New -->
        <section class="row mb-4 container">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-9 px-0 d-flex align-items-center justify-content-center">
                <!-- Thumbnail-->
                <img src="../img/sponsors/terrassaSports.jpeg" class="img-fluid">
            </article>
            <aside class="news-info col-xs-12 col-sm-12 col-md-12 col-lg-3 pb-3">
                <h4 class="mt-4">Terrassa Sports</h4>
                <p class="mt-2">03 Octubre, 2020</p>
                <p class="mt-3">Lorem, ipsum dolor sit amet inus molestiae maiores odio.</p>
                <a href="#" class="news-button p-2 mb-2">&gt; Llegir més</a>
            </aside>
        </section>

        <!--Secondary News -->
        <div class="row justify-content-center">
            <div class="news-info col-xs-12 col-sm-8 col-md-5 col-lg-4 col-xl-3 m-2 px-0 shadow">
                <div>
                    <!-- Thumbnail-->
                    <img src="../img/acordBBVA.jpeg" class="img-fluid rounded-top">
                </div>
                <div class="container p-3">
                    <h3>BBVA junt amb Linia22</h3>
                    <p class="mt-2">03 Octubre, 2020</p>
                    <p>Lorem ipsum dolorobc pedit recusaetur adi accusantium eum facilis quis tempore dolores sint eligendi dolor corporis, iusto nostrum, consectetur repellendus voluptatem aperiam et unde?</p>    
                    <a href="#" class="news-button p-2 mb-2">&gt; Llegir més</a>
                </div>
            </div>
            <div class="news-info col-xs-12 col-sm-8 col-md-5 col-lg-4 col-xl-3 m-2 px-0 shadow">
                <div>
                    <!-- Thumbnail-->
                <img src="../img/acordDonCandido.jpg" class="img-fluid rounded-top" style="max-height: 300px">
                </div>
                <div class="container p-3">
                    <h3>Noticia</h3>
                    <p class="mt-2">03 Octubre, 2020</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisici nostrum, veritatis inventore impedit recusandae reiciendis aspernatur.</p>
                    <a href="#" class="news-button p-2 mb-2">&gt; Llegir més</a>
                </div>
            </div>
            <div class="news-info col-xs-12 col-sm-8 col-md-5 col-lg-4 col-xl-3 m-2 px-0 shadow">
                <div>
                    <!-- Thumbnail-->
                <img src="../img/grada2.jpg" class="img-fluid rounded-top">
                </div>
                <div class="container p-3">
                    <h3>Noticia</h3>
                    <p class="mt-2">03 Octubre, 2020</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing nt quia dolores nostrum, veritatis inventore impedit recusandae reiciendis aspernatur.</p>
                    <a href="#" class="news-button p-2 mb-2">&gt; Llegir més</a>
                </div>
            </div>
            <div class="news-info col-xs-12 col-sm-8 col-md-5 col-lg-4 col-xl-3 m-2 px-0 shadow">
                <div>
                    <!-- Thumbnail-->
                <img src="../img/contriman.jpg" class="img-fluid rounded-top">
                </div>
                <div class="container p-3">
                    <h3>Noticia</h3>
                    <p class="mt-2">03 Octubre, 2020</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing  nt quia dolores nostrum, veritatis inventore impedit recusandae reiciendis aspernatur.</p>
                    <a href="#" class="news-button p-2 mb-2">&gt; Llegir més</a>
                </div>
            </div>
            <div class="news-info col-xs-12 col-sm-8 col-md-5 col-lg-4 col-xl-3 m-2 px-0 shadow">
                <div>
                    <!-- Thumbnail-->
                    <img src="../img/contriman.jpg" class="img-fluid rounded-top">
                </div>
                <div class="container p-3">
                    <h3>Noticia</h3>
                    <p class="mt-2">03 Octubre, 2020</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing  nt quia dolores nostrum, veritatis inventore impedit recusandae reiciendis aspernatur.</p>
                    <a href="#" class="news-button p-2 mb-2">&gt; Llegir més</a>
                </div>
            </div> 
            <div class="news-info col-xs-12 col-sm-8 col-md-5 col-lg-4 col-xl-3 m-2 px-0 shadow">
                <div>
                    <!-- Thumbnail-->
                    <img src="../img/contriman.jpg" class="img-fluid rounded-top">
                </div>
                <div class="container p-3">
                    <h3>Noticia</h3>
                    <p class="mt-2">03 Octubre, 2020</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing  nt quia dolores nostrum, veritatis inventore impedit recusandae reiciendis aspernatur.</p>
                    <a href="#" class="news-button p-2 mb-2">&gt; Llegir més</a>
                </div>
            </div> 
        </div>
    </div>



    @livewire('footer')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>