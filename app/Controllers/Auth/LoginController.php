<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\BaseController;
use App\SessionGuard as Guard;

class LoginController extends BaseController
{
	public function showLoginForm()
	{
		if (Guard::isUserLoggedIn()) {
			redirect('/home');
		}

		$data = [
			'messages' => session_get_once('messages'),
			'old' => $this->getSavedFormValues(),
			'errors' => session_get_once('errors')
		];

		$this->renderView('auth/login', $data);
	}

	public function login()
	{
		$user_credentials = $this->filterUserCredentials($_POST);

		$errors = [];
		$user = User::where('username', $user_credentials['username'])->first();
		if (!$user) {
			// Người dùng không tồn tại...
			$errors['username'] = 'Invalid username or password.';
		} else if (Guard::login($user, $user_credentials)) {
			// Đăng nhập thành công...
			redirect('/home');
		} else {
			// Sai mật khẩu...
			$errors['password'] = 'Invalid email or password.';
		}

		// Đăng nhập không thành công: lưu giá trị trong form, trừ password
		$this->saveFormValues($_POST, ['password']);
		redirect('/login', ['errors' => $errors]);
	}

	public function logout()
	{
		Guard::logout();
		redirect('/login');
	}

	protected function filterUserCredentials(array $data)
	{
		return [
			'username' => $data['username'] ?? null,
			'password' => $data['password'] ?? null
		];
	}
}
