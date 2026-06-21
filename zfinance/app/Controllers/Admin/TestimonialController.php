<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validator;
use App\Models\Testimonial;

/** Gestion des témoignages (admin). */
final class TestimonialController extends Controller
{
    public function index(Request $request): void
    {
        Auth::requireAdmin();
        $this->view('admin/testimonials', [
            'title'        => 'Témoignages',
            'active'       => 'testimonials',
            'testimonials' => (new Testimonial())->all(),
        ], 'admin');
    }

    public function store(Request $request): void
    {
        Auth::requireAdmin();
        Csrf::verify($request);

        $data = [
            'author'  => $request->input('author'),
            'company' => $request->input('company', ''),
            'message' => $request->input('message'),
            'rating'  => max(1, min(5, (int) $request->input('rating', '5'))),
        ];

        $v = new Validator();
        $v->require('author', $data['author'], 'Auteur')
          ->require('message', $data['message'], 'Message');

        if ($v->fails()) {
            Session::flash('error', $v->firstError());
            $this->redirect('/admin/testimonials');
        }

        (new Testimonial())->create($data);
        Session::flash('success', 'Témoignage ajouté.');
        $this->redirect('/admin/testimonials');
    }

    public function destroy(Request $request): void
    {
        Auth::requireAdmin();
        Csrf::verify($request);
        (new Testimonial())->delete((int) $request->input('id'));
        Session::flash('success', 'Témoignage supprimé.');
        $this->redirect('/admin/testimonials');
    }
}
