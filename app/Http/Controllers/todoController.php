<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Todo;

class todoController extends Controller
{
   
    public function index(){
    	$data = Todo::all();
    	return response($data);
    }

    public function show($id){
    	$data = Todo::where('id', $id)->get();
    	return response ($data);
    }

    public function store (Request $request){

    	$act  = $request->input('activitiy');
    	$desc = $request->input('description');

    	$data1 = Todo::where('activitiy', $act)
    			->where('description', $desc)
    			->first();
    	
    	//data baru
		if ($data1 == null) {

   			$data = new Todo();
   			$data->activitiy = $act;
   			$data->description = $desc;

   			$data->save();
   			return response('Data Has Been Recorded');
		} else {
			//data yang dah exist but update to latest one
			
			/*$id1 = $data1->id;
			$data2 = Todo::all()->where('id', $id1)->first();
			$data2->activitiy = $act;
			$data2->description = $desc;

			$data2->save();*/
			return response('Data Has Already Exist');
		}

    }

    public function update (Request $request, $id){
    	$data = Todo::where('id', $id)->first();

    	$data->activitiy = $request->input('activitiy');
    	$data->description = $request->input('description');
    	$data->save();

    	return response('Data Has Been Updated');
    }

    public function destroy($id){
    	$data = Todo::where('id', $id)->first();
    	$data->delete();

    	return response("Data Successfull Delete");
    }

}
