<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\PropertiesModel;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $customerIds = \App\Models\CustomerModel::pluck('id')->toArray();
        $propertyIds = \App\Models\PropertiesModel::pluck('id')->toArray();

        for ($i = 1; $i <= 12; $i++) {
            $startDate = Carbon::now()->addDays(rand(1, 10));
            $endDate = (clone $startDate)->addDays(rand(3, 14));

            BookingModel::create([
                'customer_id'   => $customerIds[array_rand($customerIds)],
                'properties_id' => $propertyIds[array_rand($propertyIds)],
                'start_date'    => $startDate,
                'end_date'      => $endDate,
                'dp_amount'      => fake()->numberBetween(1000, 5000),
                'dp_status'      => fake()->randomElement(['Paid', 'Unpaid', 'No Deposit']),
                'status'        => collect(['Pending', 'Confirmed', 'Completed', 'Cancelled', 'On Going'])->random(),
            ]);
        }
    }
}
