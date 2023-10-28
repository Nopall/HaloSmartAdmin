<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\User;
use App\Models\FuelType;
use App\Models\History;
use App\Models\Earning;
use App\Models\Cost;
use App\Models\Route;
use App\Models\Charging;
use App\Models\Service;
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

    public function listCarBrand(): JsonResponse
    {
        $user = auth()->user();

        $cars = CarBrand::all();
    
        return $this->sendResponse(CarResource::collection($cars), 'Car retrieved successfully.');
    }

    public function listFuelType(): JsonResponse
    {
        $user = auth()->user();

        $fuel = FuelType::all();
    
        return $this->sendResponse(CarResource::collection($fuel), 'FuelType retrieved successfully.');
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

    public function addEarning(Request $request): JsonResponse
    {
        $input = $request->all();

        $user = auth()->user();
   
        $validator = Validator::make($input, [
            'date' => 'required',
            'time' => 'required',
            'odometer' => 'required',
            'earning_amount' => 'required',
            'earning_type' => 'required',
            'note' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input['user_id'] = $user->id;
        $input['note_type_id'] = 1;
        // dd($input);
        $history = History::create($input);

        if($history->exists){
            $input['history_id'] = $history->id;
            $earning = Earning::create($input);
        }
   
        return $this->sendResponse(null, 'Earning created successfully.');
    }

    public function addCost(Request $request): JsonResponse
    {
        $input = $request->all();

        $user = auth()->user();
   
        $validator = Validator::make($input, [
            'date' => 'required',
            'time' => 'required',
            'odometer' => 'required',
            'cost_type_id' => 'required',
            'location_id' => 'required',
            'payment_method_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input['user_id'] = $user->id;
        $input['note_type_id'] = 3;
        // dd($input);
        $history = History::create($input);

        if($history->exists){
            $input['history_id'] = $history->id;
            $charging = Cost::create($input);
        }
   
        return $this->sendResponse(null, 'Cost created successfully.');
    }

    public function addCharging(Request $request): JsonResponse
    {
        $input = $request->all();

        $user = auth()->user();
   
        $validator = Validator::make($input, [
            'date' => 'required',
            'time' => 'required',
            'odometer' => 'required',
            'fuel_id' => 'required',
            'charging_place_id' => 'required',
            'price' => 'required',
            'liter' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input['user_id'] = $user->id;
        $input['note_type_id'] = 2;
        // dd($input);
        $history = History::create($input);

        if($history->exists){
            $input['history_id'] = $history->id;
            $charging = Charging::create($input);
        }
   
        return $this->sendResponse(null, 'Charging created successfully.');
    }

    public function addService(Request $request): JsonResponse
    {
        $input = $request->all();

        $user = auth()->user();
   
        $validator = Validator::make($input, [
            'date' => 'required',
            'time' => 'required',
            'odometer' => 'required',
            'service_type_id' => 'required',
            'location_id' => 'required',
            'payment_method_id' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input['user_id'] = $user->id;
        $input['note_type_id'] = 4;
        // dd($input);
        $history = History::create($input);

        if($history->exists){
            $input['history_id'] = $history->id;
            $service = Service::create($input);
        }
   
        return $this->sendResponse(null, 'Charging created successfully.');
    } 

    public function addRoute(Request $request): JsonResponse
    {
        $input = $request->all();

        $user = auth()->user();
   
        $validator = Validator::make($input, [
            'date' => 'required',
            'time' => 'required',
            'odometer' => 'required',
            'first_location_id' => 'required',
            'last_location_id' => 'required',
            'first_date' => 'required',
            'last_date' => 'required',
            'first_odometer' => 'required',
            'last_odometer' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input['user_id'] = $user->id;
        $input['note_type_id'] = 4;
        // dd($input);
        $history = History::create($input);

        if($history->exists){
            $input['history_id'] = $history->id;
            $input['first_odometer'] = $request->odometer;
            $route = Route::create($input);
        }
   
        return $this->sendResponse(null, 'Route created successfully.');
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