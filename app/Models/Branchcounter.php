<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branchcounter extends Model
{
    use HasFactory;
    protected $table = 'branchcounter';
    protected $guarded = ['*'];
}
