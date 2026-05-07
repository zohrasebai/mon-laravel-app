<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service; // استدعاء موديل الخدمات

class ServiceController extends Controller
{
    /**
     * عرض قائمة الخدمات في لوحة التحكم
     */
    public function index()
    {
        // جلب كل الخدمات وترتيبها من الأحدث للأقدم
        $services = Service::orderBy('created_at', 'desc')->get();
        
        // التأكد من أن المسار للملف (blade) مطابق لمجلداتك
        return view('admin.services.index', compact('services'));
    }

    /**
     * تخزين خدمة جديدة في قاعدة البيانات
     */
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'title_fr' => 'required|max:255',
            'desc_fr'  => 'required',
        ]);

        // إنشاء الخدمة
        Service::create([
            'title_fr' => $request->title_fr,
            'desc_fr'  => $request->desc_fr,
            'order'    => $request->order ?? 0,
        ]);

        return redirect()->back()->with('success', 'Service ajouté avec succès !');
    }

    /**
     * حذف خدمة معينة
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Service supprimé !');
    }
}