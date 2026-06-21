<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validator;
use App\Models\Subscriber;

/** Inscription à la newsletter (footer). */
final class NewsletterController extends Controller
{
    public function store(Request $request): void
    {
        Csrf::verify($request);

        $email = $request->input('email');

        $v = new Validator();
        $v->require('email', $email, 'Email')
          ->match('email', $email, Validator::PATTERNS['email'], 'Email invalide.');

        if ($v->fails()) {
            Session::flash('error', $v->firstError());
            $this->redirect('/#footer');
        }

        $added = (new Subscriber())->subscribe($email);
        Session::flash('success', $added ? 'Inscription confirmée !' : 'Vous êtes déjà abonné(e).');
        $this->redirect('/#footer');
    }
}
