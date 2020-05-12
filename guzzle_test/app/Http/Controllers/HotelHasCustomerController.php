<?php

namespace App\Http\Controllers;
use App\Http\Resources\hotel_has_customer\HotelHasCustomer as HotelHasCustomerResource;
use App\Http\Resources\hotel_has_customer\HotelHasCustomerCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\HotelHasCustomer;
use App\City;
use App\Township;


class HotelHasCustomerController extends Controller
{
    public function index()
    {
         return new HotelHasCustomerCollection(HotelHasCustomer::all());
    }
    public function store(Request $request)
    {    
         
        $validator=Validator::make($request->all(),[
            "hotels_id" => "required",
            "hotels_cities_id" => "required",
            "hotels_townships_id" => "required", 
            "customers_id" => "required",    
                  
        ]);

        if($validator->fails()){
            return response()->json(['success'=>false,'data'=>'data  is required']);
        }
        else{

         
            // $cities_id=$request->cities_id;
            // $city=City::find($cities_id);
            // if(isset($city) && $city->id==$cities_id)
            //     {
                    $hotel_has_customer=new HotelHasCustomer;
                    $hotel_has_customer->hotels_id=request('hotels_id');
                    $hotel_has_customer->hotels_cities_id=request('hotels_cities_id');
                    $hotel_has_customer->hotels_townships_id=request('hotels_townships_id');
                    $hotel_has_customer->customers_id=request('customers_id');
                                                
                    $hotel_has_customer->save();                  
                    return response()->json(['success'=>true,'data'=>'hotel has customer is stored successfully']);
            //     }
            // else{
            //     return response()->json(['success'=>true,'data'=>'city   not found to create item']);
            // }
        }
    }

  
    public function show($id)
    {
        $hotel_has_customer=HotelHasCustomer::find($id);
        if($hotel_has_customer!=null){
            return response()->json(['success'=>true,'data' => new HotelHasCustomerResource ($hotel_has_customer)]);
        }
        else{
            return response()->json(['success' => false, 'data' => 'HotelHasCustomer not found to show']);
        }
    }

    public function update(Request $request, $id)
    {   
          // dd($request->id);
        $hotel_has_customer=HotelHasCustomer::find($id);
     
        if(isset($hotel_has_customer)){
            if(isset($request->hotels_id)){
                $hotel_has_customer->hotels_id=request('hotels_id');

            }   
            if(isset($request->hotels_cities_id)){
                $hotel_has_customer->hotels_cities_id=request('hotels_cities_id');

            }   
            if(isset($request->hotels_townships_id)){
                $hotel_has_customer->hotels_townships_id=request('hotels_townships_id');

            }   
            if(isset($request->customers_id)){
                $hotel_has_customer->customers_id=request('customers_id');

            } 
            $hotel_has_customer->update();
            return response()->json(['success'=>true, 'data'=>'HotelHasCustomer Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'HotelHasCustomer  not found  to update']);
        }
    }


    public function destroy($id)
    {
        $hotel_has_customer=HotelHasCustomer::find($id);
        if(isset($hotel_has_customer)){            
            $hotel_has_customer->delete();            
            return response()->json(['success'=>true, 'data'=>'HotelHasCustomer Deleted Successfully']);
        }
        else{
            return response()->json(['success'=>false, 'data'=>'Not found HotelHasCustomer']);
        }
    }
 
}
