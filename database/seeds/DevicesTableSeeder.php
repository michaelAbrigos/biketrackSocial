<?php

use Illuminate\Database\Seeder;
use App\Device;
class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	for ($device_number=1; $device_number < 11; $device_number++) { 
    		$device = new Device;
    		$dname = "BTS_" . (string)$device_number;
	        $device->device_name = $dname;
	        $device->device_code = substr((sha1($dname)),0,8);
	        $device->save();
    	}
        
    }
}
