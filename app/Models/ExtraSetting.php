<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraSetting extends Model
{
    protected $fillable = [
        'name', 'value', 'user_id'
    ];
}
