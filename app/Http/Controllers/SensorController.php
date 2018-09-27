<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sensor;
use App\Http\Resources\Sensor as SensorResource;
use  App\Http\Requests\SensorMassiveRequest;
use DB;

class SensorController extends Controller
{
    private $sensor;

    public function __construct(Sensor $sensor)
    {
        $this->sensor = $sensor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get sensors
        $sensors = Sensor::paginate(15);
        // Return collection of sensors as a resource
        return SensorResource::collection($sensors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sensor = $request->isMethod('put') ? Sensor::findOrFail($request->sensor_id) : new Sensor;
        $sensor->id = $request->input('sensor_id');
        $sensor->master_id = $request->input('master_id');
        $sensor->sensornode_id = $request->input('sensornode_id');
        $sensor->contactsensor_state = $request->input('contactsensor_state');
        $sensor->battery_voltage = $request->input('battery_voltage');
        if($sensor->save()) {
            return new SensorResource($sensor);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get sensors
        $sensor = Sensor::findOrFail($id);
        
        // Return single sensors as a resource
        return new SensorResource($sensor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get sensor
        $sensor = Sensor::findOrFail($id);
        
        if($sensor->delete()) {
            return new SensorResource($sensor);
        }  
    }

    /**
     * Store many resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMany(SensorMassiveRequest $request)
    {
        try 
        {
            DB::beginTransaction();
            
            $sensors = Sensor::insert($this->sensor->setCustomTimeStamps($request->data));
            
            DB::commit();

            return response()->json(['status' => 'ok']);

        } catch (\Exception $e) 
        {
            DB::rollBack();
            
            return response()->json(['status' => 'error']);
        }
    }
}
