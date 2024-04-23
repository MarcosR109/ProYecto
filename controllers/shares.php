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
    }

    protected function add()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->add(), true);
    }

    protected function update()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'shares');
        }
        $viewmodel = new ShareModel();
        $id = $this->request['id'];
        $this->returnView($viewmodel->update($id), true);
    }
}