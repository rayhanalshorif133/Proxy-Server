<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'user_id',
        'service',
        'location',
        'porxy_ip',
        'porxy_port',
        'porxy_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getLocation($id)
    {
        $location = Location::select('name')->where('id','=', $id)->first();
        return $location->name ? $location->name : 'Unknown';
    }
}
