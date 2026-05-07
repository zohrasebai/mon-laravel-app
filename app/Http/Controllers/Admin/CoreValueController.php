<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoreValue;
use App\Models\CoreValueItem;
use Illuminate\Support\Facades\File;

class CoreValueController extends Controller {
    public function index() {
        $settings = CoreValue::first() ?? new CoreValue();
        $items = CoreValueItem::all();
        return view('admin.core.index', compact('settings', 'items'));
    }

    public function updateSettings(Request $request) {
        $settings = CoreValue::firstOrCreate(['id' => 1]);
        if ($request->hasFile('image_file')) {
            if($settings->image && File::exists(public_path($settings->image))) File::delete(public_path($settings->image));
            $path = 'uploads/values/' . time() . '.' . $request->image_file->extension();
            $request->image_file->move(public_path('uploads/values'), $path);
            $settings->image = $path;
        }
        $settings->update([
            'subtitle_fr' => $request->subtitle_fr,
            'title_fr' => $request->title_fr,
            'desc_fr' => $request->desc_fr,
            'image' => $settings->image
        ]);
        return back()->with('success', 'Paramètres mis à jour');
    }

    public function storeItem(Request $request) {
        CoreValueItem::create($request->all());
        return back()->with('success', 'Valeur ajoutée');
    }

    public function destroyItem($id) {
        CoreValueItem::findOrFail($id)->delete();
        return back()->with('success', 'Valeur supprimée');
    }
}