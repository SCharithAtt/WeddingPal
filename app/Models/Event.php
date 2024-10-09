<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Event extends Model
{
    protected $fillable = ['vendor_id', 'title', 'start', 'end'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}

