<?php

namespace App\Http\Controllers;
use App\Http\Resources\hotel\Hotel as HotelResource;
use App\Http\Resources\hotel\HotelCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Hotel;
use App\City;
use App\Township;
class HotelController extends Controller
{ 
    public function index()
    {
         return new HotelCollection(Hotel::all());
    }
    public function store(Request $request)
    {    
         
        $validator=Validator::make($request->all(),[
            "hotel_name" => "required",
            "hotel_phone" => "required",
            "hotel_image" => "required", 
            "hotel_address" => "required",    
            "hotel_email" => "required",
            "hotel_website" => "required",
            "cities_id" => "required", 
            "townships_id" => "required",       
        ]);

        if($validator->fails()){
            return response()->json(['success'=>false,'data'=>'hotel data  is required']);
        }
        else{

         
            $cities_id=$request->cities_id;
            $city=City::find($cities_id);
            if(isset($city) && $city->id==$cities_id)
                {
                    $hotel=new Hotel;
                    $hotel->hotel_name=request('hotel_name');
                    $hotel->hotel_phone=request('hotel_phone');
                    $hotel->hotel_image=request('hotel_image');
                    $hotel->hotel_address=request('hotel_address');
                    $hotel->hotel_email=request('hotel_email');
                    $hotel->hotel_website=request('hotel_website');
                    $hotel->townships_id=request('townships_id');   
                    $hotel->cities_id=$cities_id;                              
                    $hotel->save();                  
                    return response()->json(['success'=>true,'data'=>'hotel data is stored successfully']);
                }
            else{
                return response()->json(['success'=>true,'data'=>'city   not found to create item']);
            }
        }
    }

  
    public function show($id)
    {
        $hotel=Hotel::find($id);
        if($hotel!=null){
            return response()->json(['success'=>true,'data' => new HotelResource ($hotel)]);
        }
        else{
            return response()->json(['success' => false, 'data' => 'Hotel not found to show']);
        }
    }

    public function update(Request $request, $id)
    {   
          // dd($request->id);
        $hotel=Hotel::find($id);
     
        if(isset($hotel)){
            if(isset($request->hotel_name)){
                $hotel->hotel_name=request('hotel_name');

            }   
            if(isset($request->hotel_phone)){
                $hotel->hotel_phone=request('hotel_phone');

            }   
            if(isset($request->hotel_image)){
                $hotel->hotel_image=request('hotel_image');

            }   
            if(isset($request->hotel_address)){
                $hotel->hotel_address=request('hotel_address');

            }   
            if(isset($request->hotel_email)){
                $hotel->hotel_email=request('hotel_email');

            }   
            if(isset($request->hotel_website)){
                $hotel->hotel_website=request('hotel_website');

            }   
            if(isset($request->townships_id)){
                $hotel->townships_id=request('townships_id');

            }   
           
            if(isset($request->cities_id)){
                $hotel->cities_id=request('cities_id');

            }   
            $hotel->update();
            return response()->json(['success'=>true, 'data'=>'Hotel Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'Hotel  not found  to update']);
        }
    }


    public function destroy($id)
    {
        $hotel=Hotel::find($id);
        if(isset($hotel)){             
                 
            $hotel->delete();            
            return response()->json(['success'=>true, 'data'=>'Hotel Deleted Successfully']);
        }
        else{
            return response()->json(['success'=>false, 'data'=>'Not found Hotel  to delete']);
        }
    }
    public function getHotelByCityId($id){
      
        $hotels=Hotel::where('cities_id', $id)->get();    
        return new HotelCollection($hotels);        
      

    }
   

    
}
