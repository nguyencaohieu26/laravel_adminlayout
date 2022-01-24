<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_Function extends Model
{
    use HasFactory;
    protected $fillable =[
        'Function_ID',
        'Role_ID',
        'status'
    ];
}
