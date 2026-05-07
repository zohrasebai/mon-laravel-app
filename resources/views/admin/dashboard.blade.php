@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
    
    .content-wrapper {
        font-family: 'Poppins', sans-serif;
        text-align: left !important; /* التأكد من الاتجاه الفرنسي */
    }
    .card-img-holder {
        position: relative;
    }
    /* إضافة لمسة جمالية للبطاقات */
    .card.shadow {
        box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        border: none;
        transition: transform 0.3s;
    }
    .card.shadow:hover {
        transform: translateY(-5px);
    }
</style>

<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Vue d'ensemble
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
        <span></span>Statistiques actuelles <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
      </li>
    </ul>
  </nav>
</div>

<div class="row">

  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white shadow">
      <div class="card-body">
        <img src="{{ asset('bigdash/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Contact & Support <i class="mdi mdi-phone mdi-24px float-right"></i></h4>
        <h6 class="mb-2">Tél: {{ $global_settings['phone'] ?? 'Non défini' }}</h6>
        <p class="small mb-4">{{ $global_settings['email'] ?? 'Email non défini' }}</p>
        <a href="{{ route('admin.settings') }}" class="text-white text-decoration-none">
            Mettre à jour <i class="mdi mdi-arrow-right ms-1"></i>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection