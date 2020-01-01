@if (empty($is_ajax))
  @extends('layouts.app')
  @section('content')
@endif
<style>
  .img-container{
    text-align: center;
  }
</style>


                        <table class="table table-striped table-bordered">

                          @if (!empty($student_image))
                            <tr>
                              <td class="text-center" colspan="2">
                                <img src="{{ url('storage/student_images/'.$student_image->si_filename) }}" alt="Picture of {{ $student->stu_name }}">
                              </td>
                            </tr>
                          @endif
                            {{-- <tr>
                              <td class= "img-container" colspan="2">
                                <img width="200" height="200" src="{{ (!empty($student_image)) ? url('/storage/student_images/'.$student_image->si_filename) : null }}" alt=""> 
                                <img src="{{url('/storage/student_images/'.$student_image->si_filename)}}" alt=""> 
                              
                              </td>
                            </tr> --}}
                             {{-- <tr>
                              <td>ID</td>
                              <td>{{$student->id}}</td>
                            </tr> --}}
                            <tr>
                              <td>Class Name</td>
                              <td>{{$student->stu_name}}</td>
                            </tr>
                            <tr>
                              <td>Student Date of Birth</td>
                              <td>{{$student->stu_dob}}</td>
                            </tr>
                            <tr>
                              <td>Student phone number</td>
                              <td>{{$student->stu_phone}}</td>
                            </tr>
                            <tr>
                              <td>Class name</td>
                              <td>{{$student->class->class_name}}</td>
                            </tr>
                            <tr>
                              <td>Level</td>
                              <td>{{$student->class->level->level_name}}</td>
                            </tr>
                            <tr>
                              <td>Created at</td>
                              <td>{{$student->created_at}}</td>
                            </tr>
                            <tr>
                              <td>Updated at</td>
                              <td>{{$student->updated_at}}</td>
                            </tr>
                          </table>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@if (empty($is_ajax))
    @endsection
@endif
