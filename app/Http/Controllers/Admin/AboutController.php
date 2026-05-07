<?php

// app/Http/Controllers/Admin/AboutController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    // عرض الصفحة (تجمع السلايدر ومن نحن)
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        $about = About::first() ?? new About(); // إذا كان الجدول فارغاً، أنشئ كائناً مؤقتاً
        return view('admin.about.index', compact('sliders', 'about'));
    }

    // تحديث البيانات
    public function update(Request $request)
    {
        $request->validate([
            'title_fr' => 'required',
            'about_file' => 'nullable|image|max:2048'
        ]);

        $about = About::firstOrCreate(['id' => 1]); // دائماً نعدل السجل الأول فقط

        if ($request->hasFile('about_file')) {
            // حذف الصورة القديمة لتوفير مساحة السيرفر
            if ($about->image && File::exists(public_path($about->image))) {
                File::delete(public_path($about->image));
            }
            $file = $request->file('about_file');
            $path = 'uploads/about/' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/about'), $path);
            $about->image = $path;
        }

        $about->update([
            'title_fr' => $request->title_fr,
            'text_1_fr' => $request->text_1_fr,
            'text_2_fr' => $request->text_2_fr,
            'image' => $about->image
        ]);

        return redirect()->back()->with('success', 'Mise à jour réussie !');
    }
}

?>