<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\Testimonial;

/** Tableau de bord admin. */
final class DashboardController extends Controller
{
    public function index(Request $request): void
    {
        Auth::requireAdmin();

        $this->view('admin/dashboard', [
            'title'         => 'Tableau de bord',
            'active'        => 'dashboard',
            'totalContacts' => (new Contact())->count(),
            'unread'        => (new Contact())->countUnread(),
            'subscribers'   => (new Subscriber())->count(),
            'testimonials'  => (new Testimonial())->count(),
        ], 'admin');
    }
}
