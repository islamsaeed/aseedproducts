<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{

    use HasTranslations;
    public $translatable = ['Country','city','adress'];
    use SoftDeletes;
    protected $table = 'contact_us';
    public $timestamps = true;
    protected $guarded = [];
}
