@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Details</div>
                

                <div class="card-body">
                        <div class ="float-right">
                                <a class = "btn btn-danger" href ="{{ route('level.index')}}">Back</a>
                                
                                </div>
                        <table class="table table-striped table-bordered">
                                <tr>
                                  <td>ID</td>
                                <td>{{$level->id}}</td>
                                </tr>
                                <tr>
                                  <td>Name</td>
                                <td>{{$level->level_name}}</td>
                                </tr>
                                <tr>
                                  <td>Level Number</td>
                                <td>{{$level->level_number}}</td>
                                </tr>
                                <tr>
                                  <td>Status</td>
                                <td>{{$level->status}}</td>
                                </tr>
                                <tr>
                                  <td>Created at</td>
                                  <td>{{$level->created_at}}</td>
                                </tr>
                                <tr>
                                  <td>Updated at</td>
                                <td>{{$level->updated_at}}</td>
                                </tr>
                              </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection