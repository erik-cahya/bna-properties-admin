<?php

namespace Database\Seeders;

use App\Models\RegionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
                "Kuta",
                "Seminyak",
                "Canggu",
                "Jimbaran",
                "Nusa Dua",
                "Pecatu",
                "Uluwatu"
        ];

        foreach ($regions as $name) {
            RegionModel::create(['name' => $name]);
        }

        // foreach ($regions as $region => $subRegions) {
        //     $regionId = DB::table('regions')->insertGetId([
        //         'name' => ucfirst($region),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

        //     foreach ($subRegions as $subRegion) {
        //         DB::table('sub_regions')->insert([
        //             'region_id' => $regionId,
        //             'name' => $subRegion,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }
    }
}
