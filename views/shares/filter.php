<div class="row">
    <?php foreach ($viewmodel as $item): ?>
    <div class="col-md-4">
        <div class="card mb-3">
            <img src="<?php echo ROOT_URL . "assets/images/" . $item['nombreobra'];?>" class="card-img-top img-fluid d-block" style="height: 400px; object-fit: cover;" alt="...">
            <div class="card-body">
                <h3 class="card-title"><?php echo $item['titulo'];  ?></h3>
                <p class="card-text"><?php echo $item['descripcion'];?>.</p>
                <h5><?php echo $item['nombre']; ?></h5>
                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] == $item['usuario_idUsuario']  || $_SESSION['is_admin']) { ?>
                    <a class="btn btn-info"
                       href="<?php echo ROOT_URL; ?>shares/update/<?= $item['id_obra'] ?>">Editar</a>
                    <a class="btn btn-danger"
                       href="<?php echo ROOT_URL; ?>shares/delete/<?= $item['id_obra'] ?>">Eliminar</a>
                <?php }; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>