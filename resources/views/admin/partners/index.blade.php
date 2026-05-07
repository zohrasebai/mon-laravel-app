@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white mr-2">
            <i class="mdi mdi-handshake"></i>
        </span> Gestion des Partenaires
    </h3>
</div>

<div class="row">
    <!-- Formulaire d'ajout -->
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter un Logo</h4>
                <p class="card-description">Ajouter simplement l'image.</p>
                
                <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label>Fichier Image (Logo)</label>
                        <input type="file" name="image" class="form-control-file" required>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-block">Ajouter l'image</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Liste des partenaires -->
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Logos Actuels</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-light">
                                <th> Image </th>
                                <th> Nom (Auto) </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($partners as $partner)
                            <tr>
                                <td>
                                    @if($partner->image)
                                        <img src="{{ asset($partner->image) }}" style="max-height: 50px;">
                                    @else
                                        <span class="text-muted">Pas d'image</span>
                                    @endif
                                </td>
                                <td> {{ $partner->name ?? '-' }} </td>
                                <td>
                                    {{-- FORMULAIRE DE SUPPRESSION CORRIGÉ --}}
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Supprimer ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Aucun partenaire.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection