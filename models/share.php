<?php

class ShareModel extends model
{
    public function index()
    {
        $this->query('SELECT id_obra,titulo,descripcion,genero,formato, nombreobra, usuario.nombre, usuario_idUsuario
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario ORDER BY id_obra DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function view($id = null)
    {
        $this->query("SELECT id_obra,titulo,descripcion,genero,formato,nombreobra, usuario.nombre
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario where id_obra=$id");
        $row = $this->single();
        return $row;
    }

    public function delete($id = null)
    {
        $this->query("DELETE FROM obra where id_obra=$id");
        $this->execute();
        return;
    }

    public function indexUser($id = null, $idusuario = null, $idobra = null)
    {
        $this->query("SELECT id_obra,titulo,descripcion,genero,formato,nombreobra, usuario.nombre, usuario_idusuario
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario where usuario_idusuario=$id");
        $rows = $this->resultSet();
        return $rows;
    }

    public function update($id = null)
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {
            if ($post['TITULO'] == '' || $post['DESCRIPCION'] == '') {
                messages::setMsg('Porfavor añade un título y una descripción', 'error');
                return null;
            }

            // Insert into MySQL
            $this->query('UPDATE obra SET titulo=:titulo, descripcion=:descripcion, formato=:formato, genero=:genero WHERE id_obra =:id');
            $this->bind(':titulo', $post['TITULO']);
            $this->bind(':descripcion', $post['DESCRIPCION']);
            $this->bind(':formato', $post['FORMATO']);
            $this->bind(':genero', $post['GENERO']);
            $this->bind(':id', $id);
            $this->execute();

            // Redirect
            header('Location: ' . ROOT_URL . 'shares');
        } else {
            $this->query("SELECT ID_OBRA,TITULO,DESCRIPCION,FORMATO,GENERO FROM obra where id_OBRA=$id");
            $row = $this->single();
            return $row;
        }
        return null;
    }
    public function trade($id = null, $idUsuario = null, $id2 = null, $idUsuario2 = null)
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($_POST['submit'])) {
            if ($_POST['duracion'] == '') {
                messages::setMsg('Porfavor establece una duración para el intercambio.', 'error');
                return null;
            }
            if ($_POST['submit']) {
                messages::setMsg("Esto funciona por magia negra.", 'successMsg');
            }
            $duracion = $post['duracion'];
            $this->query("INSERT INTO USUARIO_INTERCAMBIA (Obra_ID_OBRA,usuario_idusuario,duracion,confirmacion) 
                values (:id,:idusuario,:duracion,1),(:id2,:idusuario2,:duracion,1)");
            $this->bind(":id", $id);
            $this->bind(":idusuario", $idUsuario);
            $this->bind(":idusuario2", $idUsuario2);
            $this->bind(":duracion", $duracion);
            $this->bind(":id2", $id2);
            $this->execute();
            if ($this->lastInsertId()) {
                messages::setMsg("Oleeeee mi rey", 'successMsg');
            }
        } else {
            $this->query("SELECT id_obra, usuario_idusuario, nombreobra FROM obra 
              INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario 
              WHERE id_obra IN (:id, :id2) AND usuario_idusuario IN (:idusuario, :idusuario2)");
            $this->bind(":id", $id);
            $this->bind(":id2", $id2);
            $this->bind(":idusuario", $idUsuario);
            $this->bind(":idusuario2", $idUsuario2);
            $this->execute();
            $rows = $this->resultSet();
            return $rows;
        }
        return null;
    }


    public
    function search($search = null)
    {
        $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra, usuario.nombre
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario WHERE usuario.nombre LIKE '%" . $search .
            "%' OR obra.titulo LIKE '%" . $search . "%'");
        $rows = $this->resultSet();
        return $rows;
    }

    public
    function viewFromGenre($genre = "libre") //por defecto es libre para que no de error de PDO
    {
        $genre = trim($genre);
        $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra,usuario.nombre
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario WHERE genero = '" . $genre . "' ORDER BY GENERO");
        $rows = $this->resultSet();
        return $rows;
    }

    public
    function viewFromMedium($medium = "foto")
    {
        $medium = trim($medium);
        $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra, usuario.nombre
            FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario WHERE formato = '" . $medium . "'");
        $rows = $this->resultSet();
        return $rows;
    }


    public
    function add()
    {
        // Sanitize POST

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $nombreArchivo = pathinfo($_FILES["obra"]["name"], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES["obra"]["name"], PATHINFO_EXTENSION));
        $email = $_SESSION['user_data']['email'];
        $target_file = $nombreArchivo . "_" . $email . "." . $extension;
        if (isset($post['submit'])) {
            if ($post['titulo'] == '' || $post['descripcion'] == '' || $post['formato'] == '' || $_FILES['obra']["name"] == "") {
                messages::setMsg('Porfavor, introduce al menos título, descripción, formato y una imagen de tu obra.', 'error');
                return;
            }

            $genero = $post['genero'];

            $this->query("SELECT ID FROM GENERO WHERE NOMBREGENERO = :genero");
            $this->bind(":genero", $genero);
            $idgenero = $this->single();
            if (!$idgenero) {
                $this->query("INSERT INTO GENERO (NOMBREGENERO) VALUES (:genero)");
                $this->bind(":genero", $genero);
                $this->execute();
                $idgenero = $this->lastInsertId();
            }
            if ($idgenero) {
                $this->query('INSERT INTO obra (titulo,descripcion, formato, genero,usuario_idUsuario,nombreobra) 
                VALUES(:titulo, :descripcion, :formato,:genero,:Usuario_idUsuario,:nombreobra)');
                $this->bind(':titulo', $post['titulo']);
                $this->bind(':descripcion', $post['descripcion']);
                $this->bind(':formato', $post['formato']);
                $this->bind(':genero', $idgenero['ID']);
                $this->bind(':nombreobra', $target_file);
                $this->bind(':Usuario_idUsuario', $_SESSION['user_data']['idusuario']);
                $this->execute();
                $this->subirObraImg();
            }
            else{
                messages::setMsg('Algo ha salido mal, llama a sistemas. ', 'error');
                header('Location: ' . ROOT_URL . 'shares');
            }
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'shares');
                exit();
            }
        } else {
            $this->query("SELECT nombregenero FROM GENERO");
            $rows = $this->resultSet();
            return $rows;
        }
        return;
    }

    public function cargaGeneros(){
        $this->query("SELECT NOMBREGENERO FROM GENERO");
        return $this->resultSet();
    }
    private
    function subirObraImg()
    {
        $target_dir = "./assets/images/";
        $nombreArchivo = pathinfo($_FILES["obra"]["name"], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES["obra"]["name"], PATHINFO_EXTENSION));

        $email = $_SESSION['user_data']['email'];

        $target_file = $target_dir . $nombreArchivo . "_" . $email . "." . $extension;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


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

        // Verificar si el archivo ya existe
        if (file_exists($target_file)) {
            echo "Lo siento, el archivo ya existe.";
            $uploadOk = 0;
        }

        // Verificar el tamaño del archivo (en este ejemplo, el límite es de 5MB)
        if ($_FILES["obra"]["size"] > 5000000) {
            echo "Lo siento, el archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Permitir ciertos formatos de archivo
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        // Verificar si $uploadOk está establecido en 0 por algún error
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no fue subido.";
            return false;
        } else {
            if (move_uploaded_file($_FILES["obra"]["tmp_name"], $target_file)) {
                echo "El archivo " . htmlspecialchars(basename($_FILES["obra"]["name"])) . " ha sido subido.";
                return true;
            } else {
                echo "Lo siento, ha ocurrido un error al subir tu archivo.";
                return false;
            }
        }
    }

}
