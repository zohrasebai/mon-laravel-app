@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title"> Gestion des Valeurs Essentielles </h3>
</div>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary">Configurations Générales</h4>
                <form action="{{ route('admin.core_values.update_settings') }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label>Sous-titre (FR)</label>
                        <input type="text" name="subtitle_fr" class="form-control" value="{{ $settings->subtitle_fr }}">
                    </div>
                    <div class="form-group">
                        <label>Titre Principal (FR)</label>
                        <input type="text" name="title_fr" class="form-control" value="{{ $settings->title_fr }}">
                    </div>
                    <div class="form-group">
                        <label>Description (FR)</label>
                        <textarea name="desc_fr" class="form-control" rows="4">{{ $settings->desc_fr }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Image de la Section</label>
                        <input type="file" name="image_file" class="form-control">
                        @if($settings->image)
                            <img src="{{ asset($settings->image) }}" width="100" class="mt-2 rounded shadow-sm">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-gradient-primary btn-block">Mettre à jour les textes</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-success">Ajouter une Valeur (Max 4)</h4>
                <form action="{{ route('admin.core_values.store_item') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title_fr" class="form-control" placeholder="Titre de la valeur" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="desc_fr" class="form-control" placeholder="Courte description" required>
                    </div>
                    <button type="submit" class="btn btn-gradient-success btn-sm">Ajouter</button>
                </form>

                <hr>
                <h4 class="card-title">Valeurs Actuelles</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->title_fr }}</td>
                                <td>
                                    <form action="{{ route('admin.core_values.destroy_item', $item->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer?')">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection