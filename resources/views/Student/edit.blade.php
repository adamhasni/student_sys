@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route ('student.update', $student->id)}}" method="POST" enctype = "multipart/form-data">

                        @csrf
                        @method('PUT')
                        <fieldset>
                        
                        <!-- Form Name -->
                        <legend>Student Form</legend>

                         <!-- File Button & Image Placeholder --> 
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="student_image">Student Picture:</label>
                            <div class="col-md-4">
                            <img id="student_image_placeholder" src="{{ (!empty($student->student_image->si_filename)) ? url('storage/student_images/'.$student->student_image->si_filename) : null}}" alt="" style="border-radius: 10px; margin-bottom: 10px;"><br>
                              <button class="btn btn-primary" type="button" onclick="$('#student_image_btn').trigger('click');">Change Picture</button>
                              <input style="display: none;" id="student_image_btn" name="student_image" class="input-file" type="file" accept=".jpg, .jpeg, .png" onchange="preview_selected_image(this)">
                            </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="stu_name">Student Name</label>  
                          <div class="col-md-4">
                            <input id="stu_name" name="stu_name" type="text" placeholder="Student Name" class="form-control input-md" required="" value ="{{$student->stu_name }}">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="stu_dob">Student Birthday</label>  
                          <div class="col-md-4">
                            <input id="stu_dob" name="stu_dob" type="date" placeholder="Student Birthday" class="form-control input-md" required="" value = "{{$student->stu_dob}}">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="stu_phone">Student Phone Number</label>  
                          <div class="col-md-4">
                            <input id="stu_phone" name="stu_phone" type="text" placeholder="Phone Number" class="form-control input-md" required="" value = "{{$student->stu_phone}}">
                            
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="current_class_id">Current Class</label>
                          <div class="col-md-4">
                            <select id="current_class_id" name="current_class_id" class="form-control" required>
                              <option value = "" selected disabled> Choose class</option>
                              @foreach($classes as $current_class_id => $class_name)
                                <option class="current_class_id_item" value="{{ $current_class_id }}" {{ ($current_class_id == $student->current_class_id) ? 'selected' : null }} >{{ $class_name }}</option>
                                {{-- <option value="{{$current_class_id}}">{{$class_name}}</option> --}}
                              @endforeach
                            </select>
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="status">Status</label>
                          <div class="col-md-4">
                            <select id="status" name="status" class="form-control">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for=""></label>
                          <div class="col-md-8">
                            <button id="" name="" class="btn btn-success">Save</button>
                            <button type="button" id="" name="" class="btn btn-danger" onclick= "window.location.href = '{{ route('student.index') }}' " >Cancel</button>
                          </div>
                        </div>
                        
                        </fieldset>
                        </form>
                        
                        
                        
                </div>
            </div>
        </div>
    </div>
</div>

<script>
//Preview image
  function preview_selected_image(image){
    if(image.files && image.files[0])
    {
      console.log(image.files[0]);
      var reader = new FileReader();
      reader.onload = function(e){
        $("#student_image_placeholder").attr('src', e.target.result).width(200).height(200);      
        }
        reader.readAsDataURL(image.files[0]);
    }
    else{
      $("#student_image_placeholder").attr('src', null);
    }
    
  }
</script>
@endsection
