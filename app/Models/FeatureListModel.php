<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureListModel extends Model
{
    use HasFactory;

    protected $table = 'feature_list';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function properties()
    {
        return $this->belongsToMany(
            PropertiesModel::class, // related model
            'feature_property',   // pivot table
            'feature_id',           // pivot column for feature
            'properties_id'         // pivot column for properties
        );
    }
}
