<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ECDocument extends Model
{
    use HasFactory;
    public $table = 'ec_document';
    protected $guarded = ['id'];
}
