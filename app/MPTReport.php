<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPTReport extends Model
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
        "weld_reinforcement",

        "type_of_equip",
        "type_of_current",
        "chemical_manufacture",
        "cleaner_batch_no",
        "contrast_batch_no",
        "black_ink_batch_no",
        "white_light_level",
        "black_light_level",
        "light_meter_sr_no",
        "type_of_particle",
        "particle_medium",
        "type_of_magnetism",
        "pole_spacing",
        "lifting_capacity",

        "contractor",
        "configuration",
        "inspected_by",
        "authorised_by"
    ];

    public function interpretations()
    {
        return $this->HasMany(interpretation::class);
    }

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

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($report) { // before delete() method call this
            $report->interpretations()->delete();
        });
    }
}
