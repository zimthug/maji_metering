<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{

    protected $meter_set_id;
    protected $customer_id;
    protected $dom_meter_id;
    protected $dom_meter;
    protected $bulk_meter_id;
    protected $bulk_meter;
    protected $reading_date;
    protected $reading_id;
    protected $period;
    protected $dom_meter_reading;
    protected $bulk_meter_reading;
    protected $consumption;
    protected $remaining_units;
    protected $previous_reading_id;

}