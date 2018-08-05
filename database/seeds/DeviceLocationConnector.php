<?php

use Illuminate\Database\Seeder;
use App\Device;
use App\User;
class DeviceLocationConnector extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	try {
    		$user1 = User::find(1);
	        $device1 = Device::find(1);
	        $device1->users()->attach($user1->id);

	        $user2 = User::find(2);
	        $device2 = Device::find(2);
	        $device2->users()->attach($user2->id);

	        $user3 = User::find(3);
	        $device3 = Device::find(3);
	        $device3->users()->attach($user3->id);
    		
    	} catch (Exception $e) {
    		return $e;
    	}
        

    }
}
