<div>
    <?php if (isset($_SESSION['is_logged_in'])): ?>
        <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH ?>shares/add">Añadir obra</a>
    <?php endif ?>
    <div class="container">
        <h2>Filtrar</h2>
        <form action="" id="filtroForm" method="POST">
            <div class="mb-3">
                <label class="form-label">Filtrar por:</label>
                <select class="form-select" id="filtro" name="filtro">
                    <option selected value="viewFromGenre/">Género</option>
                    <option value="viewFromMedium/">Formato</option>
                </select>
            </div>
            <div id="filtro-genero" class="mb-3">
                <label class="form-label" for="filtro1">Opción:
                    <select  required class="form-select" name="filtro1">
                        <option selected value="figurativo">Figurativo</option>
                        <option value="abstracto">Abstracto</option>
                        <option value="retrato">Retrato</option>
                        <option value="libre">Libre</option>
                        <option value="foto">Foto</option>
                        <option value="cuadro">Cuadro</option>
                    </select>
                </label>
            </div>
            <button type="submit">Filtrar</button>
            <a href="<?php if ($_POST ["filtro"] = "viewFromGenre") {
                echo ROOT_PATH . 'shares/' . $_POST["filtro"] . $_POST["filtro1"];
            }
            else{
                echo ROOT_URL. 'shares/'.$_POST["filtro"].$_POST["filtro1"];
            }?>">Filtro</a>

        </form>
    </div>
    <script>

        function actualizarOpcionesSegundoFiltro() {
            var filtro = document.getElementById('filtro').value;
            var filtroOptions;

            if (filtro === 'viewFromGenre/') {
                filtroOptions = `
                <option value="figurativo">Figurativo</option>
                <option value="abstracto">Abstracto</option>
                <option value="retrato">Retrato</option>
                <option selected value="libre">Libre</option>
            `;
            } else if (filtro === 'viewFromMedium/') {
                filtroOptions = `
                <option value="foto">Foto</option>
                <option value="cuadro">Cuadro</option>
            `;
            }

            document.querySelector('#filtro-genero select').innerHTML = filtroOptions;
        }

        // Llama a la función al cargar la página para establecer las opciones del segundo filtro
        actualizarOpcionesSegundoFiltro();

        // Escucha el evento change del primer filtro y actualiza las opciones del segundo filtro
        document.getElementById('filtro').addEventListener('change', function () {
            actualizarOpcionesSegundoFiltro();
        });

        // Escucha el evento submit del formulario y redirige según las opciones seleccionadas
        document.getElementById('filtroForm').addEventListener('submit', function (event) {
            var filtro = document.getElementById('filtro').value;
            var filtro1 = document.querySelector('select[name="filtro1"]').value;
            var url = "<?php echo ROOT_PATH . 'shares/'; ?>" + filtro + filtro1;
            window.location.href = url;
            event.preventDefault();
        });
    </script>

    <?php foreach ($viewmodel

    as $item): ?>
    <div class="well">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo ROOT_URL . "assets/images/" . $item['nombreobra'] ?>" class="card-img-top"
                         alt="Obra">
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