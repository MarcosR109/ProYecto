<style>
    .carousel-item img {
        height: 800px;
        object-fit: cover;
    }
    body {
        overflow-x: hidden; /* Evitar desplazamiento horizontal */
    }

</style>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="<?= ROOT_URL ?>assets/images/Fuji.olas_.jpg" class="d-block w-100" alt="Hokusai">
            <div class="carousel-caption d-none d-md-block text-light">
                <h5>Les Nymphéas</h5>
                <p><cite>Claude Monet</cite></p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="<?php echo ROOT_URL ?>assets/images/fondo.jpg" class="d-block w-100 " alt="Fotón">
            <div class="carousel-caption d-none d-md-block text-light">
                <h5>El último viaje del «Temerario»</h5>
                <p><cite>Joseph Mallord William Turner</cite></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= ROOT_URL ?>assets/images/fondo2.jpg" class="d-block w-100" alt="Fotón">
            <div class="carousel-caption d-none d-md-block text-light">
                <h5>No debería haber salido un jueves.</h5>
                <p><cite>Marcos Daniel Rodríguez</cite></p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="catalogo">
    <div class="card-header bg-dark text-light mt-1">
        <h1>Explora el catálogo</h1>
    </div>
    <div class="col-md-4">
        <div id="catalogo"></div>

        <div class="card-body">
            <h1 class="card-title"><strong>Bienvenido a TrArT</strong></h1>
            <p class="card-text">
                Aquí podrás encontrar e intercambiar obras con otros usuarios interesados, date un paseo por
                nuestro catálogo.</p>
            <a href="<?php echo ROOT_URL . 'shares' ?>" class="btn btn-primary">Ver catálogo completo</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($viewmodel as $item): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="<?php echo ROOT_URL . "assets/images/" . $item['nombreobra']; ?>"
                         class="card-img-top img-fluid d-block" style="height: 200px; object-fit: cover;" alt="...">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $item['titulo']; ?></h3>
                        <p class="card-text"><?php echo $item['descripcion']; ?>.</p>
                        <h5><?php echo $item['nombre']; ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-md-4">
            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                <a href="<?php echo ROOT_URL . 'shares' ?>" class="btn btn-primary">Ver catálogo completo</a>
            </div>
        </div>


    </div>


</section>