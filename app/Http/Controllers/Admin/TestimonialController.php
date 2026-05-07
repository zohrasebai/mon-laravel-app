<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\TestimonialItem;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller {
    public function index() {
        $settings = Testimonial::first() ?? new Testimonial();
        $items = TestimonialItem::all();
        return view('admin.testimonials.index', compact('settings', 'items'));
    }

    public function updateSettings(Request $request) {
        $settings = Testimonial::firstOrCreate(['id' => 1]);
        $settings->update($request->only('subtitle_fr', 'title_fr', 'desc_fr'));
        return back()->with('success', 'Paramètres mis à jour');
    }

    public function storeItem(Request $request) {
        $data = $request->all();
        if ($request->hasFile('img_file')) {
            $name = time().'.'.$request->img_file->extension();
            $request->img_file->move(public_path('uploads/testimonials'), $name);
            $data['img'] = 'uploads/testimonials/'.$name;
        }
        TestimonialItem::create($data);
        return back()->with('success', 'Témoignage ajouté');
    }

    public function destroyItem($id) {
        $item = TestimonialItem::findOrFail($id);
        if($item->img) File::delete(public_path($item->img));
        $item->delete();
        return back()->with('success', 'Témoignage supprimé');
    }
}