<?php

use Illuminate\Database\Seeder;
use App\Place;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $place1 = new Place();
        $place1->name= "UP Diliman Trails";
        $place1->latitude = "14.6546954";
        $place1->longitude = "121.0644032";
        $place1->url = "img/Up_diliman_trail.jpg";
        $place1->save();

        $place2 = new Place();
        $place2->name= "Camp Aguinaldo Trail";
        $place2->latitude = "14.6058678";
        $place2->longitude = "121.0624505";
        $place2->url = "img/Camp_Aguinaldo_Trail1.jpg";
        $place2->save();
        
        $place3 = new Place();
        $place3->name= "Filinvest MTB Trail";
        $place3->latitude = "14.4159457";
        $place3->longitude = "121.030963";
        $place3->url = "img/Filinvest_MTB_Trail2.jpg";
        $place3->save();

        $place4 = new Place();
        $place4->name= "Timberland Heights";
        $place4->latitude = "14.6798381";
        $place4->longitude = "121.1502357";
        $place4->url = "img/Timberland_Heights2.jpg";
        $place4->save();

        $place5 = new Place();
        $place5->name= "Puray Falls";
        $place5->latitude = "14.77621";
        $place5->longitude = "121.2125233";
        $place5->url = "img/Puray_Falls1.jpg";
        $place5->save();

        $place6 = new Place();
        $place6->name= "Mt. Balagbag";
        $place6->latitude = "14.8239921";
        $place6->longitude = "121.1620705";
        $place6->url = "img/Mt_Balagbag2.jpg";
        $place6->save();

        $place7 = new Place();
        $place7->name= "La Mesa Nature Reserve";
        $place7->latitude = "14.7438064";
        $place7->longitude = "121.0620067";
        $place7->url = "img/La_Mesa_Nature_Reserve1.jpg";
        $place7->save();

        $place8 = new Place();
        $place8->name= "Manila Memorial Park";
        $place8->latitude = "14.4713353";
        $place8->longitude = "121.0058642";
        $place8->url = "img/Manila_Memorial_Park3.jpg";
        $place8->save();
        
        $place9 = new Place();
        $place9->name= "Intramuros";
        $place9->latitude = "14.589216";
        $place9->longitude = "120.9656417";
        $place9->url = "img/Intramuros1.jpg";
        $place9->save();
       
        $place10 = new Place();
        $place10->name= "BGC";
        $place10->latitude = "14.5431919";
        $place10->longitude = "121.0065249";
        $place10->url = "img/BGC1.jpg";
        $place10->save();

        $place11 = new Place();
        $place11->name= "Cultural Center of the Philippines";
        $place11->latitude = "14.5582883";
        $place11->longitude = "120.9836751";
        $place11->url = "img/Cultural_Center_of_the_Philippines3.jpg";
        $place11->save();
        
        $place12 = new Place();
        $place12->name= "SM Moa Complex";
        $place12->latitude = "14.5352364";
        $place12->longitude = "120.9799218";
        $place12->url = "img/SM_Moa_Complex2.jpg";
        $place12->save();

        $place13 = new Place();
        $place13->name= "Circuit Makati";
        $place13->latitude = "14.5754835";
        $place13->longitude = "121.0163734";
        $place13->url = "img/Circuit_Makati2.jpeg";
        $place13->save();
        
        $place14 = new Place();
        $place14->name= "Circulo Verde, The Bike Playground";
        $place14->latitude = "14.6010469";
        $place14->longitude = "121.0875147";
        $place14->url = "img/Circulo_Verde.jpg";
        $place14->save();

        $place15 = new Place();
        $place15->name= "Neopolitan business Park";
        $place15->latitude = "14.7280304";
        $place15->longitude = "121.0557106";
        $place15->url = "img/Up_diliman_trail.jpg";
        $place15->save();

        $place16 = new Place();
        $place16->name= "Heroes Bike Trail";
        $place16->latitude = "14.521138";
        $place16->longitude = "121.0438473";
        $place16->url = "img/Neopolitan.jpg";
        $place16->save();

        $place17 = new Place();
        $place17->name= "Kinabuan Falls";
        $place17->latitude = "14.7592897";
        $place17->longitude = "121.3192293";
        $place17->url = "img/Kinabuan.jpg";
        $place17->save();

        $place18 = new Place();
        $place18->name= "Inmalog Trail";
        $place18->latitude = "16.1761202";
        $place18->longitude = "120.4454928";
        $place18->url = "img/inmalog1.jpg";
        $place18->save();

        $place19 = new Place();
        $place19->name= "Wawa Dam";
        $place19->latitude = "14.5309173";
        $place19->longitude = "121.1166404";
        $place19->url = "img/wawa1.jpg";
        $place19->save();

        $place20 = new Place();
        $place20->name= "Kaybiang tunnel";
        $place20->latitude = "14.2429412";
        $place20->longitude = "120.6275714";
        $place20->url = "img/kaybiang3.jpg";
        $place20->save();

        $place21 = new Place();
        $place21->name= "Kamay ni hesus";
        $place21->latitude = "14.1017925";
        $place21->longitude = "121.5703545";
        $place21->url = "img/kamay1.jpg";
        $place21->save();
        

        $place22 = new Place();
        $place22->name= "Nuvali";
        $place22->latitude = "14.2409306";
        $place22->longitude = "121.0550367";
        $place22->url = "img/nuvali3.jpg";
        $place22->save();

        
    }
}
