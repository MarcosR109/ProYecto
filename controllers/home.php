<?php
class Home extends controller{
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}