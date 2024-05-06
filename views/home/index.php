<section class="fondo">
    <div class="fullscreen-bg">
        <img src="<?php echo ROOT_URL ?>assets/images/fondo.jpg" alt="Background" class="fullscreen-bg__img">
        <a href="#catalogo" class="btn btn-primary center-btn">Ver catálogo</a>
        <link rel="icon" href="<?php echo ROOT_URL ?>assets/images/logo.png" type="image/x-icon">
    </div>
</section>

<section class="catalogo">
    <div class="card-header bg-dark text-light mt-1">
        <h1>Explora el catálogo</h1>
    </div>
        <div class="col-md-4" >
            <div id="catalogo"></div>

            <div class="card-body">
                <h1 class="card-title"><strong>Bienvenido a TrArT</strong></h1>
                <p class="card-text">
                    Aquí podrás encontrar e intercambiar obras con otros usuarios interesados, date un paseo por
                    nuestro catálogo.</p>
                <a href="<?php echo ROOT_URL . '/shares'?>" class="btn btn-primary">Ver catálogo completo</a>
            </div>
        </div>
    <div class="row">
        <?php foreach ($viewmodel as $item): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="<?php echo ROOT_URL . "assets/images/" . $item['nombreobra'];?>" class="card-img-top img-fluid d-block" style="height: 200px; object-fit: cover;" alt="...">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $item['titulo'];  ?></h3>
                        <p class="card-text"><?php echo $item['descripcion'];?>.</p>
                        <h5><?php echo $item['nombre']; ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-md-4">
            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                <a href="<?php echo ROOT_URL . '/shares'?>" class="btn btn-primary">Ver catálogo completo</a>
            </div>
        </div>


    </div>



</section>