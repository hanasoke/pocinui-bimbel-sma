<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function studentSubject() { 
        return $this->belongsTo(StudentSubject::class); 
    }

    public function chapter() { 
        return $this->belongsTo(SubjectChapter::class, 'chapter_id'); 
    }

    public function teacher() { 
        return $this->belongsTo(Teacher::class); 
    }
}
