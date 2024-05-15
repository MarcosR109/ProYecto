<section class="vh-100 mt-0 mb-0" style="background-image: url('<?= ROOT_URL . 'assets/images/fondoAdd.jpg' ?>');
        background-size:cover;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-1">
                                <img src="<?php echo ROOT_URL . "assets/images/11009posdl.jpg" ?>" class="img-fluid mb-4" style="" alt="Sample image">
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-2">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Añade tu obra!</p>
                                <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data" action="<?= ROOT_URL . 'shares/add' ?>">

                                    <div class="form-group mb-4">
                                        <label>Título</label>
                                        <input type="text" name="titulo" class="form-control form-control-lg"/>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Descripción</label>
                                        <textarea name="descripcion" class="form-control form-control-lg"></textarea>
                                    </div>
                                    <div class="form-group mb-4">
                                        <select class="form-select form-control-lg" name="formato" aria-label="Default select example">
                                            <option selected>Formato</option>
                                            <option value="foto">Foto</option>
                                            <option value="cuadro">Cuadro</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <select class="form-select form-control-lg" name="genero" aria-label="Default select example" id="mySelect" onchange="showInput(this)">
                                            <option>Género</option>
                                            <?php $sharemodel = new ShareModel();
                                            $generos = $sharemodel->cargaGeneros();
                                            foreach ($generos as $genero): ?>
                                                <option value="<?php echo $genero['id'] ?>"><?php echo $genero['NOMBREGENERO'] ?></option>
                                            <?php endforeach; ?>
                                            <option value="anadir">Añadir género</option>
                                        </select>
                                        <input placeholder="Añadir género " name="generoinput" type="text" id="textInput" style="display: none;" class="form-control form-control-lg">
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="file" class="form-control form-control-lg" id="obra" name="obra">
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 m-lg-3">
                                        <input class="btn btn-primary btn-lg m-3" name="submit" type="submit" value="Subir"/>
                                        <a class="btn btn-danger btn-lg ml-3 m-3" href="<?php echo ROOT_URL; ?>shares">Cancelar</a>
                                    </div>
                                </form>
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
