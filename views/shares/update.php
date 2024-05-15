<section class="vh-100 mt-0 mb-0" style="background-image: url('<?= ROOT_URL . 'assets/images/fondoupdate.jpg' ?>');
        background-size: cover">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Actualizar obra</p>
                                <form class="mx-1 mx-md-4" method="post" action="<?= ROOT_URL . 'shares/update/' . $viewmodel['ID_OBRA'] ?>">

                                    <div class="form-group mb-4">
                                        <label>Nombre de la obra</label>
                                        <input type="text" name="titulo" class="form-control form-control-lg" id="Titulo" value="<?php echo $viewmodel['TITULO']; ?>"/>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Descripción</label>
                                        <textarea name="descripcion" class="form-control form-control-lg" id="Descripcion"><?php echo $viewmodel['DESCRIPCION']; ?></textarea>
                                    </div>
                                    <div class="form-group mb-4">
                                        <select class="form-select form-control-lg" name="formato" aria-label="Default select example">
                                            <option selected>Formato</option>
                                            <option value="foto">Foto</option>
                                            <option value="cuadro">Cuadro</option>
                                        </select>
                                    </div>
                                    <?php $sharemodel = new ShareModel();
                                    $generos=$sharemodel->cargaGeneros(); ?>
                                    <div class="form-group mb-4">
                                        <select class="form-select form-control-lg" name="genero" aria-label="Default select example" id="mySelect" onchange="showInput(this)">
                                            <option>Género</option>
                                            <?php foreach ($generos as $genero): ?>
                                                <option  value="<?php echo $genero['id']?>"><?php echo $genero['NOMBREGENERO']?></option>
                                            <?php endforeach;  ?>
                                            <option value="anadir">Añadir género</option>
                                        </select>
                                        <input placeholder="Añadir género " name="generoinput" type="text" id="textInput" style=" display: none;" class="form-control form-control-lg">
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input class="btn btn-primary btn-lg m-3" name="submit" type="submit" value="Subir"/>
                                        <a class="btn btn-danger btn-lg ml-3 m-3"   href="<?php echo ROOT_URL; ?>shares">Cancelar</a>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-5 d-flex align-items-center order-1 order-lg-2">
                                <img src="<?php echo ROOT_URL . "assets/images/".$viewmodel['nombreobra'] ?>" class="img-fluid" style="" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
