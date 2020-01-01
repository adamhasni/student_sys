@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="{{ route ('student.store')}}" enctype = "multipart/form-data">

                    @csrf
                    <fieldset>
                    
                    <!-- Form Name -->
                    <legend>Student Form</legend>

                    <!-- File Button & Image Placeholder --> 
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="student_image">Add Student Picture:</label>
                      <div class="col-md-4">
                        <img id="student_image_placeholder" src="" alt="" style="border-radius: 10px; margin-bottom: 10px;"><br>
                        <button class="btn btn-primary" type="button" onclick="$('#student_image_btn').trigger('click');">Add Image</button>
                        <input style="display: none;" id="student_image_btn" name="student_image" class="input-file" type="file" accept=".jpg, .jpeg, .png" onchange="preview_selected_image(this)">
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="stu_name">Student Name</label>  
                      <div class="col-md-4">
                      <input id="stu_name" name="stu_name" type="text" placeholder="Student Name" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="stu_dob">Student Birthday</label>  
                      <div class="col-md-4">
                      <input id="stu_dob" name="stu_dob" type="date" placeholder="Student Birthday" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="stu_phone">Student Phone Number</label>  
                      <div class="col-md-4">
                      <input id="stu_phone" name="stu_phone" type="text" placeholder="Phone Number" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="current_class_id">Current Class</label>
                      <div class="col-md-4">
                        <select id="current_class_id" name="current_class_id" class="form-control" required>
                          <option class = "current_class_id_item" value = "" selected disabled> Choose class</option>
                          @foreach($classes as $current_class_id => $class_name)
                          
                            <option value="{{$current_class_id}}">{{$class_name}}</option>
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

{{-- JavaScript --}}
<script>
  // $(document).ready(function(){
  //     var token = "{{ csrf_token() }}";
  //     $('#level_id').on('change', function(){
  //         var ajax = $.ajax({
  //             method: "POST",
  //             url: "{{ route('student.ajax_get_class_list') }}",
  //             data: { 
  //                 "_token": token,
  //                 "level_id": $(this).val()
  //             }
  //         });
  //         ajax.done(function(data) {
  //             console.log( "success" );
  //             $("#current_class_id").html(data);
  //             $(".current_class_id_item:eq(0)").prop('selected', true);
  //         });
  //         ajax.fail(function() {
  //             console.log( "error" );
  //         });
  //         ajax.always(function() {
  //             console.log( "complete" );
  //         });
  //     });
  //     // $('form').on('submit', function(e){
  //     //     // e.preventDefault();
  //     // });
  // });
  
  // Preview Image after Choosing File
  function preview_selected_image(image) {
      if(image.files && image.files[0])
      {
          console.log(image.files[0]);
          var reader = new FileReader();
          reader.onload = function(e) {
              $("#student_image_placeholder").attr('src', e.target.result).width(200).height(200);
          }
          reader.readAsDataURL(image.files[0]);
      } else {
          $("#student_image_placeholder").attr('src', null);
      }
  }
</script>

@endsection
