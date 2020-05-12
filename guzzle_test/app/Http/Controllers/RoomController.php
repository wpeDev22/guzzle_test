<?php

namespace App\Http\Controllers;
use App\Http\Resources\room\Room as RoomResource;
use App\Http\Resources\room\RoomCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function index()
    {
       return new RoomCollection(Room::all());
    
    }
   
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
           "room_name"=>"required",    
           "extrabed" => "required",     
           "hotels_id" =>"required"
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'data'=>' data is required']);
        }

        else{ 
            $room=Room::create([
            'room_name'=> request('room_name'),     
            'extrabed'=> request('extrabed'),   
            'hotels_id' => request('hotels_id'),              
            ]);
            return response()->json(['success'=>true,'data'=>new RoomResource($room)]);
        }         

    }

  
    public function show($id)
    {
         $room=Room::find($id);
         if($room!=null){
            return response()->json(['success'=>true,'data'=>new RoomResource($room)]);
         }
         else{
             return response()->json(['success'=>true,'data'=>'Room  not found to show']);
         }
         

    }

    public function update(Request $request, $id)
    {   
        
      
        $room=Room::find($id);
     
        if(isset($room)){
            if(isset($request->room_name)){
                $room->room_name=request('room_name');

            }   
            if(isset($request->extrabed)){
                $room->extrabed=request('extrabed');

            }   
            if(isset($request->hotels_id)){
                $room->hotels_id=request('hotels_id');

            }   
            
            $room->update();
            return response()->json(['success'=>true, 'data'=>'Room  Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'Room  not found  to update']);
        }

    }
    
    public function destroy($id)
    {
        $room=Room::find($id);
        if($room!=null){
            $room->delete();
            return response()->json(['success'=>true,'data'=>'Room deleted successfully']);
        }
        else{
            return response()->json(['success'=>false,'data'=>'Room not found to delete']);
        }
    }
}
