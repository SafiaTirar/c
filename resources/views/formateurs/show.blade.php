@extends('layout')
@section('title','formateurs')
@section('heading', 'Formateur :' . $formateur->name.  ' Details')
@section('content')
<div class="column">
      <h2><span>Informations : </span></h2>
      <table class="table table-bordered">
            <thead>
                  <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>password</th>
                        <th>genre</th>
                        <th>role</th>
                  </tr>
            </thead>
            <tbody>
                  <tr>
                        <td>{{$formateur->name}}</td>
                        <td>{{$formateur->email}}</td>
                        <td>{{$formateur->password}}</td>
                        <td>{{$formateur->genre}}</td>
                        <td>{{$formateur->role}}</td>
                        
                  </tr>
            </tbody>
      </table>

      {{-- liste des groupes --}}

      <h2><span>Liste des groupes de {{$formateur->nom . ' '. $formateur->prenom}}</span></h2>

      <table class="table table-bordered">
            <thead>
                  <tr>
                        <th>libelle</th>
                        <th>Annee formation</th>
                        <th>Effectif Stagiaire</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($formateur->groupes as $groupe )
                        <tr>
                              <td>{{$groupe->libelle}}</td>
                              <td>{{$groupe->pivot->annee_formation}}</td>      
                              <td>{{count($groupe->stagiaires)}}</td>      
                        </tr>
                  @endforeach
            </tbody>
      </table>

     
</div>
@endsection
@section('back')
<h3>
      <a class="details" href="{{route('formateurs.index')}}" title="details" data-toggle="tooltip">
            <i class="material-icons">&#xE5C4;</i>
            Back
      </a>
</h3>
@endsection