<main class="auth">
    <h2 class="auth__encabezado"><?php echo $titulo ?></h2>
    <p class="auth__texto"> <?php echo $authTexto ?></p>

    <form class="formulario">
        <div class="formulario__campo">
            <label class="formulario__label" for="nombre">Nombre</label>
            <input type="text" class="formulario__input" placeholder="Tu Nombre" id="nombre" name="nombre" />
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="apellido">Apellido</label>
            <input type="text" class="formulario__input" placeholder="Tu Apellido" id="apellido" name="apellido" />
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input type="email" class="formulario__input" placeholder="Tu Email" id="email" name="email" />
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input type="password" class="formulario__input" placeholder="Tu Password" id="password" name="password" />
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repetir Password</label>
            <input type="password" class="formulario__input" placeholder="Repetir Password" id="password2" name="password2" />
        </div>

        <input type="submit" class="formulario__submit" value="Crear Cuenta" />
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar Sesión</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>
    </div>
</main>