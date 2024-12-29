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