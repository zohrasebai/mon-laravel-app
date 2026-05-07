@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-briefcase-check"></i>
        </span> Gestion des Services
    </h3>
</div>

<div class="row">
    <!-- FORMULAIRE D'AJOUT (Gauche) -->
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter un nouveau service</h4>
                <p class="card-description">Remplissez les informations ci-dessous</p>
                
                <form action="{{ route('admin.services.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre du Service (FR)</label>
                        <input type="text" name="title_fr" class="form-control" id="title" placeholder="Ex: Audit & Diagnostic" required shadow-none>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description (FR)</label>
                        <textarea name="desc_fr" class="form-control" id="desc" rows="6" placeholder="Description courte du service..." required shadow-none></textarea>
                    </div>
                    
                    {{-- CHAMP IMAGE --}}
                    <div class="form-group">
                        <label>Image du Service (Optionnel)</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*">
                        <small class="text-muted">Formats : JPG, PNG. Max 2MB.</small>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2 btn-block">
                        <i class="mdi mdi-plus"></i> Enregistrer
                    </button>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- LISTE DES SERVICES (Droite) -->
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste des services actuels</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="bg-light">
                                <th> Titre </th>
                                <th> Description </th>
                                <th> Image </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                            <tr>
                                <td class="font-weight-bold"> {{ $service->title_fr }} </td>
                                <td class="text-wrap" style="max-width: 300px;"> {{ \Illuminate\Support\Str::limit($service->desc_fr, 100) }} </td>
                                
                                {{-- AFFICHAGE DE L'IMAGE --}}
                                <td>
                                    @if($service->image)
                                        <img src="{{ asset($service->image) }}" style="max-height: 40px; border-radius: 4px;">
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                                
                                <td>
                                    {{-- BOUTON MODIFIER (CRAYON) --}}
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-info mr-2" title="Modifier">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>

                                    {{-- BOUTON SUPPRIMER --}}
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer ce service ?');">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Aucun service trouvé. Ajoutez votre premier service à gauche.</td>
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