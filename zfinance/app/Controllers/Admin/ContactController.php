<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Csrf;
use App\Core\Request;
use App\Models\Contact;

/** Gestion des messages de contact (admin). */
final class ContactController extends Controller
{
    public function index(Request $request): void
    {
        Auth::requireAdmin();
        $this->view('admin/contacts', [
            'title'    => 'Messages de contact',
            'active'   => 'contacts',
            'contacts' => (new Contact())->all(),
        ], 'admin');
    }

    /** Marque un message comme lu (appel fetch/AJAX). */
    public function markRead(Request $request): void
    {
        Auth::requireAdmin();
        Csrf::verify($request);
        $id = (int) $request->input('id');
        (new Contact())->markRead($id);
        $this->json(['ok' => true]);
    }

    public function destroy(Request $request): void
    {
        Auth::requireAdmin();
        Csrf::verify($request);
        (new Contact())->delete((int) $request->input('id'));
        $this->redirect('/admin/contacts');
    }
}
