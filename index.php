<?php
// Start Session
session_start();
require('config.php');
error_reporting(0);
require('classes/messages.php');
require('classes/bootstrap.php');
require('classes/controller.php');
require('classes/model.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');



$bootstrap = new bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}