@extends('layouts.admin')

@section('content')
<div class="card shadow-sm border-0" style="border-radius: 15px;">
    <div class="card-body">
        <h4 class="text-primary mb-4"><i class="mdi mdi-video"></i> Gestion de la Section Vidéo</h4>
        
        <form action="{{ route('admin.video.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            
            <div class="row">
                <!-- Colonne Gauche : Fichier -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Fichier Vidéo (MP4)</label>
                        <input type="file" name="video_file" class="form-control">
                        <small class="text-muted">Attention : Limite de taille serveur (~10MB).</small>
                        
                        @if($video->video_file)
                            <p class="mt-2 text-success">
                                <strong>Vidéo actuelle :</strong> {{ $video->video_file }}
                            </p>
                        @else
                            <p class="mt-2 text-muted">Aucune vidéo uploadée.</p>
                        @endif
                    </div>
                </div>

                <!-- Colonne Droite : Bouton -->
                <div class="col-md-7">
                    <div class="d-flex align-items-center h-100">
                        <button type="submit" class="btn btn-gradient-primary btn-block btn-lg">
                            <i class="mdi mdi-upload"></i> Mettre à jour la vidéo
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection