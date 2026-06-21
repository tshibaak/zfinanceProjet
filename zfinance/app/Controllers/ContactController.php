<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validator;
use App\Models\Contact;

/** Traitement du formulaire de contact public. */
final class ContactController extends Controller
{
    public function store(Request $request): void
    {
        Csrf::verify($request);

        $data = [
            'nom'       => $request->input('nom'),
            'email'     => $request->input('email'),
            'telephone' => $request->input('telephone', ''),
            'sujet'     => $request->input('sujet'),
            'message'   => $request->input('message', ''),
        ];

        $v = new Validator();
        $v->require('nom', $data['nom'], 'Nom')
          ->match('nom', $data['nom'], Validator::PATTERNS['name'], 'Nom invalide.')
          ->require('email', $data['email'], 'Email')
          ->match('email', $data['email'], Validator::PATTERNS['email'], 'Email invalide.')
          ->require('sujet', $data['sujet'], 'Sujet')
          ->require('message', $data['message'], 'Message');

        if (!empty($data['telephone'])) {
            $v->match('telephone', $data['telephone'], Validator::PATTERNS['phone'], 'Téléphone invalide.');
        }

        if ($v->fails()) {
            Session::flash('error', $v->firstError());
            $this->redirect('/#zf-contact');
        }

        (new Contact())->create($data);
        Session::flash('success', 'Votre message a bien été envoyé. Nous vous recontacterons sous 24h.');
        $this->redirect('/#zf-contact');
    }
}
