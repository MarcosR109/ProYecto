
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
                <select class="form-select"   name="formato" aria-label="Default select example">
                    <option selected>Formato</option>
                    <option value="foto">Foto</option>
                    <option value="cuadro">Cuadro</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-select" name ="genero" aria-label="Default select example" id="mySelect" onchange="showInput(this)">
                    <option selected>Género</option>
                    <?php $sharemodel = new ShareModel();
                    $generos=$sharemodel->cargaGeneros();
                    foreach ($generos as $genero): ?>
                        <option  value="<?php echo $genero['ID']?>"><?php echo $genero['NOMBREGENERO']?></option>
                    <?php endforeach;  ?>
                    <option value="anadir">Añadir género</option>
                </select>
                <input placeholder="Añadir género " name="generoinput" type="text" id="textInput" style=" display: none;">
            </div>


            <script>
                function showInput(select) {
                    var input = document.getElementById("textInput");
                    if (select.value === "anadir") {
                        input.style.display = "block";
                    } else {
                        input.style.display = "none";
                    }
                }
            </script>
            <input class="btn btn-primary" name="submit" type="submit" value="submit"/>
            <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>shares">Cancel</a>
        </form>
    </div>
</div>
