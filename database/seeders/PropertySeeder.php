<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertiesModel;
class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'properties_code' => 'P-001',
                'properties_name' => 'Modern Villa Ubud',
                'slug' => 'modern-villa-ubud',
                'description' => 'A beautiful modern villa in Ubud with rice field views.',
                'region' => 'Bali',
                'sub_region' => 'Ubud',
                'address' => 'Jl. Monkey Forest No.88',
                'type_properties' => 'Villa',
                'number_bedroom' => 3,
                'number_bathroom' => 2,
                'properties_size' => 250,
                'year_build' => 2020,
                'max_people' => 6,
                'price_idr' => 5000000000,
                'price_usd' => 350000,
                'status_listing' => 'available',
            ],
            [
                'properties_code' => 'P-002',
                'properties_name' => 'Cliffside Luxury Villa',
                'slug' => 'cliffside-luxury-villa',
                'description' => 'Luxury villa with a stunning ocean view.',
                'region' => 'Bali',
                'sub_region' => 'Uluwatu',
                'address' => 'Jl. Pantai Suluban',
                'type_properties' => 'Villa',
                'number_bedroom' => 5,
                'number_bathroom' => 4,
                'properties_size' => 450,
                'year_build' => 2018,
                'max_people' => 10,
                'price_idr' => 15000000000,
                'price_usd' => 1000000,
                'status_listing' => 'available',
            ],
            [
                'properties_code' => 'P-003',
                'properties_name' => 'Minimalist Canggu Home',
                'slug' => 'minimalist-canggu-home',
                'description' => 'Minimalist home close to Canggu cafes and surf.',
                'region' => 'Bali',
                'sub_region' => 'Canggu',
                'address' => 'Jl. Batu Bolong No.123',
                'type_properties' => 'House',
                'number_bedroom' => 2,
                'number_bathroom' => 1,
                'properties_size' => 120,
                'year_build' => 2022,
                'max_people' => 4,
                'price_idr' => 2500000000,
                'price_usd' => 180000,
                'status_listing' => 'available',
            ],
            [
                'properties_code' => 'P-004',
                'properties_name' => 'Lombok Hillside Retreat',
                'slug' => 'lombok-hillside-retreat',
                'description' => 'Peaceful retreat overlooking Lombok hills.',
                'region' => 'Lombok',
                'sub_region' => 'Kuta',
                'address' => 'Jl. Mandalika No.9',
                'type_properties' => 'Villa',
                'number_bedroom' => 4,
                'number_bathroom' => 3,
                'properties_size' => 300,
                'year_build' => 2019,
                'max_people' => 8,
                'price_idr' => 4000000000,
                'price_usd' => 280000,
                'status_listing' => 'available',
            ],
            [
                'properties_code' => 'P-005',
                'properties_name' => 'Jakarta Penthouse Suite',
                'slug' => 'jakarta-penthouse-suite',
                'description' => 'High-end penthouse in central Jakarta.',
                'region' => 'Jakarta',
                'sub_region' => 'Menteng',
                'address' => 'Jl. Thamrin No.1',
                'type_properties' => 'Apartment',
                'number_bedroom' => 3,
                'number_bathroom' => 3,
                'properties_size' => 200,
                'year_build' => 2015,
                'max_people' => 5,
                'price_idr' => 8000000000,
                'price_usd' => 550000,
                'status_listing' => 'sold',
            ],
            [
                'properties_code' => 'P-006',
                'properties_name' => 'Seminyak Family Villa',
                'slug' => 'seminyak-family-villa',
                'description' => 'Cozy family-friendly villa near Seminyak beach.',
                'region' => 'Bali',
                'sub_region' => 'Seminyak',
                'address' => 'Jl. Kayu Aya No.19',
                'type_properties' => 'Villa',
                'number_bedroom' => 3,
                'number_bathroom' => 2,
                'properties_size' => 180,
                'year_build' => 2021,
                'max_people' => 6,
                'price_idr' => 4500000000,
                'price_usd' => 320000,
                'status_listing' => 'pending',
            ],
        ];

        foreach ($properties as $property) {
            PropertiesModel::create($property);
        }
    }
}
