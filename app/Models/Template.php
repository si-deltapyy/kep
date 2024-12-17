<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    public $table = 'template';
    protected $guarded = ['id'];

    public function typeAjuan()
    {
        return $this->belongsTo(TypeAjuan::class, 'type_ajuan', 'id');
    }
}
