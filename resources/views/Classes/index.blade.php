@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Home</div>
                

                    <div class="card-body">
                        <div class ="float-right">
                            
                            <a class = "btn btn-success" href ="{{ route('class.create')}}">Create New Class</a>
                                
                        </div>

                        <table class = "table table-striped table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Class Name</th>
                                <th>Level Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($classes as $each_class)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td class = "item_name" >{{ $each_class->class_name }}</td>
                                <td>{{$each_class->level->level_name}}</td>
                                <td>{{$each_class->status}}</td>
                                <td>
                                    <a href = "{{route('class.show', $each_class->id)}}">Show | </a>
                                    <a href = "{{route('class.edit', $each_class->id)}}">Edit</a>
                                        <form class="delete_item" action="{{ route('class.destroy', $each_class->id) }}" method="POST">
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