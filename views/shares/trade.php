<head>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Intercambio</h3>
    </div>
    <?php $idobra = $viewmodel[1]['id_obra'];
    $idusuario = $viewmodel[0]['usuario_idusuario']; ?>
    <?php foreach ($viewmodel

    as $item): ?>
    <div class="panel-body">
        <form method="post"
              action="<?php echo ROOT_URL . 'shares/trade/?id=' . $item['id_obra'] . '&idUsuario=' .
                  $_SESSION['user_data']['idusuario'] . '&id2=' . $idobra . '&idUsuario2=' . $idusuario ?>"
        <?php endforeach; ?>>
        <div class="form-group">
            <label>Duración para el intercambio</label>
            <input type="text" name="duracion" class="form-control" id="duracion"/>
        </div>
        <input class="btn btn-primary" name="submit" type="submit" value="submit"/>
        <a class="btn btn-danger" href="<?php echo ROOT_URL ?>shares">Cancel</a>
        </form>

    </div>
</div>
