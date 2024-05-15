

<div class="container mt-4">
    <div class="row">
        <!-- Recurso 1 -->
        <?php $idobra = $viewmodel[1]['id_obra'];
        $idusuario = $viewmodel[0]['usuario_idusuario']; ?>
        <div class="col">
            <div class="mb-3">
                <img src="<?php echo ROOT_URL .'assets/images/'.$viewmodel[0]['nombreobra']?>" alt="Foto" class="img-thumbnail">
                <h3><?= $viewmodel[0]['titulo']?></h3>
                <p><strong><?= $viewmodel[0]['nombre']?></strong></p>
            </div>
        </div>

        <div class="col">
            <form  action="<?php echo ROOT_URL . 'shares/trade/?id=' . $viewmodel[0]['id_obra'] . '&idUsuario=' .
                $_SESSION['user_data']['idusuario'] . '&id2=' . $idobra . '&idUsuario2=' . $idusuario ?>"
                   method="POST">
                <div class="mb-3">
                    <label>Duración para el intercambio:</label>
                    <input type="text" name="duracion" class="form-control" placeholder="Duración en días"/>
                </div>
                <input class="btn btn-primary" name="submit" type="submit" value="Intercambiar"/>
                <a class="btn btn-danger" href="<?php echo ROOT_URL ?>shares">Cancelar</a>
            </form>
        </div>

        <!-- Recurso 2 -->
        <div class="col">
            <div class="mb-3">
                <img src="<?php echo ROOT_URL .'assets/images/'.$viewmodel[1]['nombreobra']?>" alt="Foto" class="img-thumbnail">
                <h3><?= $viewmodel[1]['titulo']?></h3>
                <p><strong><?= $viewmodel[1]['nombre']?></strong></p>
            </div>
        </div>
    </div>
</div>

