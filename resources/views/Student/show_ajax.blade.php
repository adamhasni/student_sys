



                        <table class="table table-striped table-bordered">
                            @if(!empty($student_image))
                              <tr>
                                <td class="text-center" colspan="2">
                                    <img src="{{url('storage/student_images/'.$student_image->si_filename) }}" alt="Picture of {{ $student->stu_name }}">
                                    
                                </td>
                              </tr>
                            @endif
                            {{-- <tr>
                              <td>ID</td>
                              <td>{{$student->id}}</td>
                            </tr> --}}
                            <tr>
                              <td>Student Name</td>
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
                              <td>Level name</td>
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
                        

