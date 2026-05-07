@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-danger text-white mr-2">
            <i class="mdi mdi-cog"></i>
        </span> Réglages Généraux
    </h3>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Informations du Site & Contact</h4>
                <p class="card-description">Modifiez les informations de contact, le logo et les réseaux sociaux.</p>
                
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    
                    <div class="row">
                        <!-- Colonne Gauche : Logo -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Logo du Site</label>
                                <div class="text-center" style="border: 2px dashed #ccc; padding: 20px; border-radius: 10px; cursor: pointer;" onclick="document.getElementById('logo_input').click()">
                                    <img id="logo_preview" src="{{ asset($settings['logo'] ?? 'assets/images/logo/Image1.png') }}" alt="Logo" style="max-height: 80px; margin-bottom: 10px;">
                                    <br>
                                    <span class="text-muted small">Cliquez pour changer</span>
                                    <input type="file" name="logo" id="logo_input" hidden onchange="previewImage(this)">
                                </div>
                            </div>
                        </div>

                        <!-- Colonne Droite : Textes -->
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Numéro de Téléphone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email de Contact</label>
                                        <input type="email" name="email" class="form-control" value="{{ $settings['email'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input type="text" name="address" class="form-control" value="{{ $settings['address'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mt-3">Réseaux Sociaux</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><i class="fa fa-facebook text-primary"></i> Facebook URL</label>
                                <input type="text" name="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '#' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><i class="fa fa-linkedin text-info"></i> LinkedIn URL</label>
                                <input type="text" name="linkedin_url" class="form-control" value="{{ $settings['linkedin_url'] ?? '#' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><i class="fa fa-instagram text-danger"></i> Instagram URL</label>
                                <input type="text" name="instagram_url" class="form-control" value="{{ $settings['instagram_url'] ?? '#' }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Texte du Footer (Description courte)</label>
                        <textarea name="footer_text" class="form-control" rows="3">{{ $settings['footer_text'] ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('logo_preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection