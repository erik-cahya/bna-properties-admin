<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturePropertyModel extends Model
{
    use HasFactory;

    protected $table = 'feature_property';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
