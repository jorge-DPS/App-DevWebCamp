<main class="pagina">
    <h2 class="pagina__encabezado"><?php echo $titulo; ?></h2>
    <p class="pagina__descripcion">Tú Boleto - Te recomendamos almacenarlo, puedes compartirla en redes Sociales</p>

    <div class="boleto_virtual">
        <div class="boleto boleto--<?php echo strtolower($registro->paquete->nombre);?> boleto--acceso">
            <div class="boleto__contenido">
                <h4 class="boleto__logo">&#60;DebWebCamp</h4>
                <p class="boleto__plan"><?php echo $registro->paquete->nombre; ?></p>
                <p class="boleto__nombre"><?php echo $registro->usuario->nombre . ' ' . $registro->usuario->apellido; ?></p>
            </div>

            <p class="boleto__codigo"><?php echo '#' . $registro->token; ?></p>
        </div>
    </div>
    
</main>