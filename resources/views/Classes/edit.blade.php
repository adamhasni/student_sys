@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="{{ route ('class.update', $class->id)}}">
                    @csrf
                    @method('PUT')
                    
                        <fieldset>
                        
                        <!-- Form Name -->
                        <legend>Form Name</legend>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="level_name">Class Name</label>  
                          <div class="col-md-4">
                          <input id="class_name" name="class_name" type="text" placeholder="Class Name" class="form-control input-md" required="" value ="{{$class->class_name }}">
                            
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="level_number">Darjah?</label>
                          <div class="col-md-4">
                            <select id="level_id" name="level_id" class="form-control">
                              @foreach ($levels as $each_level)
                                <option value ="{{ $each_level->id }}">{{ $each_level->level_name }}</option>
                              @endforeach
                      
                            </select>
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="status">status</label>
                          <div class="col-md-4">
                            <select id="status" name="status" class="form-control">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="button1id"></label>
                          <div class="col-md-8">
                            <button id="button1id" name="button1id" class="btn btn-success">Save</button>
                            <button type="button" id="button2id" name="button2id" class="btn btn-danger" onclick="window.location.href='{{ route('class.index')}}'">Cancel</button>
                          </div>
                        </div>
                        
                        </fieldset>
                        </form>
                        
                        
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
