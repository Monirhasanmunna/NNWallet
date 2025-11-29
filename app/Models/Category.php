<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
    ];

    public function FeatureLists()
    {
        return $this->hasMany(FeatureList::class, 'category_id', 'id');
    }
}
