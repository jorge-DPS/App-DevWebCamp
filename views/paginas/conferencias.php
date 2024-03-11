<main class="agenda">
    <h2 class="agenda__encabezado">Workshop & Conferencias</h2>
    <p class="agenda__descripcion">Talleres y Conferencias dictados por expertos en desarrollo web</p>

    <div class="eventos">
        <h2 class="eventos__encabezado">&lt;Conferencias /></h2>
        <p class="eventos__fecha">Viernes 5 de octubre</p>

        <div class="eventos__listado slider swiper">
            <!-- Slider main container -->
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_v'] as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">Sábada 6 de octubre</p>

        <div class="eventos__listado slider swiper">
            <!-- Slider main container -->
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_s'] as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>


    <div class="eventos eventos--workshops">
        <h2 class="eventos__encabezado">&lt;Workshops /></h2>
        <p class="eventos__fecha">Viernes 5 de octubre</p>

        <div class="eventos__listado slider swiper">
            <!-- Slider main container -->
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops_v'] as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">Sábada 6 de octubre</p>

        <div class="eventos__listado slider swiper">
            <!-- Slider main container -->
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops_s'] as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</main>