<?php

class ShareModel extends Model
{
    public function index()
    {
        $this->query('SELECT id_obra,titulo,descripcion,genero,formato, nombreobra FROM obra ORDER BY id_obra DESC');
        $rows = $this->resultSet();
        return $rows;
    }

    public function view($id = null)
    {
        $this->query("SELECT id_obra,titulo,descripcion,genero,formato,nombreobra FROM obra where id_obra=$id");
        $row = $this->single();
        return $row;
    }

    public function delete($id = null)
    {
        $this->query("DELETE FROM obra where id_obra=$id");
        $this->execute();
        return;
    }


    public function update($id = null)
    {
        // Sanitize POST data
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Verificar si se envió el formulario de actualización
        if (isset($post['submit'])) {
            // Verificar si los campos obligatorios están completos
            if ($post['Titulo'] == '' || $post['Descripcion'] == '' || $post['Genero'] == '') {
                Messages::setMsg('Por favor, complete todos los campos', 'error');
                return;
            }

            try {
                // Ejecutar la consulta de actualización
                $this->query('UPDATE obra SET Titulo=:titulo, Descripcion=:descripcion, Formato=:formato, Genero=:genero WHERE ID_OBRA=:id');
                $this->bind(':titulo', $post['Titulo']);
                $this->bind(':descripcion', $post['Descripcion']);
                $this->bind(':formato', $post['Formato']);
                $this->bind(':genero', $post['Genero']);
                $this->bind(':id', $id);
                $result = $this->execute();

                if ($result) {
                    // Redireccionar al éxito
                    header('Location: ' . ROOT_URL . 'shares');
                    exit();
                } else {
                    // Manejar error si la ejecución de la consulta falló
                    Messages::setMsg('Algo salió mal al actualizar el registro', 'error');
                }
            } catch (PDOException $e) {
                // Manejar cualquier excepción de base de datos
                Messages::setMsg('Error de base de datos: ' . $e->getMessage(), 'error');
            }
        } else {
            // Recuperar el registro a actualizar
            $this->query("SELECT * FROM obra WHERE ID_OBRA = :id");
            $this->bind(':id', $id);
            $row = $this->single();
            return $row;
        }
    return null;
    }

    public function trade($id = null)
    {

    }

    public function viewFromTitle($title = null)
    {
        $this->query("SELECT * FROM obra WHERE titulo LIKE '%" . $title . "%'");
        $rows = $this->resultSet();
        return $rows;
    }

    public function viewFromAuthor($name = null)
    {
        $this->query("SELECT * FROM obra INNER JOIN usuario ON obra.usuario_idUsuario = usuario.idusuario WHERE usuario.nombre LIKE '%" . $name . "%'");
        $rows = $this->resultSet();
        return $rows;
    }

    public function viewFromGenre($genre = "libre")
    {
        $genre = trim($genre);
        $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra FROM obra WHERE genero = '". $genre ."' ORDER BY GENERO");
        $rows = $this->resultSet();
        return $rows;
    }

    public function viewFromMedium($medium = null)
    {
        $medium=trim($medium);
        $this->query("SELECT id_obra, titulo, descripcion, genero, formato, nombreobra FROM obra WHERE formato = '" . $medium . "'");
        $rows = $this->resultSet();
        return $rows;
    }


    public function add()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $nombreArchivo = pathinfo($_FILES["obra"]["name"], PATHINFO_FILENAME); // Obtener el nombre del archivo sin la extensión
        $extension = strtolower(pathinfo($_FILES["obra"]["name"], PATHINFO_EXTENSION)); // Obtener la extensión del archivo

        $email = $_SESSION['user_data']['email']; // Obtener el email de la sesión

        $target_file = $nombreArchivo . "_" . $email . "." . $extension;

        if (isset($post['submit'])) {
            if ($post['titulo'] == '' || $post['descripcion'] == '' || $post['formato'] == '' || $_FILES['obra']["name"] == "") {
                Messages::setMsg('Porfavor, introduce al menos título, descripción, formato y una imagen de tu obra.', 'error');
                return;
            }
            $this->subirObraImg();
            // Insert into MySQL
            $this->query('INSERT INTO obra (titulo,descripcion, formato, genero,usuario_idUsuario,nombreobra) VALUES(:titulo, :descripcion, :formato,:genero,:Usuario_idUsuario,:nombreobra)');
            $this->bind(':titulo', $post['titulo']);
            $this->bind(':descripcion', $post['descripcion']);
            $this->bind(':formato', $post['formato']);
            $this->bind(':genero', $post['genero']);
            $this->bind(':nombreobra', $target_file);
            $this->bind(':Usuario_idUsuario', $_SESSION['user_data']['idusuario']);
            $this->execute();

            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'shares');
                exit();
            }

        }
        return;
    }

    private function subirObraImg()
    {
        $target_dir = "./assets/images/"; // Carpeta donde se guardará la foto
        $nombreArchivo = pathinfo($_FILES["obra"]["name"], PATHINFO_FILENAME); // Obtener el nombre del archivo sin la extensión
        $extension = strtolower(pathinfo($_FILES["obra"]["name"], PATHINFO_EXTENSION)); // Obtener la extensión del archivo

        $email = $_SESSION['user_data']['email']; // Obtener el email de la sesión

        $target_file = $target_dir . $nombreArchivo . "_" . $email . "." . $extension; // Ruta completa del archivo con el email añadido

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verificar si se ha enviado un archivo
        if (isset($_FILES["obra"]["name"])) {
            // Verificar si el archivo es una imagen real o una imagen falsa
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
