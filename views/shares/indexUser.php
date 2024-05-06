<div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
        <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH ?>shares/add">Añadir obra</a>
    <?php endif ?>
    <div class="container">
    <?php foreach ($viewmodel as $item): ?>
    <div class="well">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo ROOT_URL . "assets/images/" . $item['nombreobra'] ?>" class="card-img-top"
                         alt="Obra">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?php echo $item['titulo']; ?></strong></h5>
                        <p class="card-text">Autor: <strong><?php echo $item['nombre']; ?></strong></p>
                        <p class="card-text">Formato: <?php echo $item['formato']; ?></p>
                        <a href="<?php echo ROOT_URL.'shares/trade/?id='. $item['id_obra'] . '&idUsuario=' . $item["usuario_idusuario"] . '&id2=' . $_GET['idobra'] . '&idUsuario2=' . $_GET['idusuario']. '&duracion=1';?>" class="btn btn-primary">Intercambiar</a>
                    </div>
                </div>
                <a class="btn btn-default" href="<?php echo ROOT_PATH; ?>shares/view/<?= $item['id_obra'] ?>">Ver</a>
                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] == $item['usuario_idusuario']) { ?>
                    <a class="btn btn-info" href="<?php echo ROOT_URL; ?>shares/update/<?= $item['id_obra'] ?>">Editar</a>
                    <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares/delete/<?= $item['id_obra'] ?>">Eliminar</a>
                <?php } ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>