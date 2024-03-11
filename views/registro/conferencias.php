<h2 class="pagina__encabezado"><?php echo $titulo; ?></h2>
<p class="pagina__descripcion">Elige hasta 5 eventos para asistir de forma precencial.</p>

<div class="eventos-registro">
    <main class="eventos -registro__listado">

        <!-- conferencias -->
        <h3 class="eventos-registro__encabezado--conferencias">&lt;Conferencias /></h3>
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_v'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach; ?>
        </div>

        <p class="eventos-registro__fecha">Sábado 6 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php foreach ($eventos['conferencias_s'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach; ?>
        </div>
        <!-- ::End conferencias -->

        <!-- Workshops -->
        <h3 class="eventos-registro__encabezado--workshops">&lt;Workshops /></h3>
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($eventos['workshops_v'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach; ?>
        </div>

        <p class="eventos-registro__fecha">Sábado 6 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php foreach ($eventos['workshops_s'] as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach; ?>
        </div>
        <!-- End Workshops -->

    </main>

    <aside class="registro">
        <h2 class="registro__encabezado">Tu registro</h2>

        <div id="registro__resumen" class="registro__resumen">

        </div>
    </aside>

</div>