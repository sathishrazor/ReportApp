<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RTReport extends Model
{
    //
    protected $fillable = [
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
                "procedure_no",
                "reference_code",
                "acceptance_criteria",
                "project_spec",
                "material",
                "grade",
                "surface_condition",
                "surface_temperature",
                "drawing_no",
                "line_no",
                "weld_process",
                "weld_reinforcement",
                "xray_volt_src",
                "src_spot_size",
                "flim_manufacturer",
                "flim_type",
                "flim_in_cassette",
                "technique",
                "sod",
                "ofd",
                "iqi",
                "sensitivity",
                "ug",
                "lead_scr_thickness",
                "configuration",
                "welder_id",
                "technician_1",
                "technician_2",
                "inspected_by",
                "authorised_by"
    ];

    public function interpretations()
    {
       return $this->HasMany(interpretation::class);
    }

    public function owner_ref()
    {
        return $this->belongsTo(Owner::class,"owner");
    }

    public function client_ref()
    {
        return $this->belongsTo(Client::class,"client");
    }

    public function project_ref()
    {
        return $this->belongsTo(Project::class,"project");
    }

    public function requested_by_ref()
    {
        return $this->belongsTo(Employee::class,'requested_by');
    }


    public function inspected_by_ref()
    {
        return $this->belongsTo(Employee::class,'inspected_by');
    }

    public function authorised_by_ref()
    {
        return $this->belongsTo(Employee::class,'authorised_by');
    }

    public function technician_1_ref()
    {
        return $this->belongsTo(Employee::class,'technician_1');
    }

    public function technician_2_ref()
    {
        return $this->belongsTo(Employee::class,'technician_2');
    }

      // this is a recommended way to declare event handlers
      public static function boot() {
        parent::boot();

        static::deleting(function($report) { // before delete() method call this
             $report->interpretations()->delete();
             // do the rest of the cleanup...
        });
    }
}
