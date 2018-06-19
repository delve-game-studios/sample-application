<?php

namespace App\Modules\LoginModule\Controllers;
use App\Helpers\Controller;

class LoginController extends Controller {
	public function loginAction() {
		echo htmlentities("You've arrived in <LoginModule::LoginController::loginAction> Congratulations !!");
	}

	public function logoutAction() {
		echo htmlentities("You've arrived in <LoginModule::LoginController::logoutAction> Congratulations !!");
	}
}

?>