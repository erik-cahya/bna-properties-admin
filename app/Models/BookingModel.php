<?php

namespace App\Models;


use App\Models\PropertiesModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function properties()
    {
        return $this->belongsTo(PropertiesModel::class);
    }

    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }
}
