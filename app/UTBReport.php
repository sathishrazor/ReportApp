<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UTBReport extends Model
{
      //
      protected $fillable = [

        "date_of_exam",
        "tranid",

        "photo_1",
        "photo_2",
        "drawing",


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

        "ut_equipment",
        "ut_equipment_sr_no",
        "type_of_scan",
        "method_of_test",
        "cable_type",
        "cable_length",
        "v1_block_sr_no",
        "v2_block_sr_no",
        "cal_block_sr_no",
        "couplant",
        "thickness",
        "weld_joint_no",

        "calibration_remarks",
        "contractor",
        "inspected_by",
        "authorised_by"
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
        return $this->HasMany(ut_interpretation::class);
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
