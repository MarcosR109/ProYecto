<div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
        <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Añadir obra</a>
    <?php endif; ?>
    <div class="container">
        <h2>Filtrar</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Filtrar por:</label>
                <select class="form-select" id="filtro" name="filtro">
                    <option value="genero">Género</option>
                    <option value="formato">Formato</option>
                    <option value="nombre">Nombre</option>
                </select>
            </div>
            <div id="filtro-genero" class="mb-3">
                <label class="form-label">Género</label>
                <select class="form-select" name="genero">
                    <option selected>Seleccionar Género</option>
                    <option value="figurativo">Figurativo</option>
                    <option value="abstracto">Abstracto</option>
                    <option value="retrato">Retrato</option>
                    <option value="libre">Libre</option>
                </select>
            </div>
            <div id="filtro-formato" class="mb-3" style="display: none;">
                <label class="form-label">Formato</label>
                <select class="form-select" name="formato">
                    <option selected>Seleccionar Formato</option>
                    <option value="foto">Foto</option>
                    <option value="cuadro">Cuadro</option>
                </select>
            </div>
            <div id="filtro-nombre" class="mb-3" style="display: none;">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
            </div>
            <button type="submit" class="btn btn-success btn-share" href="<?php $_POST["genero"]?>"Filtrar</button>
            <?php /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Verificar si se ha enviado un filtro
                if (isset($_POST["filtro"])) {
                    $filtro = $_POST["filtro"];
                    switch ($filtro) {
                        case 'genero':
                            header("Location: indexFromGenre.php");
                            exit();
                        case 'formato':
                            header("Location: indexFromMedium.php");
                            exit();
                        case 'nombre':
                            header("Location: indexFromTitle.php");
                            exit();
                        case 'autor':
                            header("Location: indexFromAuthor.php");
                            exit();
                        default:
                            // Filtro no reconocido, manejar error o redirigir a una página por defecto
                            break;
                    }
                }
            } */?>

        </form>
    </div>

    <script>
        document.getElementById('filtro').addEventListener('change', function () {
            var filtro = this.value;
            var divs = document.querySelectorAll('[id^="filtro-"]');
            divs.forEach(function (div) {
                div.style.display = 'none';
            });
            document.getElementById('filtro-' + filtro).style.display = 'block';
        });
    </script>
    <?php foreach ($viewmodel as $item): ?>
    <div class="well">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo "assets/images/" . $item['nombreobra'] ?>" class="card-img-top" alt="Obra">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['titulo']; ?></h5>
                        <p class="card-text"><?php echo $item['formato']; ?></p>
                        <a href="#" class="btn btn-primary disabled">Intercambiar</a>
                    </div>
                </div>
                <a class="btn btn-default" href="<?php echo ROOT_PATH; ?>shares/view/<?= $item['id_obra'] ?>">Go
                </a>
                <a class="btn btn-info" href="<?php echo ROOT_URL; ?>shares/update/<?= $item['id_obra'] ?>">Update
                </a>
                <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares/delete/<?= $item['id_obra'] ?>">Delete
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>