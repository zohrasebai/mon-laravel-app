@extends('layouts.admin')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-info text-white me-2">
      <i class="mdi mdi-link-variant"></i>
    </span> Liens de Navigation
  </h3>
</div>

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Gérer les liens du menu principal</h4>
        <p class="card-description">Modifiez les titres, les URLs et l'ordre d'affichage.</p>
        
        <form action="{{ route('admin.nav-links.update') }}" method="POST">
          @csrf
          <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
              <thead class="bg-light">
                <tr>
                  <th> Titre (FR) </th>
                  <th> URL / Route </th>
                  <th> Position </th>
                  <th> État </th>
                </tr>
              </thead>
              <tbody>
                @foreach($navLinks as $link)
                <tr>
                  <td>
                    <input type="text" name="nav_links[{{$link->id}}][title]" class="form-control" value="{{ $link->title }}">
                  </td>
                  <td>
                    <input type="text" name="nav_links[{{$link->id}}][url]" class="form-control" value="{{ $link->url }}">
                  </td>
                  <td style="width: 100px;">
                    <input type="number" name="nav_links[{{$link->id}}][position]" class="form-control" value="{{ $link->position }}">
                  </td>
                  <td>
                    <div class="form-check form-check-flat form-check-primary d-flex justify-content-center">
                      <label class="form-check-label">
                        <input type="checkbox" name="nav_links[{{$link->id}}][is_active]" class="form-check-input" {{ $link->is_active ? 'checked' : '' }}> Actif 
                      </label>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-gradient-primary me-2">Enregistrer les modifications</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light">Annuler</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection