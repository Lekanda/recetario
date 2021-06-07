<?php
// Para cerrar la conexion de autenticacion. 1º traer el $_SESSION a la pantalla donde ponemos el boton de cerrar sesion.
if (!isset($_SESSION)) {
    session_start();
}
// var_dump($_SESSION);
$auth = $_SESSION['login'] ?? false;
// var_dump($auth);

if (!isset($inicio)) {
    $inicio = false;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etxeko Rezetak</title>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/inline/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js"></script> -->
    <link rel="stylesheet" type="text/css" href="http://192.168.2.3/recetario/public/build/css/app.css">


</head>

<body class="dark-mode">

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/recetario/public/index.php">
                    <img class="logo-header" src="http://192.168.2.3/recetario/public/build/img/logo.svg" alt="Logotipo de Etxeko Errezetak">
                </a>
                <h1>Etxeko Errezetak</h2>

                    <div class="mobile-menu">
                        <img src="http://192.168.2.3/recetario/public/build/img/barras.svg" alt="icono menu responsive">
                    </div>
                    <div class="derecha">
                        <img class="dark-mode-boton" src="http://192.168.2.3/recetario/public/build/img/dark-mode.svg">
                        <nav data-cy="navegacion-header" class="navegacion">
                            <a href="/receta/crear">+ Receta</a>
                            <a href="/categoria/crear">+ Categoria</a>
                            <a href="/documentacion">Doc</a>
                            <a href="/contacto">Contacto</a>
                            <?php if ($auth) : ?>
                                <a href="/logout">Cerrar Sesion</a>
                            <?php else : ?>
                                <a href="/login">Login</a>
                            <?php endif ?>
                        </nav>
                    </div>

            </div>
            <!--.barra-->

            <?php echo $inicio ? "<h1 data-cy='heading-sitio'>Venta de Casas De Lujo y Apartamentos Exclusivos</h1>" : ''; ?>

        </div>
    </header>


    <?php echo $contenido; ?>



    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav data-cy="navegacion-footer" class="navegacion">
                <a href="/receta/crear">+ Receta</a>
                <a href="/categoria/crear">+ Categoria</a>
                <a href="/documentacion">Doc</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p data-cy="copyright" class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy; Lekanda Dev</p>
    </footer>
    <script src="http://192.168.2.3/recetario/public/build/js/bundle.min.js"></script>

</body>

</html>