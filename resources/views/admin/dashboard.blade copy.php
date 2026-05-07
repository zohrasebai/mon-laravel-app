@extends('layouts.app')

@section('content')
<style>
    /* لمسات جمالية إضافية */
    .dashboard-card {
        transition: transform 0.3s ease, shadow 0.3s ease;
        border: none;
        border-radius: 15px;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .icon-shape {
        width: 48px;
        height: 48px;
        background-position: center;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    body {
        background-color: #f8f9fc;
        direction: rtl; /* تفعيل الاتجاه من اليمين لليسار */
        text-align: right;
    }
    .breadcrumb-item + .breadcrumb-item::before {
        float: right;
        padding-left: 0.5rem;
    }
</style>

<div class="container-fluid py-4" dir="rtl">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">لوحة التحكم</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الإحصائيات</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card dashboard-card shadow-sm h-100 py-2 border-right-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">الإحصائيات النشطة</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $global_achievements->count() }} عناصر</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-light-primary text-primary">
                                <i class="fa fa-trophy fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.achievements') }}" class="btn btn-primary btn-sm rounded-pill px-3">إدارة الإحصائيات</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card dashboard-card shadow-sm h-100 py-2 border-right-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">روابط الموقع</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $global_nav_links->count() }} روابط</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-light-info text-info">
                                <i class="fa fa-link fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.nav-links') }}" class="btn btn-info text-white btn-sm rounded-pill px-3">تعديل القوائم</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card dashboard-card shadow-sm h-100 py-2 border-right-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">معلومات التواصل</div>
                            <div class="h6 mb-0 text-gray-600 mt-2">{{ $global_settings['phone'] ?? 'غير مسجل' }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-light-success text-success">
                                <i class="fa fa-phone fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.settings') }}" class="btn btn-success btn-sm rounded-pill px-3">إدارة البيانات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 rounded-lg p-4 bg-dark text-white shadow">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="fw-bold mb-1">أهلاً بك في نظام QualiPro Plus</h4>
                        <p class="mb-0 opacity-75">يمكنك من هنا التحكم في جميع بيانات الهيدر، الروابط، والإحصائيات التي تظهر في الواجهة الأمامية.</p>
                    </div>
                    <div class="col-md-4 text-md-start mt-3 mt-md-0">
                        <a href="/" target="_blank" class="btn btn-outline-light rounded-pill px-4">
                            <i class="fa fa-external-link-alt ms-1"></i> معاينة الموقع
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* ألوان إضافية خفيفة للخلفيات */
    .bg-light-primary { background-color: #e0e7ff; }
    .bg-light-info { background-color: #e0f2fe; }
    .bg-light-success { background-color: #dcfce7; }
    .border-right-primary { border-right: 5px solid #4e73df !important; }
    .border-right-info { border-right: 5px solid #36b9cc !important; }
    .border-right-success { border-right: 5px solid #1cc88a !important; }
</style>
@endsection