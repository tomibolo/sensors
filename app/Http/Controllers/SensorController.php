<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Sensor;
use App\Http\Resources\Sensor as SensorResource;

class SensorController extends Controller
{
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
        $input = $request->all();
        $data = data_get($input, 'data' ,[]);
        $ids = [];
        foreach ($data as $key => $row) {
          $sensor_id = data_get($row, 'sensor_id');
          $master_id = data_get($row, 'master_id');
          $sensornode_id = data_get($row, 'sensornode_id');
          $contactsensor_state = data_get($row, 'contactsensor_state');
          $battery_voltage = data_get($row, 'battery_voltage');
          $sensor = $request->isMethod('put') ? Sensor::findOrFail($sensor_id) : new Sensor;
          $sensor->id = $sensor_id;
          $sensor->master_id = $master_id;
          $sensor->sensornode_id = $sensornode_id;
          $sensor->contactsensor_state = $contactsensor_state;
          $sensor->battery_voltage = $battery_voltage;
          if($sensor->save()) {
              $ids[] = $sensor->id;
          }
        }
        $sensors = Sensor::whereIn('id', $ids)->get();
        // Return collection of sensors as a resource
        return SensorResource::collection($sensors);
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
}
