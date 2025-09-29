<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function getApiResponseAttribute()
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
        ];
    }
}
