<?php
    namespace App\controllers;

use App\View;

    class AdminController extends Controller{
        
        public function index()
        {
            View::view('admin.index');
        }

        public function contacts()
        {
            View::view('admin.contacts');
        }

        public function newsletter()
        {
            View::view('admin.newsletter');
        }


        public function testimonials()
        {
            View::view('admin.testimonials');
        }
    }
?>