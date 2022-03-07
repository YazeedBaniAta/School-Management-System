<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationalitie extends Model
{
    //
    use HasTranslations;
    public $translatable = ['Name'];
    protected $fillable =['Name'];

   //وبنستخدمها كما هي //هاي بدال الي فوق بس لو كان عنا اكثر من حقل
    //protected $guarded =[];
}
