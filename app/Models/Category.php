<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use HasTranslations;
    // public $translatable = ['name'];

    // use SoftDeletes;

    // protected $table = 'categories';
    // public $timestamps = true;
    // protected $guarded = [];



    // // RELATIONS
    //     // ONE TO MANY WITH PRODUCTS
    //     public function products()
    //     {
    //         return $this->hasMany(Product::class)->withTrashed();
    //     }




    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    use HasTranslations;
    public $translatable = ['name'];
    // protected $table = 'categories';

    public $timestamps = true;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}



