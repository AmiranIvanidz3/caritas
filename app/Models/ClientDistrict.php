<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDistrict extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table= "client_district";

    public function city()
    {
        return $this->belongsTo(ClientCity::class, 'client_city_id');
    }
}
