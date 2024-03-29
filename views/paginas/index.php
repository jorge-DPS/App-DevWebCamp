<?php
include_once __DIR__ . '/conferencias.php';
?>

<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total; ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total; ?></p>
            <p class="resumen__texto">conferencias</p>
        </div>
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total; ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers__encabezado">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros expertis de DevWebCamp</p>

    <div class="speakers__grid">
        <?php foreach ($ponentes as $ponente) : ?>
            <div <?php aos_animacion(); ?> class="speaker">
                <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png">
                    <img class="speaker__imagen" loading="lazy" width="200" height="300" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" alt="imagen ponente">
                </picture>

                <div class="speaker__informacion">
                    <h4 class="speaker__nombre">
                        <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
                    </h4>
                    <p class="speaker__ubicacion">
                        <?php echo $ponente->ciudad . ', ' . $ponente->pais; ?>
                    </p>

                    <nav class="speaker-sociales">
                        <?php
                        $redes = json_decode($ponente->redes);
                        ?>

                        <!-- Facebook -->
                        <?php if (!empty($redes->facebook)) : ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                                <span class="speaker-sociales__ocultar">Facebook</span>
                            </a>
                        <?php endif; ?>

                        <!-- Twitter -->
                        <?php if (!empty($redes->twitter)) : ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                                <span class="speaker-sociales__ocultar">Twitter</span>
                            </a>
                        <?php endif; ?>

                        <!-- YouTube -->
                        <?php if (!empty($redes->youtube)) : ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
                                <span class="speaker-sociales__ocultar">YouTube</span>
                            </a>
                        <?php endif; ?>

                        <!-- Instagram -->
                        <?php if (!empty($redes->instagram)) : ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                                <span class="speaker-sociales__ocultar">Instagram</span>
                            </a>
                        <?php endif; ?>

                        <!-- TikTok -->
                        <?php if (!empty($redes->tiktok)) : ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
                                <span class="speaker-sociales__ocultar">Tiktok</span>
                            </a>
                        <?php endif; ?>

                        <!-- GitHub -->
                        <?php if (!empty($redes->github)) : ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
                                <span class="speaker-sociales__ocultar">gitHub</span>
                            </a>
                        <?php endif; ?>
                    </nav>
                    <ul class="speaker__listado-skills">
                        <?php
                        $tags = explode(',', $ponente->tags);
                        foreach ($tags as $tag) : ?>
                            <li class="speaker__skill"><?php echo $tag; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="mapa" id="mapa"></div>

<section class="boletos">
    <h2 class="boletos__encabezado">Boletos & Precios</h2>
    <p class="boletos__descripcion">Precios para DevWebCamp</p>

    <div class="boletos__grid">
        <div class="boleto boleto--presencial">
            <h4 class="boleto__logo">&#60;DebWebCamp /></h4>
            <p class="boleto__plan">Presencial</p>
            <p class="boleto__precio">$199</p>
        </div>

        <div class="boleto boleto--virtual">
            <h4 class="boleto__logo">&#60;DebWebCamp /></h4>
            <p class="boleto__plan">Virtual</p>
            <p class="boleto__precio">$49</p>
        </div>

        <div class="boleto boleto--gratis">
            <h4 class="boleto__logo">&#60;DebWebCamp /></h4>
            <p class="boleto__plan">Gratis</p>
            <p class="boleto__precio">Gratis - $0</p>
        </div>
    </div>

    <div class="boleto__enlace-contenedor">
        <a href="/paquetes" class="boleto__enlace">Ver Paquetes</a>
    </div>
</section>