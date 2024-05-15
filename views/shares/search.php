<div class="col-md-11 col-lg-10 mt-4">
    <div class="container">
        <?php $count = 0; ?>
        <div class="row">
            <?php foreach ($viewmodel as $item): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?php echo ROOT_URL . "assets/images/" . $item['nombreobra']; ?>"
                         class="card-img-top img-fluid d-block" style="height: 300px; object-fit: cover;" alt="...">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $item['titulo']; ?></h3>
                        <p class="card-text"><?php echo $item['descripcion']; ?>.</p>
                        <p class="card-text"><?= $item['nombreGenero']?></p>
                        <h5><?php echo $item['nombre']; ?></h5>
                        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] != $item['usuario_idUsuario'] && !$_SESSION['is_admin'] && $item['confirmacion']==null) { ?>
                            <a class="btn btn-info"
                               href="<?php echo ROOT_URL; ?>shares/indexUser/?id=<?= $_SESSION['user_data']['idusuario'] . '&idusuario=' .
                               $item['usuario_idUsuario'] . '&idobra=' . $item['id_obra'].'&trade='."1" ?>">Intercambiar</a>
                        <?php } ?>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default"
                           href="<?php echo ROOT_URL; ?>shares/view/<?= $item['id_obra'] ?>">Ver</a>
                        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] == $item['usuario_idUsuario']  || $_SESSION['is_admin']) { ?>
                            <a class="btn btn-info"
                               href="<?php echo ROOT_URL; ?>shares/update/<?= $item['id_obra'] ?>">Editar</a>
                            <a class="btn btn-danger"
                               href="<?php echo ROOT_URL; ?>shares/delete/<?= $item['id_obra'] ?>">Eliminar</a>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
            <?php if ($count % 3 == 0): ?>
        </div><div class="row">
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>