<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Level;
use App\Student;
use App\StudentImage;
use Illuminate\Http\Request;
 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $student = Student::all();
        return view('student.index', compact('student','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::pluck('class_name', 'id');
        $students = Student::all();
        return view('student.create', compact('students', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $student = Student::create($data);

        // if(!empty($student->id))
        // {
        //     $data['stu_id'] = $student->id;
        // }
       
        

        if($request->hasfile('student_image')) 
        {
            $file = $request->file('student_image');//get file from request

            $file_info['getClientOriginalName'] = $file->getClientOriginalName(); // Get Original File Name
            $file_info['getClientOriginalExtension'] = $file->getClientOriginalExtension(); // Get File Extension
            $file_info['getRealPath'] = $file->getRealPath(); // Get File Real Path
            $file_info['getMimeType'] = $file->getMimeType(); // Get File Mime Type

            $new_filename = 'student_image_'.date('Ymd_his').'.'.$file_info['getClientOriginalExtension']; //make new filename
            $file_path = '/public/student_images/'; //assign storage path
            $uploaded_file_data = $file->storeAs($file_path, $new_filename); //move to storage

            if(!empty($uploaded_file_data))
            {
                $student_image = StudentImage::create([
                    'si_filename' => $new_filename,
                    'si_filepath' => $file_path,
                    'si_fullpath' => $file_path.$new_filename,
                    'si_extension' => $file_info['getClientOriginalExtension'],
                    'stu_id' => $student->id,
                    'status' => 1,
                ]);
            }
        }


        return redirect()->route('student.index')->with('success', 'Level has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $title = "View Student";
        $return_route = 'student.show';

        $student_image = $student->student_image;
        // dd($student);

        return view('student.show', compact(
            'student',
            'student_image', 
            'title', 
            'return_route'
            ))->with('i',0);

    }

    public function ajax_show(Request $request)
    {
        if($request->ajax())
        {
            $student = Student::find($request->stu_id);
        
            $title = "View Student";
            $return_route = 'student.index';
            //$student_classes = $student->student_class;
            $student_image = $student->student_image;
            $is_ajax = true;

            return view('students.show_ajax', compact(
                'title', 
                'return_route',
                'student',
                //'student_classes',
                'student_image',
                'is_ajax'
            ))->with('i',0);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        
        $classes = Classes::pluck('class_name', 'id');
        $class_level = Classes::pluck('level_id', 'id');

        // $students = Student::all();
        $student_image = $student->student_image;
        $level_list= Level::pluck('level_name','id');

        return view('student.edit', compact('student', 'classes', 'level_list', 'level_id', 'student_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //dd($request);
        $student->update($request->all());

        if($request->hasfile('student_image'))
        {
            $file = $request->file('student_image');//get file from request

            $file_info['getClientOriginalName'] = $file->getClientOriginalName(); // Get Original File Name
            $file_info['getClientOriginalExtension'] = $file->getClientOriginalExtension(); // Get File Extension
            $file_info['getRealPath'] = $file->getRealPath(); // Get File Real Path
            $file_info['getMimeType'] = $file->getMimeType(); // Get File Mime Type

            $new_filename = 'student_image_'.date('Ymd_his').'.'.$file_info['getClientOriginalExtension'];//make new filename
            $file_path = '/public/student_images/'; //Assign Storage path

            $uploaded_file_data = $file->storeAs($file_path, $new_filename); //move file to storage :storeAs = boleh bagi name dengan tepat dan boleh keluar error
            
            //if upload succes
            if(!empty($uploaded_file_data))
            {
                $student_image = $student->student_image; //get StudentImage record for the student
                //dd($student_image);
                if(!empty($student_image))
                {
                    // Update Existing Image
                    $student_image->si_filename = $new_filename;
                    $student_image->si_filepath = $file_path;
                    $student_image->si_fullpath = $file_path.$new_filename;
                    $student_image->si_extension = $file_info['getClientOriginalExtension'];
                    $student_image->update();
                }
                
                else {
                    // Store New Image if Not Exist
                    $student_image = StudentImage::create([
                    'si_filename' => $new_filename,
                    'si_filepath' => $file_path,
                    'si_fullpath' => $file_path.$new_filename,
                    'si_extension' => $file_info['getClientOriginalExtension'],
                    'stu_id' => $student->id,
                    'status' => 1,
                ]);
                }
            }
        }
        //dd();
        return redirect()->route('student.index')->with('success','Student<b>'.$student->stu_name.'</b> has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student_delete = $student->stu_name;
        //Model: Delete Student Image
        $student_image = $student->student_image;
        if(!empty($student_image))
        {
            $student_image_id = $student_image->pluck('id');
            StudentImage::destroy($student_image_id);
        }

        $student->delete();
        return redirect()->route('student.index')->with('success','Class<b>'.$student->stu_name.'</b> has been deleted successfully');
    }
}
