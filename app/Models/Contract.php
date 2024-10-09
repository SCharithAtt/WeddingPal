<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'client_id',
        'wedding_id',
        'date',
        'terms',
        'price',
        'vendor_confirm',
        'client_confirm',
    ];

    /**
     * Get the vendor associated with the contract.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    /**
     * Get the client associated with the contract.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the wedding associated with the contract.
     */
    public function wedding()
    {
        return $this->belongsTo(Wedding::class);
    }
}
