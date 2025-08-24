<?php

namespace App\Models;

use App\Models\PropertiesModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    use HasFactory;
    protected $table = 'regions';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function properties()
    {
        return $this->hasMany(PropertiesModel::class);
    }
}
