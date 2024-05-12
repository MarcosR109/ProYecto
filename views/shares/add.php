<head>
    <link rel="icon" type="image/x-icon" href="<?= ROOT_URL ?>assets/images/icon.ico">
</head>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Añade tu obra!</h3>
    </div>
    <div class="panel-body">
        <form method="post" enctype="multipart/form-data" action="<?= ROOT_URL . 'shares/add' ?>">
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="titulo" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <select class="form-select" name="formato" aria-label="Default select example">
                    <option selected>Formato</option>
                    <option value="foto">Foto</option>
                    <option value="cuadro">Cuadro</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-select" name="genero" aria-label="Default select example" id="mySelect"
                        onchange="showInput(this)">
                    <option>Género</option>
                    <?php $sharemodel = new ShareModel();
                    $generos = $sharemodel->cargaGeneros();
                    foreach ($generos as $genero): ?>
                        <option value="<?php echo $genero['id'] ?>"><?php echo $genero['NOMBREGENERO'] ?></option>
                    <?php endforeach; ?>
                    <option value="anadir">Añadir género</option>
                </select>
                <input placeholder="Añadir género " name="generoinput" type="text" id="textInput"
                       style=" display: none;">
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

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="obra" name="obra">
                <label class="input-group-text" for="inputGroupFile02">Subir obra</label>
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit"/>
            <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>shares">Cancel</a>
        </form>
    </div>
</div>