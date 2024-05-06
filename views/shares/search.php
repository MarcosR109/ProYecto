<?php  /*if (count($viewmodel) <= 0)
{
    header("location: ", "index");
    exit();
}
else{ *///Esto no funciona y no sé por qué
foreach ($viewmodel as $item): ?>
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
                    <a href="#" class="btn btn-primary disabled">Intercambiar</a>
                </div>
            </div>
            <a class="btn btn-default" href="<?php echo ROOT_PATH; ?>shares/view/<?= $item['id_obra'] ?>">Ver</a>
            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] == $item['usuario_idUsuario']) { ?>
                <a class="btn btn-info" href="<?php echo ROOT_URL; ?>shares/update/<?= $item['id_obra'] ?>">Editar</a>
                <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares/delete/<?= $item['id_obra'] ?>">Eliminar</a>
            <?php } ?>

        </div>
    </div>
    <?php endforeach; ?>
</div>