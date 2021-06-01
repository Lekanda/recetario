<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heding-login">Iniciar Sesion</h1>
    <?php foreach ($errores as $error) : ?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Introduce datos de Inicio de Sesion</legend>

            <label for="email">E-mail</label>
            <input  type="email" placeholder="Usuario: a@a.com" id="email" name="usuario[email]" >
            <span> </span>

            <label for="password">Contraseña</label>
            <input  type="password" placeholder="Contraseña: 123456" id="password" name="usuario[password]" >
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>