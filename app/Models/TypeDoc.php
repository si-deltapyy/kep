<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDoc extends Model
{
    use HasFactory;
    public $table = 'document_type';
    protected $guarded = ['id'];
}
