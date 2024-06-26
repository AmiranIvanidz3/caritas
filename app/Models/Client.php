<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table= "client";


    public function type()
    {
        return $this->belongsTo(ClientType::class, 'client_type_id');
    }
}
