<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Car;
use App\Models\User;
use Validator;
use App\Http\Resources\CarResource;
use Illuminate\Http\JsonResponse;
   
class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCar(): JsonResponse
    {
        $user = auth()->user();

        $cars = Car::with('carBrand', 'fuelType', 'fuelTypeSecondary')->where('user_id', $user->id)->get();
    
        return $this->sendResponse(CarResource::collection($cars), 'Car retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCar(Request $request): JsonResponse
    {
        $input = $request->all();

        $user = auth()->user();
   
        $validator = Validator::make($input, [
            'car_name' => 'required',
            'car_brand_id' => 'required',
            'car_model' => 'required',
            'police_number' => 'required',
            'police_number_year' => 'required',
            'tank_type' => 'required',
            'fuel_type_id' => 'required',
            'capacity' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input['user_id'] = $user->id;
        // dd($input);
        $car = Car::create($input);
   
        return $this->sendResponse(new CarResource($car), 'Car created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $car = Car::find($id);
  
        if (is_null($car)) {
            return $this->sendError('Car not found.');
        }
   
        return $this->sendResponse(new CarResource($car), 'Car retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car): JsonResponse
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'car_name' => 'required',
            'car_brand_id' => 'required',
            'car_model' => 'required',
            'police_number' => 'required',
            'police_number_year' => 'required',
            'tank_type' => 'required',
            'fuel_type_id' => 'required',
            'capacity' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $car->update($input);
   
        return $this->sendResponse(new CarResource($car), 'Car updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car): JsonResponse
    {
        $car->delete();
   
        return $this->sendResponse([], 'Product deleted successfully.');
    }
}