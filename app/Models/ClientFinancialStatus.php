<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFinancialStatus extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table= "client_financial_status";
}
