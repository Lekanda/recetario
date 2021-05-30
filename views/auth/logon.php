<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heding-login">Iniciar Sesion</h1>
    <?php foreach ($errores as $error) : ?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <form data-cy="formulario-login" method="POST" class="formulario">
        <fieldset>
            <legend>Introduce datos Personales</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Pon tu nombre" id="nombre" name="logon[nombre]" >

            <label for="apellidos">Apellidos</label>
            <input type="text" placeholder="Pon tu apellidos" id="apellidos" name="logon[apellidos]" >

            <label for="email">E-mail</label>
            <input  type="email" placeholder="Usuario: a@a.com" id="email" name="logon[email]" >

            <label for="alias">Alias</label>
            <input type="text" placeholder="Pon tu alias" id="alias" name="logon[alias]" >

            <label for="password">Contraseña</label>
            <input data-cy="input-pass-login" type="password" placeholder="Contraseña: 111" id="password" name="logon[password]" >
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>