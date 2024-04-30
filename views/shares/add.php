<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Share Something!</h3>
  </div>
  <div class="panel-body">
    <form method="post" enctype="multipart/form-data" action="<?=ROOT_URL.'shares/add' ?>">
    	<div class="form-group">
    		<label>Título</label>
    		<input type="text" name="titulo" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Descripción</label>
    		<textarea name="descripcion" class="form-control"></textarea>
    	</div>
    	<div class="form-group">
            <select class="form-select"   name="formato" aria-label="Default select example">
                <option selected>Formato</option>
                <option value="foto">Foto</option>
                <option value="cuadro">Cuadro</option>
            </select>
    	</div>
        <div class="form-group">
            <select class="form-select" name ="genero" aria-label="Default select example">
                <option selected>Género</option>
                <option  value="figurativo">Figurativo</option>
                <option  value="abstracto">Abstracto</option>
                <option  value="retrato">Retrato</option>
                <option  value="libre">Libre</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="obra" name="obra">
            <label class="input-group-text" for="inputGroupFile02">Subir obra</label>
        </div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
    </form>
  </div>
</div>