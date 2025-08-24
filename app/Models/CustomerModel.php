<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function bookings()
    {
        return $this->hasMany(BookingModel::class, 'customer_id');
    }
}
