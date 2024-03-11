<main class="registro">
    <h2 class="regsitro__encabezado"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion"></p>

    <!-- Paquetes -->
    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre"> Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>

            <p class="paquete__precio" href="">$0</p>

            <form method="POST" action="/finalizar-registro/gratis">
                <input class="paquetes__submit" type="submit" value="Inscripción Gratis">
            </form>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Accesso a talleres y conferencias</li>
                <li class="paquete__elemento">Accesso a las grabaciones</li>
                <li class="paquete__elemento">Camisa del Evento</li>
                <li class="paquete__elemento">Comida y bebída</li>
            </ul>

            <p class="paquete__precio" href="">$199</p>
        </div>

        <div class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Accesso a talleres y conferencias</li>
                <li class="paquete__elemento">Accesso a las grabaciones</li>
            </ul>

            <p class="paquete__precio" href="">$49</p>
        </div>
    </div>
</main>