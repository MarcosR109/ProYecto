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

                    <?php } else {
                        ?> <a class="btn btn-info"
                              href="<?php echo ROOT_URL; ?>shares/indexUser/?id=<?= $_SESSION['user_data']['idusuario'] . '&idusuario=' .
                              $viewmodel['usuario_idUsuario'] . '&idobra=' . $viewmodel['id_obra'] . '&trade=' . "1" ?>">Intercambiar</a> <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div>


    <div class="well">
        <div class="card">
            <img src="<?php echo ROOT_URL . "/assets/images/" . $viewmodel['nombreobra'] ?>" class="card-img-top"
                 alt="Obra">
            <div class="card-body">
                <h5 class="card-title"><?php echo $viewmodel['titulo']; ?></h5>
                <p class="card-text"><?php echo $viewmodel['formato']; ?></p>
                <a href="#" class="btn btn-primary disabled">Intercambiar</a>
            </div>
        </div>
        <h3><?php echo $viewmodel['titulo']; ?></h3>
        <small><?php echo $viewmodel['formato']; ?></small>
        <small><?php echo $viewmodel['genero']; ?></small>
        <hr/>
        <p><?php echo $viewmodel['descripcion']; ?></p>
        <br/>
        <a class="btn btn-default" href="<?php echo ROOT_URL; ?>shares/view/<?= $viewmodel['id_obra'] ?>"
           target="_blank">Go
        </a>
        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] == $viewmodel['usuario_idUsuario']) { ?>
            <a class="btn btn-info" href="<?php echo ROOT_URL; ?>shares/update/<?= $viewmodel['id_obra'] ?>">Editar</a>
            <a class="btn btn-danger"
               href="<?php echo ROOT_URL; ?>shares/delete/<?= $viewmodel['id_obra'] ?>">Eliminar</a>
        <?php } ?>
    </div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
        <a class="btn btn-success btn-share" href="<?php echo ROOT_URL; ?>shares/add">Share Something</a>
    <?php endif; ?>
</div>
