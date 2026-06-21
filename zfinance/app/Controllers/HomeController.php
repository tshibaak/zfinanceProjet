<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\Testimonial;

/** Page d'accueil publique. */
final class HomeController extends Controller
{
    public function index(Request $request): void
    {
        $testimonials = (new Testimonial())->published(3);

        // Références "Ils nous font confiance" (logos défilants)
        $trustLogos = [
            'INFOBIP', 'REDITECH', 'TEXAF BILEMBO', 'WIKO', 'SPLITTI', 'MAFRALAND',
            'OADC', 'WIOCC', 'ASCOMA', 'PACTILIS', 'MSALABS', 'AMIGO FOODS',
            'UTEXAFRICA', 'IMMOTEX', 'COTEX', 'CARRIGRES', 'STANDARD TELECOM',
            'GROUPE PYGMA', 'SFA', 'TENNOVA', 'IPP', 'CTG', 'CJIC', 'AMN', 'NURAN', 'ABC',
        ];

        $this->view('home/index', [
            'title'        => 'Zfinances – Expertise Comptable & Audit Financier',
            'testimonials' => $testimonials,
            'trustLogos'   => $trustLogos,
        ], 'public');
    }
}
