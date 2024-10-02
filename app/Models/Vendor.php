<?php
// app/Models/Vendor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'store_address',
        'store_email',
        'store_contact',
        'category',
        'price_bracket',
        'service_area',
        'bio',
        'description',
        'images',
        'bank_account_number',
        'bank_name',
        'branch',
        'account_name',
        'open_hours',
        'terms_conditions',
        'website_url',
        'facebook_link',
        'instagram_link',
    ];

    protected $casts = [
        'images' => 'array',
        'open_hours' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
