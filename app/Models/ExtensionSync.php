<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtensionSync extends Model
{
    protected $fillable = ['session_id', 'platform', 'device_name', 'app_version'];
}
