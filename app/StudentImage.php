<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentImage extends Model
{
    protected $table = 'student_images';
    
    // Table columns associated with the model
    protected $fillable = [
        'si_filename',
        'si_filepath',
        'si_fullpath',
        'si_extension',
        'stu_id',
        'status',
    ];
    
    // public function student_image()
    // {
    //     $student_image = $this->hasMany('App\StudentImage', 'stu_id', 'id');

    //     return $student_image;
    // }

    public function getStatus()
    {
        if($this->status === 1)
        {
            return "Active";
        }
        else if($this->status === 0)
        {
            return "Inactive";
        }
    }
}
