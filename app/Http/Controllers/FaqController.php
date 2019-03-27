<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;


class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', 'PUBLISHED')->get();
        return view('frontend.faq.faqs', ['faqs' => $faqs]);
    }
}
