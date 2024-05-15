<?php

class ShareModel extends model
{
    public function index()
    {
        $this->query('SELECT id_obra,titulo,descripcion,genero,formato, nombreobra, usuario.nombre, obra.usuario_idUsuario,nombreGenero,usuario_intercambia.confirmacion
             FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario  INNER JOIN genero ON OBRA.GENERO = genero.ID
            LEFT JOIN usuario_intercambia on usuario_intercambia.Obra_ID_OBRA = obra.ID_OBRA ORDER BY id_obra DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function view($id = null)
    {
        $this->query("SELECT id_obra,titulo,descripcion,genero,formato,nombreobra, usuario.nombre, obra.usuario_idUsuario, genero.nombreGenero, usuario_intercambia.confirmacion
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario  INNER JOIN genero ON genero.ID = obra.GENERO  left join usuario_intercambia on obra.id_obra = usuario_intercambia.obra_id_obra where id_obra=$id");

        $row = $this->single();
        return $row;
    }

    public function delete($id = null)
    {
        $this->query("SELECT Obra_ID_OBRA FROM usuario_intercambia WHERE Obra_ID_OBRA=$id");
        $sin = $this->single();
        if ($sin) {
            $this->query("DELETE FROM usuario_intercambia WHERE OBRA_ID_OBRA=$id");
            $this->execute();
        } else {
            $this->query("DELETE FROM obra where id_obra=$id");
            $this->execute();
            return;
        }
    }

    public function indexUser($id = null, $idusuario = null, $idobra = null, $trade = null)
    {
        $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra, usuario.nombre, usuario_idusuario
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario WHERE usuario_idusuario = $id");
        $rows = $this->resultSet();
        {
            return $rows;
        }
    }

    public function update($id = null)
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {
            $genero = $post['genero'];
            $generoInput = $post['generoinput'];

            if ($generoInput) {
                $this->query("INSERT INTO genero (NOMBREGENERO) VALUES (:genero)");
                $this->bind(":genero", $generoInput);
                $this->execute();
                $genero = $this->lastInsertId();
            }

            $this->query('UPDATE obra SET titulo=:titulo, descripcion=:descripcion, formato=:formato, genero=:genero WHERE id_obra =:id');
            $this->bind(':titulo', $post['titulo']);
            $this->bind(':descripcion', $post['descripcion']);
            $this->bind(':formato', $post['formato']);
            $this->bind(':genero', $genero);
            $this->bind(':id', $id);
            $this->execute();
            header('Location: ' . ROOT_URL . 'shares');
        } else {
            $this->query("SELECT ID_OBRA,TITULO,DESCRIPCION,FORMATO,GENERO,nombreobra FROM obra where id_OBRA=$id");
            $row = $this->single();
            return $row;
        }
        return null;
    }

    public function trade($id = null, $idUsuario = null, $id2 = null, $idUsuario2 = null)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        try {
            if (isset($_POST['submit'])) {
                if ($_POST['duracion'] == '') {
                    messages::setMsg('Porfavor establece una duración para el intercambio.', 'error');
                    return null;
                }
                if ($_POST['submit']) {
                    messages::setMsg("Esto funciona por magia negra.", 'successMsg');
                }
                $duracion = $post['duracion'];
                $this->query("INSERT INTO usuario_intercambia (Obra_ID_OBRA,usuario_idusuario,duracion,confirmacion) 
                values (:id,:idusuario,:duracion,1),(:id2,:idusuario2,:duracion,1)");
                $this->bind(":id", $id);
                $this->bind(":idusuario", $idUsuario);
                $this->bind(":idusuario2", $idUsuario2);
                $this->bind(":duracion", $duracion);
                $this->bind(":id2", $id2);
                $this->execute();
                header('Location: ' . ROOT_URL . 'shares');
            }
        } catch (PDOException $a) {
            header('Location: ' . ROOT_URL . 'shares');
            return;
        }

        $this->query("SELECT id_obra, usuario_idusuario, nombreobra, titulo, usuario.nombre FROM obra 
              INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario 
              WHERE id_obra IN (:id, :id2) AND usuario_idusuario IN (:idusuario, :idusuario2)");
        $this->bind(":id", $id);
        $this->bind(":id2", $id2);
        $this->bind(":idusuario", $idUsuario);
        $this->bind(":idusuario2", $idUsuario2);
        $this->execute();
        $rows = $this->resultSet();
        $rows['trade'] = true;
        return $rows;
    }

    public
    function search($search = null)
    {
        $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra, usuario.nombre, confirmacion
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario LEFT JOIN usuario_intercambia ON obra.ID_OBRA = usuario_intercambia.obra_id_obra WHERE usuario.nombre LIKE '%" . $search .
            "%' OR obra.titulo LIKE '%" . $search . "%'");
        $rows = $this->resultSet();
        if (count($rows) <= 0) {
            header("location: ", "shares");
            messages::setMsg("No se ha encontrado " . $search . " . ", 'error');
            return;
        } else {
            return $rows;
        }
    }

    public
    function filter($filter = "libre") //por defecto es libre para que no de error de PDO
    {
        $filtro = $_POST['filtro'];
        $filter = $_POST['filtro1'];
        if ($filtro == "viewFromGenre/") {
            $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra,usuario.nombre, obra.usuario_idUsuario, confirmacion
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario INNER JOIN genero ON obra.GENERO=genero.ID LEFT JOIN usuario_intercambia on usuario_intercambia.obra_id_obra = obra.id_obra WHERE nombregenero = '" . $filter . "' ORDER BY GENERO");
            $rows = $this->resultSet();
            if (count($rows) <= 0) {
                messages::setMsg("No se han encontrado obras con " . $filter . " como género.", "error");
                header("Location: " . ROOT_URL . "shares/index");
            } else {
                return $rows;
            }
        } else {
            $medium = $_POST['filtro2'];
            $medium = trim($medium);
            $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra, usuario.nombre, confirmacion, obra.usuario_idUsuario
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario left join usuario_intercambia on usuario_intercambia.obra_id_obra = obra.id_obra WHERE formato = '" . $medium . "'");
            $rows = $this->resultSet();
            if (count($rows) <= 0) {
                header("location: ", "shares");
                messages::setMsg("No se han encontrado obras con " . $medium . " como formato.", "error");
                return $this->Index();
            } else {
                return $rows;
            }
        }
    }


    public
    function add()
    {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $nombreArchivo = pathinfo($_FILES["obra"]["name"], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES["obra"]["name"], PATHINFO_EXTENSION));
        $email = $_SESSION['user_data']['email'];
        $target_file = $nombreArchivo . "_" . $email . "." . $extension;
        if (isset($post['submit'])) {
            if ($post['titulo'] == '' || $post['descripcion'] == '' || $post['formato'] == '' || $post['genero']=='' || $_FILES['obra']["name"] == "") {
                messages::setMsg('Porfavor, introduce al menos título, descripción, formato y una imagen de tu obra.', 'error');
                return;
            }

            $genero = $post['genero'];
            $generoInput = $post['generoinput'];

            if ($generoInput) {
                $this->query("INSERT INTO genero (NOMBREGENERO) VALUES (:genero)");
                $this->bind(":genero", $generoInput);
                $this->execute();
                $genero = $this->lastInsertId();
            }

            $this->query('INSERT INTO obra (titulo,descripcion, formato, genero,usuario_idUsuario,nombreobra) 
                VALUES(:titulo, :descripcion, :formato,:genero,:Usuario_idUsuario,:nombreobra)');
            $this->bind(':titulo', $post['titulo']);
            $this->bind(':descripcion', $post['descripcion']);
            $this->bind(':formato', $post['formato']);
            $this->bind(':genero', $genero);
            $this->bind(':nombreobra', $target_file);
            $this->bind(':Usuario_idUsuario', $_SESSION['user_data']['idusuario']);
            $this->execute();
            $this->subirObraImg($target_file);
            messages::setMsg('Tu obra se ha subido satisfactoriamente. ', 'success');
            //header('Location: ' . ROOT_URL . 'shares');
            if ($this->lastInsertId()) {
                header('Location: ' . ROOT_URL . 'shares');
                exit();
            }
        }
        else
        {
            $this->query("SELECT id,nombregenero FROM genero");
            $rows = $this->resultSet();
            return $rows;
        }
        return;
    }

//Este método es para poder cargar los géneros para el filtrado sin tener que cambiar el resto de consultas desproporcionadamente.
    public
    function cargaGeneros()
    {
        $this->query("SELECT id,NOMBREGENERO FROM genero");
        return $this->resultSet();
    }

    private
    function subirObraImg($nombreArchivo)
    {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
        $nombreArchivo = "./assets/images/".$nombreArchivo;

        if (isset($_FILES["obra"]["name"])) {
            $check = getimagesize($_FILES["obra"]["tmp_name"]);
            if ($check !== false) {
                echo "El archivo es una imagen - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "El archivo no es una imagen.";
                $uploadOk = 0;
            }
        }

        if (file_exists($nombreArchivo)) {
            echo "Lo siento, el archivo ya existe.";
            $uploadOk = 0;
        }


        if ($_FILES["obra"]["size"] > 5000000) {
            echo "Lo siento, el archivo es demasiado grande.";
            $uploadOk = 0;
        }


        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no fue subido.";
            return false;
        } else {
            if (move_uploaded_file($_FILES["obra"]["tmp_name"], $nombreArchivo)) {
                echo "El archivo " . htmlspecialchars(basename($_FILES["obra"]["name"])) . " ha sido subido.";
                return true;
            } else {
                echo "Lo siento, ha ocurrido un error al subir tu archivo.";
                return false;
            }
        }
    }

}
