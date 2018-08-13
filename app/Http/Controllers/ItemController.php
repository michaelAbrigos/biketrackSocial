<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Response;
class ItemController extends Controller
{
     public function index()
    {
        $data = Item::all()->toJson();
        return json_encode(['Item'=>$data]);
    }
 
    public function show($id)
    {
    	 $data = Item::find($id);
    
        return Response::json($data,200);
       // return json_encode(['Item'=>$data]);
     
    }

    public function store(Request $request)
    {
    	
    	$product = json_decode($request->getContent(), true);
	$values = new Item();
    $values->description = $product["description"];
   
    $values->sell_price = $product['sell_price'];
    $values->cost_price = $product['cost_price'];
    $values->save();
    	
        $data=array('status' => 'saved');
        return Response::json($data,200);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $product = json_decode($request->getContent());
        $item->description = $product->description;
   
    $item->sell_price = $product->sell_price;
    $item->cost_price = $product->cost_price;
    $item->save();
    	
$data=array('status' => 'updated');
        return Response::json($data,200);
    }

    public function delete($id)
    {
        $Item = Item::findOrFail($id);
        $Item->delete();
		$data=array('status' => 'deleted');
        return Response::json($data,200);
    }

    public function testSave(Request $request){

    	/*$item = array('description' => 'Wood Puzzle','sell_price' => '21.95','cost_price' => '15.23','category_id' => '1');
    	$myjson = json_encode($item);

    	$product = json_decode($myjson, true);

    $values = new Item();
    $values->description = $product["description"];
    //$values->category_id= $product["category_id"];
    $values->sell_price = $product['sell_price'];
    $values->cost_price = $product['cost_price'];
    $values->save();*/

    	dd($request);

    }

    
}
