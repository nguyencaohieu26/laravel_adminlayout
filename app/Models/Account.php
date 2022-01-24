<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;
    //The fillable property specifies which attributes should be mass-assignable. This can be set at
    //the class or instance level
    protected $fillable = array(
        'username',
        'fullname',
        'address',
        'email',
        'phone',
        'password',
        'image',
        'status'
    );
}
