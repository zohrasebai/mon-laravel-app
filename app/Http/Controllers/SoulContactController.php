<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SoulContactController extends Controller
{
    /**
     * عرض صفحة التواصل (اختياري)
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * دالة وهمية لإرسال رسالة الاتصال
     */
    public function send(Request $request)
    {
        // ✅ تحقق من المدخلات (Validation)
        $validated = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'message' => 'required|min:10|max:1000',
        ], [
            'name.required' => 'الاسم مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'الرجاء إدخال بريد إلكتروني صحيح.',
            'message.required' => 'الرسالة مطلوبة.',
        ]);

        // ⚙️ محاكاة (تجربة وهمية لإرسال البريد)
        // هنا لا يتم الإرسال فعليًا — فقط لتجربة احترافية
        Log::info('تم استلام رسالة وهمية:', [
            'الاسم' => $validated['name'],
            'البريد' => $validated['email'],
            'الرسالة' => $validated['message'],
        ]);

        // 🔁 محاكاة حالة نجاح أو فشل عشوائية
        $fakeSuccess = rand(0, 1); // 0 أو 1 بشكل عشوائي

        if ($fakeSuccess) {
            // ✅ نجاح وهمي
            return back()->with('success', '✅ تم إرسال رسالتك بنجاح! سنقوم بالرد عليك قريبًا.');
        } else {
            // ❌ فشل وهمي
            return back()->with('error', '❌ حدث خطأ أثناء إرسال الرسالة، يرجى المحاولة لاحقًا.');
        }
    }
}
