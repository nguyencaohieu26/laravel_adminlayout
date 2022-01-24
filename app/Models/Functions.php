<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Functions extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Func_Code',
        'Func_Url',
        'Func_Name',
        'Description',
        'status',
        'Show_Menu'
    ];
}
