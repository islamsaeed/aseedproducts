<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasTranslations;
    public $translatable = ['descreption'];

    use SoftDeletes;

    protected $table = 'sliders';
    public $timestamps = true;
    protected $guarded = [];
}
