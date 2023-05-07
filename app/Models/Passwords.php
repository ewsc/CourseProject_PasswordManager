<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passwords extends Model
{
    protected $table = 'passwords';

    protected $fillable = [
        'pass_name',
        'pass_pass',
        'pass_key',

        'author_id',
    ];
}
