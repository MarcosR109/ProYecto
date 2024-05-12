<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Imagen del recurso -->
            <img src="<?php echo ROOT_URL . "/assets/images/" . $viewmodel['nombreobra'] ?>" class="img-fluid mb-3"
                 alt="Imagen del Recurso">
            <!-- Título del recurso -->
            <h2 class="mb-3"><?php echo $viewmodel['titulo']; ?></h2>
            <!-- Autor del recurso -->
            <p class="mb-3"><strong>Autor:</strong><?= $viewmodel['nombre'] ?></p>
            <p class="mb-3 card-text"><?= $viewmodel['descripcion'] ?></p>
            <p class="mb-3 card-footer"><?= $viewmodel['nombreGenero'] ?></p>
            <div class="mb-3">
                <div class="float-end">
                    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] == $viewmodel['usuario_idUsuario'] || $_SESSION['is_admin']) { ?>
                        <a class="btn btn-info"
                           href="<?php echo ROOT_URL; ?>shares/update/<?= $viewmodel['id_obra'] ?>">Editar</a>
                        <a class="btn btn-danger"
                           href="<?php echo ROOT_URL; ?>shares/delete/<?= $viewmodel['id_obra'] ?>">Eliminar</a>

                    <?php } elseif ($viewmodel['confirmacion']==null) {
                        ?> <a class="btn btn-info"
                              href="<?php echo ROOT_URL; ?>shares/indexUser/?id=<?= $_SESSION['user_data']['idusuario'] . '&idusuario=' .
                              $viewmodel['usuario_idUsuario'] . '&idobra=' . $viewmodel['id_obra'] . '&trade=' . "1" ?>">Intercambiar</a> <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>