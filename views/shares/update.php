<head><link rel="stylesheet" href="../../assets/css/bootstrap.min.css"></head>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Actualizar obra</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?= ROOT_URL . 'shares/update/' . $viewmodel['ID_OBRA'] ?>">
            <div class="form-group">
                <label>Nombre de la obra</label>
                <input type="text" name="TITULO" class="form-control" id="Titulo" value="<?php echo $viewmodel['TITULO']; ?>"/>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="DESCRIPCION" class="form-control" id="Descripcion"><?php echo $viewmodel['DESCRIPCION']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Género</label>
                <input type="text" name="GENERO" class="form-control" id="Genero" value="<?php echo $viewmodel['GENERO']; ?>"/>
            </div>
            <div class="form-group">
                <label>Formato</label>
                <input type="text" name="FORMATO" class="form-control" id="Formato" value="<?php echo $viewmodel['FORMATO']; ?>"/>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="submit"/>
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
        </form>
    </div>
</div>
