<?php

namespace Database\Seeders;

use App\Models\FeatureListModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturePropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataFeature = [
            [
                'name' => 'Fully Furnished',
                'slug' => 'fully-furnished',
            ],
            [
                'name' => 'Equipped Kitchen',
                'slug' => 'equipped-kitchen',

            ],
            [
                'name' => 'Air Conditioning in All Room',
                'slug' => 'air-conditioning',

            ],
            [
                'name' => 'Dressing Room',
                'slug' => 'dressing-room',
            ],
            [
                'name' => 'Bathub',
                'slug' => 'bathub-master-bedroom',
            ],
            [
                'name' => 'Laundry Room',
                'slug' => 'laundry-room',
            ],
            [
                'name' => 'Office Spaces',
                'slug' => 'office-spaces',
            ],
            [
                'name' => 'Installed Wi-Fi',
                'slug' => 'installed-wifi',
            ],
            [
                'name' => 'Safe Box',
                'slug' => 'safe-box',
            ],
            [
                'name' => 'CCTY System',
                'slug' => 'cctv-system',
            ],
            [
                'name' => 'Pool',
                'slug' => 'pool',
            ],
            [
                'name' => 'Landscape Garden',
                'slug' => 'landscape-garden',
            ],
            [
                'name' => 'Gazebo / Outdoor Lounges',
                'slug' => 'gazebo-outdoor-lounges',
            ],
            [
                'name' => 'Rooftop',
                'slug' => 'rooftop',
            ],
            [
                'name' => 'Garage / Carport',
                'slug' => 'garage-carport',
            ]
        ];

        foreach ($dataFeature as $row) {
            FeatureListModel::create($row);
        }
    }
}
