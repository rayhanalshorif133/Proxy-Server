<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProxy extends Model
{
    use HasFactory;

    protected $table = 'store_proxys';

    protected $fillable = [
        'proxy_id',
        'username',
        'password',
        'proxy_address',
        'port',
        'valid',
        'last_verification',
        'country_code',
        'city_name',
    ];
}
