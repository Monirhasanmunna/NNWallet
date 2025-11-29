<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureList extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'icon',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
