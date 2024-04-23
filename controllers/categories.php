<?php
class Categories extends Controller
{
  protected function index(){
    $viewmodel = new CategoryModel();
    $this->returnView($viewmodel->getCategorylist(), true);
  }

  protected function add(){
    if(!isset($_SESSION['is_logged_in'])){
      header('Location: '.ROOT_URL.'categories');
    }
    $viewmodel = new CategoryModel();
    $this->returnView($viewmodel->addCategory(), true);
  }

    protected function view()
    {
        $id = $this->request['id'];
        $viewmodel = new CategoryModel();
        $this->returnView($viewmodel->view($id), true);
    }

    protected function delete()
    {
        $id = $this->request['id'];
        $viewmodel = new CategoryModel();
        $viewmodel->deleteCategory($id);
        header('Location:'. ROOT_URL.'categories/index');
    }

}
