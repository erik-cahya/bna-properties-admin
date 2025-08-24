<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureListPropertyModel extends Model
{
    use HasFactory;

    protected $table = 'feature_property';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function properties()
    {
        return $this->belongsToMany(
            PropertiesModel::class,
            'feature_property',
            'feature_id',     // pivot key for features
            'properties_id'   // pivot key for properties
        );
    }

}
