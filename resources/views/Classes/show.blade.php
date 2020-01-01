@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Details</div>
                

                <div class="card-body">
                        <div class ="float-right">
                                
                          <a class = "btn btn-danger" href ="{{ route('class.index') }}">Back</a>
                                
                        </div>
                        <table class="table table-striped table-bordered">
                          <tr>
                            <td>ID</td>
                            <td>{{$class->id}}</td>
                          </tr>
                          <tr>
                            <td>Class Name</td>
                           <td>{{$class->class_name}}</td>
                          </tr>
                          <tr>
                            <td>Level Name</td>
                            <td>{{$class->level->level_name}}</td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td>{{$class->status}}</td>
                          </tr>
                          <tr>
                            <td>Created At</td>
                            <td>{{$class->created_at}}</td>
                          </tr>
                          <tr>
                            <td>Updated at</td>
                            <td>{{$class->updated_at}}</td>
                          </tr>
                        </table>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection