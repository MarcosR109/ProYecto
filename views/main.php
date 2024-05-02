<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrArT</title>
    <meta name="author" content="DAW109 - Marcos Daniel Rodríguez">
    <meta name="description"
        content="En esta página pueden encontrarse los usuarios apasionados por el arte para crear su propio catálogo y establecer intercambios con otros usuarios.">
    <!-- Vincula el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Vincula el archivo JS de Bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Estilo para la imagen de fondo */
        .fullscreen-bg {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .fullscreen-bg__img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        /* Estilo para el botón */
        .center-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }
    </style>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo ROOT_URL?>">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <form class="d-flex col-2">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['is_logged_in'])): ?>
                        <li class="nav-item">Welcome <?php echo $_SESSION['user_data']['email']; ?></li>

                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item"><?php echo $_SESSION['user_data']['email']?></a></li>
                                        <li><a class ="dropdown-item" href=<?php echo ROOT_URL.'/shares' ?>>Ir al catálogo</a></li>
                                        <li><a class="dropdown-item" href="<?php echo ROOT_URL;?>users/logout">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)">xd</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Link</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Identificarse</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">Registrarse</a></li>
                    <?php endif;?>

                </ul>
            </div>
        </div>
    </nav>


<?php Messages::display();?>
<?php require $view;?><!-- /.container -->
</body>

</html>