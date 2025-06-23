<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    use HasFactory;
    protected $table = 'regions';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function subregions()
    {
        return $this->hasMany(SubRegionModel::class);
    }
}
