<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Section'];

    protected $table = 'sections';
    public $timestamps = true;

    protected $fillable=[
        'Name_Section','Grade_id','Class_id'
    ];


    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function classRoom_table()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }

// علاقة المعلمين مع الاقسام
    public function Teachers()
    {
        return $this->belongsToMany('App\Models\Teachers','teacher_section');
    }


}
