<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementModel extends Model
{
    use HasFactory;
    public $table = 'management';
    public $timestamps = false;
    protected $fillable = [
        'maintenance_start',
        'maintenance_end',
        'title',
        'is_down',
    ];

}
