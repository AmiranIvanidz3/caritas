<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCurrentStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table= "client_current_status";

}