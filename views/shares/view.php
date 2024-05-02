<head><link rel="stylesheet" href="../../assets/css/bootstrap.min.css"></head>
<div>


    <div class="well">
        <div class="card">
            <img src="<?php echo ROOT_URL."/assets/images/" . $viewmodel['nombreobra'] ?>" class="card-img-top" alt="Obra">
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
        <a class="btn btn-default" href="<?php echo ROOT_PATH; ?>shares/view/<?= $viewmodel['id_obra'] ?>" target="_blank">Go
        </a>
    </div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
        <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
    <?php endif; ?>
</div>
