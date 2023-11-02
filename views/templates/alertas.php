<?php
foreach ($alertas as $tipo => $valor) {
    foreach ($valor as $mensaje) {
?>

        <div class="alerta alerta__<?php echo $tipo; ?>"><?php echo $mensaje; ?></div>

<?php
    }
}

?>