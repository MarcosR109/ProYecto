<?php
class UserModel extends model
{
    public function register()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {
            $password = md5($post['password']);

            if ($post['name'] == '' || $post['email'] == '' || $post['password'] == '') {
                messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }

            // Insert into MySQL
            $this->query('INSERT INTO usuario (nombre, email, usuariocon,ciudad) VALUES(:name, :email, :password,:ciudad)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->bind(':ciudad', $post['ciudad']);
            $this->execute();
            // Verify
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'users/login');
                exit();
            }
        }
        return;
    }

    public function login()
    {
        // Iniciar la sesión
        session_start();

        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {
            $password = md5($post['password']);

            // Compare Login
            $this->query('SELECT idusuario, email,nombre FROM usuario WHERE email = :email AND usuariocon = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();

            if ($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "idusuario" => $row['idusuario'],
                    "nombre" => $row['nombre'],
                    "email" => $row['email'],
                );

                header('Location: ' . ROOT_URL . 'shares');
                exit();
            } else {
                messages::setMsg('Incorrect Login', 'error');
            }
        }
        return;
    }
}