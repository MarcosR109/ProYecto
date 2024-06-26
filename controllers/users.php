<?php
class Users extends controller{
	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), false);
	}

	protected function login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), false);
	}

	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
        exit();
	}
}