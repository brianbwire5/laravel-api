<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;


class DeviceController extends Controller
{
    function add(Request $req)
    {
       //return Device::all();
       $device= new Device;
       $device->name=$req->name;
       $device->member_id=$req->member_id;
       $result=$device->save(); //to save data in the database
       if($result)
       {
       return ["Result"=>"Data has been saved"];
       }
       else
       {
       return ["Result"=>"Operation failed"];
       }
    }
    function list()
    {
        return Device::all(); 
    }
    function getList($id)
    {
        return Device::find($id); 
    }
    function update(Request $req)
    {   
        $device = Device::find($req->id);
        $device->name=$req->name;
        $device->member_id=$req->member_id;
        $result= $device->save();

        if($result)
        {
            return["result"=>"data is updated"];
        }
            return["result"=>"Data has not been updated"];       
    }

    function search($name)
    {
        return Device::where("name", "like", "%".$name."%")->get();
    }
    function delete($id)
    {

        $device = Device::find($id);
        $result = $device ->delete();

        if ($result)
        {
            return["result"=>"Data was deleted successfully  " .$id];
        }
        else{
            return["Operation has failed"];
        }
        //return Device::where("id=$id")->delete();
    }
    function testData(Request $req)//req comes from postman
    {   
        $rules = array(
            "member_id"=>"required|min:2|max:4"     
        );
        $validator=Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),401);
        }
        else
        {
            $device= new Device;
            $device->name=$req->name;
            $device->member_id=$req->member_id;
            $result = $device->save();
            if ($result)
            {
            return["result"=>"Data has been saved"];
            }
            else{
            return["result"=>"Operation has failed"];
         }
        }
        
    }


}
