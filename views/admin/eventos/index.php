<h2 class="dashboard__encabezado"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Evento
    </a>
</div>

<!-- Lista de Eventos -->

<div class="dashboard__contenedor">
    <?php if (!empty($eventos)) { ?>
        <div class="table-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Evento</th>
                        <th scope="col" class="table__th">Categoria</th>
                        <th scope="col" class="table__th">Día y Hora</th>
                        <th scope="col" class="table__th">Ponente</th>
                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach ($eventos as $evento) { ?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $evento->nombre; ?>
                            </td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p class="text-center">No hay Eventos Aún</p>
    <?php } ?>
</div>

<?php
echo $paginacion;

?>