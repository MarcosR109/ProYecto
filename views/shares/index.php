<div>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-1 col-lg-2 p-0 bg-light">
                <div class="mb-3">
                    <h2 class="p-3">Filtrar</h2>
                    <form action="<?= ROOT_URL.'shares/filter' ?>" id="filtroForm" method="POST" class="p-3">
                        <div class="mb-3">
                            <label class="form-label">Filtrar por:</label>
                            <select class="form-select" id="filtro" name="filtro">
                                <option value="viewFromGenre/">Género</option>
                                <option value="viewFromMedium/">Formato</option>
                            </select>
                        </div>
                        <div id="filtro-genero" class="mb-3">
                            <label class="form-label" for="filtro1">Opción:</label>
                            <select required class="form-select" name="filtro1">
                                <?php
                                $modeloShare = new ShareModel();
                                $generos = $modeloShare->cargaGeneros();
                                foreach ($generos as $genero):
                                    ?>
                                    <option value="<?php echo $genero['NOMBREGENERO']?>"><?php echo $genero['NOMBREGENERO']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div id="filtro-medio" class="mb-3" style="display: none;">
                            <label class="form-label" for="filtro2">Opción:</label>
                            <select required class="form-select" name="filtro2">
                                <option value="foto">Foto</option>
                                <option value="cuadro">Cuadro</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>

                    <script>
                        document.getElementById('filtro').addEventListener('change', function() {
                            var filtro = this.value;
                            if (filtro === 'viewFromGenre/') {
                                document.getElementById('filtro-genero').style.display = 'block';
                                document.getElementById('filtro-medio').style.display = 'none';
                            } else if (filtro === 'viewFromMedium/') {
                                document.getElementById('filtro-genero').style.display = 'none';
                                document.getElementById('filtro-medio').style.display = 'block';
                            }
                        });
                    </script>

                </div>
                <?php if (isset($_SESSION['is_logged_in']) && !$_SESSION['is_admin']): ?>
                    <a class="btn btn-primary btn-share mb-3 m-lg-2" href="<?php echo ROOT_URL ?>shares/add">Añadir obra</a>
                <?php endif ?>
            </aside>

            <div class="col-md-11 col-lg-10">
                <div class="container">
                    <?php $count = 0; ?>
                    <div class="row">
                        <?php foreach ($viewmodel as $item): ?>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="<?php echo ROOT_URL . "assets/images/" . $item['nombreobra']; ?>"
                                     class="card-img-top img-fluid d-block" style="height: 300px; object-fit: cover;" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $item['titulo']; ?></h3>
                                    <p class="card-text"><?php echo $item['descripcion']; ?>.</p>
                                    <p class="card-text"><?= $item['nombreGenero']?></p>
                                    <h5><?php echo $item['nombre']; ?></h5>
                                    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] != $item['usuario_idUsuario'] && !$_SESSION['is_admin']) { ?>
                                        <a class="btn btn-info"
                                           href="<?php echo ROOT_URL; ?>shares/indexUser/?id=<?= $_SESSION['user_data']['idusuario'] . '&idusuario=' .
                                           $item['usuario_idUsuario'] . '&idobra=' . $item['id_obra'].'&trade='."1" ?>">Intercambiar</a>
                                    <?php } ?>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-default"
                                       href="<?php echo ROOT_URL; ?>shares/view/<?= $item['id_obra'] ?>">Ver</a>
                                    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['idusuario'] == $item['usuario_idUsuario']  || $_SESSION['is_admin']) { ?>
                                        <a class="btn btn-info"
                                           href="<?php echo ROOT_URL; ?>shares/update/<?= $item['id_obra'] ?>">Editar</a>
                                        <a class="btn btn-danger"
                                           href="<?php echo ROOT_URL; ?>shares/delete/<?= $item['id_obra'] ?>">Eliminar</a>
                                    <?php }; ?>
                                </div>
                            </div>
                        </div>

                        <?php $count++; ?>
                        <?php if ($count % 3 == 0): ?>
                    </div><div class="row">
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script>
  /*  function actualizarOpcionesSegundoFiltro() {
        var filtro = document.getElementById('filtro').value;
        var filtroOptions;

        if (filtro === 'viewFromGenre/') {
            filtroOptions = '<option value="figurativo">Figurativo</option>'
                + '<option value="abstracto">Abstracto</option>';
        } else if (filtro === 'viewFromMedium/') {
            filtroOptions = '<option value="foto">Foto</option>'
                + '<option value="cuadro">Cuadro</option>';
        }

        document.querySelector('#filtro-genero select').innerHTML = filtroOptions;
    }
    actualizarOpcionesSegundoFiltro();
    document.getElementById('filtro').addEventListener('change', function () {
        actualizarOpcionesSegundoFiltro();
    });
    document.getElementById('filtroForm').addEventListener('submit', function (event) {
        var filtro = document.getElementById('filtro').value;
        var filtro1 = document.querySelector('select[name="filtro1"]').value;
        var url = "<?php echo ROOT_URL . 'shares/'; ?>" + filtro + filtro1;
        window.location.href = url;
        event.preventDefault();
    });*/
</script>
