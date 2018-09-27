<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sensor extends Model
{
    /**
     * Set timestamps to fields
     *
     * @param  array $data
     * @return array
     */
    public function setCustomTimeStamps($data)
    {
        data_fill($data, '*.created_at', Carbon::now());
        
        data_fill($data, '*.updated_at',  Carbon::now());
        
        return $data;
    }
}
