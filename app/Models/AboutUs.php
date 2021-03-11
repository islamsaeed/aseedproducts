<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use HasTranslations;
    public $translatable = ['descreption'];

    use SoftDeletes;

    protected $table = 'about_us';
    public $timestamps = true;
    protected $guarded = [];
}
