<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // عرض صفحة التحكم بالسلايدر
    public function index()
    {
        // نجلب السلايدات الثلاثة مرتبة
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    // تحديث بيانات السلايد
    public function update(Request $request, $id)
{
    $slider = Slider::findOrFail($id);
    
    // مصفوفة الحقول التي قد تحتوي على ملفات
    $fileFields = ['image_file' => 'image', 'k1_file' => 'k1_img', 'k2_file' => 'k2_img', 'k3_file' => 'k3_img', 'f1_file' => 'f1_img', 'f2_file' => 'f2_img'];

    foreach ($fileFields as $input => $column) {
        if ($request->hasFile($input)) {
            // حذف الملف القديم
            if ($slider->$column && file_exists(public_path($slider->$column))) {
                @unlink(public_path($slider->$column));
            }
            // رفع الملف الجديد
            $file = $request->file($input);
            $path = 'uploads/sliders/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sliders'), $path);
            $slider->$column = $path;
        }
    }

    $slider->title_fr = $request->title_fr;
    $slider->subtitle_fr = $request->subtitle_fr;
    $slider->description_fr = $request->description_fr;
    $slider->save();

    return back()->with('success', 'Mise à jour réussie !');
}
}