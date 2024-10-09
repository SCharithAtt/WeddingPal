<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'date',
        'venue',
        'notes',
        'bride',
        'groom',
        'time_from',
        'time_to',
        'number_of_guests',
        'contact_person_name',
        'contact_person_mobile',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
