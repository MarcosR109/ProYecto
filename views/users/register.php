<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrArT</title>
    <meta name="author" content="DAW109 - Marcos Daniel Rodríguez">
    <link rel="icon" type="image/x-icon" href="<?= ROOT_URL ?>assets/images/icon.ico">
    <meta name="description"
          content="En esta página pueden encontrarse los usuarios apasionados por el arte para crear su propio catálogo y establecer intercambios con otros usuarios.">
    <!-- Vincula el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Vincula el archivo JS de Bootstrap -->
    <script src="<?= ROOT_URL ?>assets/js/bootstrap.bundle.min.js"></script>
    <style>
        .logo {
            width: 50px;
            scale: 2.5;
            height: 50px;
        }
    </style>
</head>
<body style="background-image: url('<?= ROOT_URL . 'assets/images/516667ldsdl.jpg' ?>'); background-size: cover;">
<section class="vh-100" style="background-image: url('<?= ROOT_URL . 'assets/images/516667ldsdl.jpg' ?>'); background-size: cover;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <form class="mx-1 mx-md-4" method="post" action="<?= ROOT_URL . 'users/register' ?>">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" id="name"
                                                required   class="form-control form-control-lg"/>
                                            <label class="form-label" for="name">Nombre</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="email" name="email" id="email"
                                                required   class="form-control form-control-lg"/>
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="password" name="password" id="password"
                                                  required class="form-control form-control-lg" pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[A-Z])(?=.*[-\#\$\.\%\&\*])(?=.*[a-zA-Z]).{8,16}$" minlength="8"/>
                                            <label class="form-label" for="password">Contraseña</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" name="ciudad" id="ciudad"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="ciudad">Ciudad</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input class="btn btn-primary" name="submit" type="submit" value="Registrarse"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img src="<?php echo ROOT_URL . "assets/images/403403mtsdl.jpg" ?>"
                                     class="img-fluid" style="width: 500px;
                                                       height: 500px" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>