<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UTGTReport extends Model
{
    protected $fillable = [

        //customer details
       "created_by",
       "owner",
       "owner_address",
       "client",
       "client_address",
       "project",
       "project_address",
       "requested_by",
       "request_no",
       "po_tranno",
       "wo_tranno",

        //sytem details
       "procedure_no",
       "reference_code",
       "acceptance_criteria",
       "project_spec",
       "material",
       "grade",
       "surface_condition",
       "surface_temperature",
       "weld_process",
       "weld_preparation",

        //method details
       "ut_equipment",
       "ut_equipment_sr_no",
       "probe_type",
       "probe_angle",
       "probe_frequency",
       "probe_size",
       "probe_sr_no",
       "stop_wedge_sr_no",
       "couplant",

        //final thoughts
       "remarks",
       "date_of_exam",
       "tranid",
       "inspected_by",
       "authorised_by",
       "contractor",
       //images

     "photo_1",
     "photo_2",
     "drawing",
];


public function owner_ref()
{
 return $this->belongsTo(Owner::class, "owner");
}

public function client_ref()
{
 return $this->belongsTo(Client::class, "client");
}

public function project_ref()
{
 return $this->belongsTo(Project::class, "project");
}

public function requested_by_ref()
{
 return $this->belongsTo(Employee::class, 'requested_by');
}

public function inspected_by_ref()
{
 return $this->belongsTo(Employee::class, 'inspected_by');
}

public function authorised_by_ref()
{
 return $this->belongsTo(Employee::class, 'authorised_by');
}


public function interpretations()
{
 return $this->HasMany(interpretation::class);
}


// this is a recommended way to declare event handlers
public static function boot()
{
 parent::boot();

 static::deleting(function ($report) { // before delete() method call this
     $report->interpretations()->delete();
 });
}
}
