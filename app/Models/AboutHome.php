<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutHome extends Model
{
    use HasTranslations;
    public $translatable = ['descreption','title'];

    use SoftDeletes;

    protected $table = 'about_homes';
    public $timestamps = true;
    protected $guarded = [];
}
