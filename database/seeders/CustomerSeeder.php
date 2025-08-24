<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerModel;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            [
                'customer_name'    => 'John Doe',
                'customer_email'   => 'john.doe@example.com',
                'customer_phone'   => '+62 812-3456-7890',
            ],
            [
                'customer_name'    => 'Jane Smith',
                'customer_email'   => 'jane.smith@example.com',
                'customer_phone'   => '+62 811-2222-3333',
            ],
            [
                'customer_name'    => 'Michael Johnson',
                'customer_email'   => 'michael.johnson@example.com',
                'customer_phone'   => '+62 813-4444-5555',
            ],
            [
                'customer_name'    => 'Emily Davis',
                'customer_email'   => 'emily.davis@example.com',
                'customer_phone'   => '+62 815-6666-7777',
            ],
            [
                'customer_name'    => 'David Wilson',
                'customer_email'   => 'david.wilson@example.com',
                'customer_phone'   => '+62 817-8888-9999',
            ],
        ];

        foreach ($customers as $customer) {
            CustomerModel::create($customer);
        }
    }
}
