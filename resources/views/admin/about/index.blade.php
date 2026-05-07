@extends('layouts.admin')

@section('content') 



<div class="card shadow-sm mt-4">
    <div class="card-body">
        <h4 class="card-title text-success">Section : Qui Sommes-Nous</h4>
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-5">
                    <label>Image d'illustration</label>
                    <div class="image-upload-zone" onclick="document.getElementById('about_img').click()">
                        <img id="prev-about" src="{{ asset($about->image) }}" class="img-fluid rounded">
                        <input type="file" name="about_file" id="about_img" hidden onchange="preview(this, 'prev-about')">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label>Titre de la section</label>
                        <input type="text" name="title_fr" class="form-control" value="{{ $about->title_fr }}">
                    </div>
                    <div class="form-group">
                        <label>Texte Introductif</label>
                        <textarea name="text_1_fr" class="form-control" rows="4">{{ $about->text_1_fr }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Notre Mission (Texte 2)</label>
                        <textarea name="text_2_fr" class="form-control" rows="3">{{ $about->text_2_fr }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-gradient-success w-100">Enregistrer les informations</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection







