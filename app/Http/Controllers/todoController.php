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
    	$data = new Todo();
    	$data->activitiy 	= $request->input('activitiy');
    	$data->description 	= $request->input('description');

    	$data->save();

    	return response('Data Has Been Recorded');
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
