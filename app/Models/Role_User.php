<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    use HasFactory;
    protected $fillable = [
        'User_ID',
        'Role_ID',
        'status'
    ];
}
