<?php

namespace App\Modules\Users\Controllers;
use App\Controllers\Controller as AbstractController;
use App\Helpers\Request;

class Login extends AbstractController {
	public function signIn(Request $request) {echo __METHOD__;}
	public function signOut(Request $request) {echo __METHOD__;}
	public function signUp(Request $request) {echo __METHOD__;}
}