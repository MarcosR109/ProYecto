<?php
class Shares extends Controller
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
    protected function viewFromTitle()
    {
        $title = $this->request["titulo"];
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->viewFromTitle($title),true);
    }
    protected function viewFromAuthor()
    {
        $usuar = $this->request["usuario"];
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->viewFromAuthor($usuar),true);
    }
    protected function viewFromGenre()
    {
        $genre = $this->request["genero"];
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->viewFromGenre($genre),true);
    }
    protected function viewFromMedium()
    {
        $medium = $this->request["soporte"];
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->viewFromMedium($medium),true);
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
}