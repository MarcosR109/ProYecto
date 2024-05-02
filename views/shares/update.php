<head><link rel="stylesheet" href="../../assets/css/bootstrap.min.css"></head>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Share Something!</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?= ROOT_URL . 'shares/update/' . $viewmodel['id_obra'] ?>">
            <div class="form-group">
                <label>Nombre de la obra</label>
                <input type="text" name="Titulo" class="form-control" id="Titulo" value="<?php echo $viewmodel['Titulo']; ?>"/>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="Descripcion" class="form-control" id="Descripcion"><?php echo $viewmodel['Descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Género</label>
                <input type="text" name="Genero" class="form-control" id="Genero" value="<?php echo $viewmodel['Genero']; ?>"/>
            </div>
            <div class="form-group">
                <label>Formato</label>
                <input type="text" name="Formato" class="form-control" id="Formato" value="<?php echo $viewmodel['Formato']; ?>"/>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
        </form>
    </div>
</div>
