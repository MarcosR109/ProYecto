<?php
class Shares extends controller
{
    protected function Index()
    {
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function view()
    {
        $id = $this->request['id'];
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->view($id), true);
    }

    protected function delete()
    {
        $id = $this->request['id'];
        $viewmodel = new ShareModel();
        $viewmodel->delete($id);
        header('Location:'. ROOT_URL.'shares/index');
        exit();
    }
    protected function search()
    {
        $busqueda = $_GET['query'];
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->search($busqueda),true);
    }
    protected function filter()
    {
        $genre = $this->request["id"];
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->filter($genre),true);
    }

    protected function add()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'shares');
            exit();
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->add(), true);
    }
    protected function indexUser(){

        $viewmodel = new ShareModel();
        $id = $this->request['id'];
        $this->returnView($viewmodel->indexUser($id),true);
    }
    protected function update()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'shares');
            exit();
        }
        $viewmodel = new ShareModel();
        $id = $this->request['id'];
        $this->returnView($viewmodel->update($id), true);
    }
    protected function trade()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'shares');
            exit();
        }
        $viewmodel = new ShareModel(); //?id=38&idUsuario=1&id2=43&idUsuario2=3
        $id = $this->request['id'];
        $idusuario = $_GET['idUsuario'];
        $idobra2=$_GET['id2'];
        $idusuario2=$_GET['idUsuario2'];
        $this->returnView($viewmodel->trade($id,$idusuario,$idobra2,$idusuario2,1), true);
    }
}