<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_default',
        'receiver_name',
        'receiver_phone',
        'city_id',
        'district',
        'postal_code',
        'detail_addresses',
        'address_notes',
        'type'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getApiResponseAttribute()
    {
        return [
            'uuid' => $this->uuid,
            'is_default' => (boolean) $this->is_default,
            'receiver_name' => $this->receiver_name,
            'receiver_phone' => $this->receiver_phone,
            'city' => $this->city->api_response,
            'district' => $this->district,
            'postal_code' => $this->postal_code,
            'detail_addresses' => $this->detail_addresses,
            'address_notes' => $this->address_notes,
            'type' => $this->type,
        ];
    }
}
