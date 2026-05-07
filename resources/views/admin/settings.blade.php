@extends('layouts.admin')

@section('content')
<div class="page-header">
  <h3 class="page-title"> Paramètres de Contact </h3>
</div>

<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Informations de l'entête & footer</h4>
        <form class="forms-sample" action="{{ route('admin.settings.update') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="phone">Numéro de Téléphone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ $global_settings['phone'] ?? '' }}" placeholder="+213 ...">
          </div>
          <div class="form-group">
            <label for="email">Adresse Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $global_settings['email'] ?? '' }}" placeholder="contact@site.com">
          </div>
          <button type="submit" class="btn btn-gradient-success me-2">Mettre à jour</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection