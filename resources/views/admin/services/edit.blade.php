@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-briefcase-check"></i>
        </span> Modifier le Service
    </h3>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT') <!-- On utilise PUT ici pour la modification -->
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Titre du Service (FR)</label>
                                <input type="text" name="title_fr" class="form-control" value="{{ $service->title_fr }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Description (FR)</label>
                                <textarea name="desc_fr" class="form-control" rows="6" required>{{ $service->desc_fr }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Image Actuelle</label>
                                @if($service->image)
                                    <img src="{{ asset($service->image) }}" class="img-fluid mb-2" style="max-height: 150px;">
                                @else
                                    <p class="text-muted">Pas d'image</p>
                                @endif
                                <input type="file" name="image" class="form-control-file">
                                <small class="text-muted">Laisser vide pour garder l'image actuelle.</small>
                            </div>

                            <button type="submit" class="btn btn-gradient-success btn-block mt-4">
                                <i class="mdi mdi-content-save"></i> Enregistrer les modifications
                            </button>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-light btn-block mt-2">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection