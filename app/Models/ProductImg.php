<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductImg extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    //   use SoftDeletes;

    protected $fillable = ['color_name', 'product_id', 'tiny_img', 'max_img', 'code_img', 'updated_at', 'created_at'];
    use HasTranslations;
    public $translatable = ['color_name'];

    public $timestamps = true;

    /**
     * The roles that belong to the ProductImg
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'color_productImgs', 'product_img_id', 'color_id');
    }

    /**
     * Get the user that owns the ProductImg
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
