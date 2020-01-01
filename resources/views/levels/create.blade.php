@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route ('level.store')}}">
                    @csrf
                    
                        <fieldset>
                        
                        <!-- Form Name -->
                        <legend>Form Name</legend>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="level_name">Level Name</label>  
                          <div class="col-md-4">
                          <input id="level_name" name="level_name" type="text" placeholder="Level Name" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="level_number">Level number</label>
                          <div class="col-md-4">
                            <select id="level_number" name="level_number" class="form-control">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
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
                          <label class="col-md-4 control-label" for="button1id">Double Button</label>
                          <div class="col-md-8">
                            <button id="button1id" name="button1id" class="btn btn-success">Save</button>
                            <button type = "button" id="button2id" name="button2id" class="btn btn-danger" onclick="window.location.href='{{ route('level.index')}}'">Cancel</button>
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
