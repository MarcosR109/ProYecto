<?php
class ShareModel extends Model
{
    public function index()
    {
        $this->query('SELECT * FROM obra ORDER BY id_obra DESC');
        $rows = $this->resultSet();

        return $rows;
    }
    public function view($id = null)
    {
        $this->query("SELECT * FROM obra where id_obra=$id");
        $row = $this->single();

        return $row;
    }
    public function delete($id = null)
    {
        $this->query("DELETE FROM obra where id_obra=$id");
        $this->execute();
        return;
    }

    public function add()
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {
            if ($post['title'] == '' || $post['body'] == '' || $post['link'] == '') {
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            // Insert into MySQL
            $this->query('INSERT INTO obra (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':user_id',  $_SESSION['user_data']['id']);
            $this->execute();
            // Verify
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'shares');
            }
        }
        return;
    }
    public function update($id = null)
    {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {
            if ($post['title'] == '' || $post['body'] == '' || $post['link'] == '') {
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            // Insert into MySQL
            $this->query('UPDATE shares SET title=:title, body=:body, link=:link WHERE id=:id');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':id', $id);
            $this->execute();
                // Redirect
            header('Location: ' . ROOT_URL . 'shares');

        }else{
            print_r($id);
            $this->query("SELECT * FROM shares where id=$id");
            $row = $this->single();
            return $row;
        }

    }
}
