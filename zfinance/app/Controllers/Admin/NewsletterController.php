<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Models\Subscriber;

/** Liste des abonnés newsletter (admin). */
final class NewsletterController extends Controller
{
    public function index(Request $request): void
    {
        Auth::requireAdmin();
        $this->view('admin/newsletter', [
            'title'       => 'Abonnés newsletter',
            'active'      => 'newsletter',
            'subscribers' => (new Subscriber())->all(),
        ], 'admin');
    }
}
