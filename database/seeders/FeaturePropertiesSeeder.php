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
                'name' => 'Dressing Room or Built-in Wardobes',
                'slug' => 'dressing-room-built-wardobe',
            ],
            [
                'name' => 'Bathub in Master Bedroom',
                'slug' => 'bathub-master-bedroom',
            ],
            [
                'name' => 'Laundry Room with Washing Machince',
                'slug' => 'laundry-room',
            ],
            [
                'name' => 'Home Cinema or Projector',
                'slug' => 'home-cinema',
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
                'name' => 'Smart Home System',
                'slug' => 'smart-home-system',
            ],
            [
                'name' => 'Integrated Audio System',
                'slug' => 'integrated-audio-system',
            ],
            [
                'name' => 'CCTY System',
                'slug' => 'cctv-system',
            ],
            [
                'name' => 'Infinity Pool',
                'slug' => 'infinity-pool',
            ],
            [
                'name' => 'Pool Deck / Sun Loungers Included',
                'slug' => 'pool-deck-sun-loungers',
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
                'name' => 'Outdoor Shower',
                'slug' => 'outdoor-shower',
            ],
            [
                'name' => 'Outdoor Kitchen or Barbeque Area',
                'slug' => 'outdoor-kitchen-barbeque-area',
            ],
            [
                'name' => 'Garage / Carport',
                'slug' => 'garage-carport',
            ],
            [
                'name' => 'Automatic Gate',
                'slug' => 'automatic-gate',
            ],
            [
                'name' => 'Ocean View',
                'slug' => 'ocean-view',
            ],
            [
                'name' => 'Rice Field View',
                'slug' => 'rice-field-view',
            ],
            [
                'name' => 'Jungle View',
                'slug' => 'jungle-view',
            ],
            [
                'name' => 'West Facing (Sunset View)',
                'slug' => 'west-facing',
            ],
            [
                'name' => 'Direct Beach Access',
                'slug' => 'direct-beach-access',
            ],
            [
                'name' => 'Rooftop Terrace',
                'slug' => 'rooftop-terrace',
            ],
        ];

        foreach ($dataFeature as $row) {
            FeatureListModel::create($row);
        }
    }
}
