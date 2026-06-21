<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Session;
use App\Models\Admin;

/** Connexion / déconnexion admin. */
final class AuthController extends Controller
{
    public function showLogin(Request $request): void
    {
        if (Auth::check()) {
            $this->redirect('/admin');
        }
        $this->view('admin/login', [
            'title' => 'Connexion Admin',
            'error' => Session::takeFlash(),
        ], '');
    }

    public function login(Request $request): void
    {
        Csrf::verify($request);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === null || $password === null || $username === '' || $password === '') {
            Session::flash('error', 'Identifiants requis.');
            $this->redirect('/admin/login');
        }

        $adminId = (new Admin())->verify($username, $password);

        if ($adminId === null) {
            Session::flash('error', 'Identifiants invalides.');
            $this->redirect('/admin/login');
        }

        Auth::login($adminId);
        $this->redirect('/admin');
    }

    public function logout(Request $request): void
    {
        Auth::logout();
        $this->redirect('/admin/login');
    }
}
