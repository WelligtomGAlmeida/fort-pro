<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavePoint extends Model
{
    protected $table = "saving_points";

    protected $fillable = [
        'save_date'
    ];
}
