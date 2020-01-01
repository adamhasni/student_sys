@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Home</div>
                

                    <div class="card-body">
                        <div class ="float-right">
                            
                            <a class = "btn btn-success" href ="{{ route('level.create')}}">Create New Level</a>
                                
                        </div>
                    <table class="table table-striped table-bordered">
                        <tr>
                          <th>No.</th>
                          <th>Level Name</th>
                          <th>Level Number</th>
                          <th>Status</th>
                          <th>Action</th>
                          
                        </tr>
                        @foreach ($levels as $each_level)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td class ="item_name" >{{$each_level->level_name }}</td>
                                <td>{{$each_level->level_number}}</td>
                                <td>{{$each_level->status}}</td>
                                <td>
                                    <a href = "{{route('level.show', $each_level->id)}}">Show | </a>
                                    <a href = "{{route('level.edit', $each_level->id)}}">Edit</a>
                                    <form class="delete_item" action="{{ route('level.destroy', $each_level->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                         
                            </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".delete_item").on('submit', function(e){
                var index = $('.delete_item').index(this);
                var item_name = $(".item_name:eq("+index+")").text();
            
                return confirm('Are you sure you want to delete "'+ item_name +'"?');
            });
        });
    </script>
@endsection