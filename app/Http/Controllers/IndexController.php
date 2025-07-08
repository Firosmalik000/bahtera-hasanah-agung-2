<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\About;
use App\Models\Visi;
use App\Models\Misi;
use App\Models\WhyUs;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Icon;
;

class IndexController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $about = About::first();
        $visi = Visi::first();
        $misi = Misi::first();
        $whyus = WhyUs::all();
        $service = Service::all();
        $contact = Contact::first();

        foreach ($whyus as $item) {
            $item->icon = Icon::where('id', $item->icon)->first()->icon ?? null;
        }

        return view('welcome', compact('hero', 'about', 'visi', 'misi', 'whyus', 'service', 'contact'));
    }
}
