@extends('layout')
@section('title','formateurs')
@section('heading')
@section('content')
<div class="container-lg">
      <div class="table-responsive">
            <div class="table-wrapper">
                  <div class="table-title">
                        <div class="row">
                              <div class="col-sm-8">
                                    <h2>Liste des <b>Proffesseurs</b></h2>
                              </div>
                              <div class="col-sm-4">
                                    <a href="{{route('formateurs.create')}}" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
                              </div>
                        </div>
                  </div>
                  <table class="table table-bordered">
                        <thead>
                              <tr>
                                    <th>nom</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>role</th>
                                    <th>Actions</th>
                              </tr>
                        </thead>
                        <tbody>
                              @if (count($formateurs)>0)
                              @foreach ( $formateurs as $formateur )
                              <tr>
                                    <td>{{$formateur->name}}</td>
                                    <td>{{$formateur->email}}</td>
                                    <td>{{$formateur->password}}</td>
                                    <td>{{$formateur->role}}</td>
                                    <td style="width: 130px;">
                                          <a class="details" href="{{route('formateurs.show', $formateur->id)}}" title="details" data-toggle="tooltip"><i class="material-icons">&#xE88E;</i></a>
                                          <a class="edit" href="{{route('formateurs.edit', $formateur->id)}}" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                          <form action="{{route('formateurs.destroy',$formateur->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"onclick="return confirm('voulez vous supprimer ce formateur')" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></button>
                                          </form>
                                    </td>
                              </tr>
                              @endforeach
                              @else
                                  <tr style="text-align: center">
                                    <td colspan="5">
                                          Aucune Formateur Trouve
                                    </td>
                                  </tr>
                              @endif


                        </tbody>
                  </table>
            </div>
      </div>
</div>
@endsection