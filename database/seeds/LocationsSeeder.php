<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loc1 = new Location;
        $loc1->latitude = "14.527124";
        $loc1->longitude = "121.061458";
        $loc1->device_id = 1;
        $loc1->save();

        $loc2 = new Location;
        $loc2->latitude = "14.525623";
        $loc2->longitude = "121.043071";
        $loc2->device_id = 2;
        $loc2->save();

        $loc3 = new Location;
        $loc3->latitude = "14.508620";
        $loc3->longitude = "121.037183";
        $loc3->device_id = 3;
        $loc3->save();

    }
}
