<?php

namespace App\Http\Controllers;
use App\Http\Resources\room_ava\RoomAva as RoomAvaResource;
use App\Http\Resources\room_ava\RoomAvaCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\RoomAva;

class RoomAvaController extends Controller
{

    public function index()
    {
       return new RoomAvaCollection(RoomAva::all());
    
    }
   
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
           "startdate"=>"required",    
           "enddate" => "required",     
           "price" =>"required",
           "extrabed_price" => "required",
           "room_id"=> "required",
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'data'=>' data is required']);
        }

        else{ 
            $room_ava=RoomAva::create([
            'startdate'=> request('startdate'),     
            'enddate'=> request('enddate'),   
            'price' => request('price'),     
            'extrabed_price'=> request('extrabed_price'),     
            'room_id'=> request('room_id'),           
            ]);
            return response()->json(['success'=>true,'data'=>new RoomAvaResource($room_ava)]);
        }         

    }

  
    public function show($id)
    {
         $room_ava=RoomAva::find($id);
         if($room_ava!=null){
            return response()->json(['success'=>true,'data'=>new RoomAvaResource($room_ava)]);
         }
         else{
             return response()->json(['success'=>true,'data'=>'RoomAva not found to show']);
         }
         

    }

    public function update(Request $request, $id)
    {   
        
      
        $room_ava=RoomAva::find($id);
     
        if(isset($room_ava)){
            if(isset($request->startdate)){
                $room_ava->startdate=request('startdate');

            }   
            if(isset($request->enddate)){
                $room_ava->enddate=request('enddate');

            }   
            if(isset($request->price)){
                $room_ava->price=request('price');

            }   
            if(isset($request->extrabed_price)){
                $room_ava->extrabed_price=request('extrabed_price');

            }   
            if(isset($request->room_id)){
                $room_ava->room_id=request('room_id');

            }   
          
            $room_ava->update();
            return response()->json(['success'=>true, 'data'=>'Room Ava Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'Room Ava not found  to update']);
        }

    }
    
    public function destroy($id)
    {
        $room_ava=RoomAva::find($id);
        if($room_ava!=null){
            $room_ava->delete();
            return response()->json(['success'=>true,'data'=>'Room  Ava deleted successfully']);
        }
        else{
            return response()->json(['success'=>false,'data'=>'Room  Ava not found to delete']);
        }
    }
}
