<?php

use Illuminate\Database\Seeder;
use App\User;
use App\User_info;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->username = "BTS_user1";
        $user1->email = "user1@gmail.com";
        $user1->password = Hash::make("123456");
        $user1->is_verified = 1;
        $user1->parent_id = 0;
        $user1->save();
        $user1->assignRole('bike_user');

        $user2 = new User();
        $user2->username = "BTS_user2";
        $user2->email = "user2@gmail.com";
        $user2->password = Hash::make("123456");
        $user2->is_verified = 1;
        $user2->parent_id = 0;
        $user2->save();
        $user2->assignRole('bike_user');

        $user3 = new User();
        $user3->username = "BTS_user3";
        $user3->email = "user3@gmail.com";
        $user3->password = Hash::make("123456");
        $user3->is_verified = 1;
        $user3->parent_id = 0;
        $user3->save();
        $user3->assignRole('bike_user');

        $user4 = new User();
        $user4->username = "admin";
        $user4->email = "admin@gmail.com";
        $user4->password = Hash::make("BTSadmin");
        $user4->is_verified = 1;
        $user4->parent_id = 0;
        $user4->save();
        $user4->assignRole('admin');


        //information for users and admin
        $info1 = new User_info();
        $info1->first_name = "user";
        $info1->last_name = "one";
        $info1->birthday = "2018-01-01";
        $info1->gender = "Male";
        $info1->contact_number = "09123456789";
        $info1->address = "9510 Sgt. Fabian Yabut Circle, Guadalupe Nuevo";
        $info1->city = "Makati City";
        $info1->zip_code = "1212";
        $info1->about_me = "Hi im using this awesome app!";
        $info1->user_id = $user1->id;
        $info1->save();

        $info2 = new User_info();
        $info2->first_name = "user";
        $info2->last_name = "two";
        $info2->birthday = "2018-01-01";
        $info2->gender = "Male";
        $info2->contact_number = "09123456789";
        $info2->address = "9510 Sgt. Fabian Yabut Circle, Guadalupe Nuevo";
        $info2->city = "Makati City";
        $info2->zip_code = "1212";
        $info2->about_me = "Hi im using this awesome app!";
        $info2->user_id = $user2->id;
        $info2->save();

        $info3 = new User_info();
        $info3->first_name = "user";
        $info3->last_name = "three";
        $info3->birthday = "2018-01-01";
        $info3->gender = "Female";
        $info3->contact_number = "09123456789";
        $info3->address = "9510 Sgt. Fabian Yabut Circle, Guadalupe Nuevo";
        $info3->city = "Makati City";
        $info3->zip_code = "1212";
        $info3->about_me = "Hi im using this awesome app!";
        $info3->user_id = $user3->id;
        $info3->save();

        $info4 = new User_info();
        $info4->first_name = "admin";
        $info4->last_name = "admin";
        $info4->birthday = "2018-01-01";
        $info4->gender = "Male";
        $info4->contact_number = "09123456789";
        $info4->address = "9510 Sgt. Fabian Yabut Circle, Guadalupe Nuevo";
        $info4->city = "Makati City";
        $info4->zip_code = "1212";
        $info4->about_me = "Hi im using this awesome app!";
        $info4->user_id = $user4->id;
        $info4->save();

    }
}
