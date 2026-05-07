@extends('layouts.admin')

@section('content')
<div class="page-header">
  <h3 class="page-title"> Gestion des Réalisations </h3>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary">Liste des chiffres clés</h4>
        <form action="{{ route('admin.achievements.update') }}" method="POST">
          @csrf
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr class="bg-light">
                  <th>Valeur (Ex: 100%)</th>
                  <th>Titre (Ex: Satisfaction)</th>
                  <th>Ordre</th>
                </tr>
              </thead>
              <tbody>
                @foreach($global_achievements as $ach)
                <tr>
                  <td>
                    <input type="text" name="achievements[{{$ach->id}}][count]" class="form-control" value="{{$ach->count}}">
                  </td>
                  <td>
                    <input type="text" name="achievements[{{$ach->id}}][title]" class="form-control" value="{{$ach->title}}">
                  </td>
                  <td style="width: 100px;">
                    <input type="number" name="achievements[{{$ach->id}}][order]" class="form-control" value="{{$ach->order}}">
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <button type="submit" class="btn btn-gradient-primary mt-4">Enregistrer les modifications</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection