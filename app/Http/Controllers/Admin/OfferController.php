<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfferSection;
use Illuminate\Support\Facades\File;

class OfferController extends Controller {
    public function index() {
        $offer = OfferSection::first() ?? new OfferSection();
        return view('admin.offer.index', compact('offer'));
    }

    public function update(Request $request) {
        $offer = OfferSection::firstOrCreate(['id' => 1]);

        if ($request->hasFile('bg_image_file')) {
            if($offer->bg_image && File::exists(public_path($offer->bg_image))) File::delete(public_path($offer->bg_image));
            $name = 'cta_'.time().'.'.$request->bg_image_file->extension();
            $request->bg_image_file->move(public_path('uploads/others'), $name);
            $offer->bg_image = 'uploads/others/'.$name;
        }

        $offer->update([
            'title_fr' => $request->title_fr,
            'text_fr' => $request->text_fr,
            'btn_text_fr' => $request->btn_text_fr,
            'btn_url' => $request->btn_url,
            'bg_image' => $offer->bg_image
        ]);

        return back()->with('success', 'Section mise à jour !');
    }
}

