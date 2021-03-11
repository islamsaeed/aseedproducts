<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductSlidern extends Model
{

    protected $hidden = ['created_at', 'updated_at'];
    //   use SoftDeletes;

    protected $fillable = ['image', 'description'];
    use HasTranslations;
    public $translatable = ['description'];

    public $timestamps = true;
}
