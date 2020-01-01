@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Home</div>
                

                    <div class="card-body">
                        <div class ="float-right">
                            
                            <a class = "btn btn-success" href ="{{ route('student.create')}}">Create New Student</a>
                                
                        </div>

                        <table class = "table table-striped table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Student Birthday</th>
                                <th>Phone Number</th>
                                <th>Current Class Name</th>
                                <th>Level Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($student as $each_student)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td class = "item_name" >{{ $each_student->stu_name }}</td>
                                <td>{{$each_student->stu_dob}}</td>
                                <td>{{$each_student->stu_phone}}</td>
                                <td>{{$each_student->class->class_name}}</td>
                                <td>{{$each_student->class->level->level_name}}</td>
                                <td>{{$each_student->status}}</td>
                                <td>
                                    <a href = "{{route('student.show', $each_student->id)}}">Show | </a>
                                    <a href = "{{route('student.edit', $each_student->id)}}">Edit</a>
                                        <form class="delete_item" action="{{ route('student.destroy', $each_student->id) }}" method="POST">
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
    //Ajax content
    var token = "{{ csrf_token()}}";

    $('.btn_show_data').on('click',function())
</script>
@endsection