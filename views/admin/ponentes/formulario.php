<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Personal</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre Ponente" value=" <?php echo $ponente->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input type="text" class="formulario__input" id="apellido" name="apellido" placeholder="Apellido Ponente" value=" <?php echo $ponente->apellido ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input type="text" class="formulario__input" id="ciudad" name="ciudad" placeholder="Ciudad Ponente" value=" <?php echo $ponente->ciudad ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="pais" class="formulario__label">Pais</label>
        <input type="text" class="formulario__input" id="pais" name="pais" placeholder="Pais Ponente" value=" <?php echo $ponente->pais ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input type="file" class="formulario__input--file" id="imagen" name="imagen">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Áreas de Experiencia (separadas por coma)</label>
        <input type="text" class="formulario__input" id="ciudad" name="ciudad" placeholder="Ej. Node.js, PHP, CSS, Larevel, UI/UX">

        <div id="tags" class="forluario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $ponentes->tagas ?? ''; ?>">
    </div>
</fieldset>

<!-- Redes sociales -->

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>

            <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre Ponente" value="<?php echo $ponente->nombre ?? ''; ?>">
        </div>
    </div>
</fieldset>