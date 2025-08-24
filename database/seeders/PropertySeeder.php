<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertiesModel;
use App\Models\RegionModel;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'properties_code' => 'BNA-0001',
                'properties_name' => 'Modern Villa Ubud',
                'slug' => 'modern-villa-ubud',
                'description' => 'A beautiful modern villa in Ubud with rice field views.',
                'region_name' => 'Canggu', // for lookup only
                'address' => 'Jl. Monkey Forest No.88',
                'type_properties' => 'Villa',
                'number_bedroom' => 3,
                'number_bathroom' => 2,
                'properties_size' => 250,
                'year_build' => 2020,
                'max_people' => 6,
                'price_idr' => 5000000000,
                'price_usd' => 12000,
                'status_listing' => 'Available',
            ],
            [
                'properties_code' => 'BNA-0002',
                'properties_name' => 'Beachfront Villa Seminyak',
                'slug' => 'beachfront-villa-seminyak',
                'description' => 'Luxury villa right on Seminyak Beach.',
                'region_name' => 'Seminyak',
                'address' => 'Jl. Kayu Aya No.1',
                'type_properties' => 'Villa',
                'number_bedroom' => 4,
                'number_bathroom' => 3,
                'properties_size' => 400,
                'year_build' => 2018,
                'max_people' => 8,
                'price_idr' => 7500000000,
                'price_usd' => 3000,
                'status_listing' => 'Rented',
            ],
            [
                'properties_code' => 'BNA-0003',
                'properties_name' => 'Cliffside Villa Uluwatu',
                'slug' => 'cliffside-villa-uluwatu',
                'description' => 'Breathtaking cliffside views in Uluwatu.',
                'region_name' => 'Uluwatu',
                'address' => 'Jl. Labuan Sait No.23',
                'type_properties' => 'Villa',
                'number_bedroom' => 5,
                'number_bathroom' => 4,
                'properties_size' => 500,
                'year_build' => 2015,
                'max_people' => 10,
                'price_idr' => 12000000000,
                'price_usd' => 800,
                'status_listing' => 'Pending',
            ],
            [
                'properties_code' => 'BNA-0004',
                'properties_name' => 'Private Pool Villa Nusa Dua',
                'slug' => 'private-pool-villa-nusa-dua',
                'description' => 'Exclusive private pool villa in Nusa Dua.',
                'region_name' => 'Nusa Dua',
                'address' => 'Jl. Pratama No.45',
                'type_properties' => 'Villa',
                'number_bedroom' => 3,
                'number_bathroom' => 2,
                'properties_size' => 280,
                'year_build' => 2021,
                'max_people' => 6,
                'price_idr' => 6000000000,
                'price_usd' => 9000,
                'status_listing' => 'Available',
            ],
            [
                'properties_code' => 'BNA-0005',
                'properties_name' => 'Luxury Hillside Villa Jimbaran',
                'slug' => 'luxury-hillside-villa-jimbaran',
                'description' => 'Modern hillside villa with ocean views in Jimbaran.',
                'region_name' => 'Jimbaran',
                'address' => 'Jl. Uluwatu No.10',
                'type_properties' => 'Villa',
                'number_bedroom' => 4,
                'number_bathroom' => 3,
                'properties_size' => 350,
                'year_build' => 2019,
                'max_people' => 8,
                'price_idr' => 9000000000,
                'price_usd' => 8000,
                'status_listing' => 'Rented',
            ],
            [
                'properties_code' => 'BNA-000',
                'properties_name' => 'Luxury Hillside Villa Jimbaran',
                'slug' => 'luxury-hillside-villa-jimbaran',
                'description' => 'Modern hillside villa with ocean views in Jimbaran.',
                'region_name' => 'Jimbaran',
                'address' => 'Jl. Uluwatu No.10',
                'type_properties' => 'Villa',
                'number_bedroom' => 4,
                'number_bathroom' => 3,
                'properties_size' => 350,
                'year_build' => 2019,
                'max_people' => 8,
                'price_idr' => 9000000000,
                'price_usd' => 30000,
                'status_listing' => 'Rented',
            ],
            [
                'properties_code' => 'BNA-0007',
                'properties_name' => 'Luxury Hillside Villa Jimbaran',
                'slug' => 'luxury-hillside-villa-jimbaran',
                'description' => 'Modern hillside villa with ocean views in Jimbaran.',
                'region_name' => 'Jimbaran',
                'address' => 'Jl. Uluwatu No.10',
                'type_properties' => 'Villa',
                'number_bedroom' => 4,
                'number_bathroom' => 3,
                'properties_size' => 350,
                'year_build' => 2019,
                'max_people' => 8,
                'price_idr' => 9000000000,
                'price_usd' => 2000,
                'status_listing' => 'Rented',
            ],
            [
                'properties_code' => 'BNA-0008',
                'properties_name' => 'Luxury Hillside Villa Jimbaran',
                'slug' => 'luxury-hillside-villa-jimbaran',
                'description' => 'Modern hillside villa with ocean views in Jimbaran.',
                'region_name' => 'Jimbaran',
                'address' => 'Jl. Uluwatu No.10',
                'type_properties' => 'Villa',
                'number_bedroom' => 4,
                'number_bathroom' => 3,
                'properties_size' => 350,
                'year_build' => 2019,
                'max_people' => 8,
                'price_idr' => 9000000000,
                'price_usd' => 1000,
                'status_listing' => 'Rented',
            ],
        ];

       foreach ($properties as $data) {
            $region = RegionModel::where('name', $data['region_name'])->first();

            PropertiesModel::create([
                'properties_code'   => $data['properties_code'],
                'properties_name'   => $data['properties_name'],
                'slug'              => $data['slug'],
                'description'       => $data['description'],
                'region_id'         => $region ? $region->id : null,
                'address'           => $data['address'],
                'type_properties'   => $data['type_properties'],
                'number_bedroom'    => $data['number_bedroom'],
                'number_bathroom'   => $data['number_bathroom'],
                'properties_size'   => $data['properties_size'],
                'year_build'        => $data['year_build'],
                'max_people'        => $data['max_people'],
                'price_idr'         => $data['price_idr'],
                'price_usd'         => $data['price_usd'],
                'status_listing'    => $data['status_listing'],
            ]);
        }
    }
}
