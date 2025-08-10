<?php

namespace App\Models;

use App\Models\PropertyGalleryModel;
use App\Models\RegionModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyGalleryImageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertiesModel extends Model
{
    use HasFactory;

    protected $table = 'properties';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    // PropertiesModel.php
    public function featuredImage()
    {
        return $this->hasOneThrough(
            PropertyGalleryImageModel::class,
            PropertyGalleryModel::class,
            'properties_id', // Foreign key on PropertyGallery table
            'gallery_id',    // Foreign key on PropertyGalleryImage table
            'id',            // Local key on Properties table
            'id'             // Local key on PropertyGallery table
        );
    }

    public function region()
    {
        return $this->belongsTo(RegionModel::class);
    }
}
