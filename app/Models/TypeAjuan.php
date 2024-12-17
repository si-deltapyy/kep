<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAjuan extends Model
{
    use HasFactory;
    public $table = 'ajuan_type';
    protected $guarded = ['id'];

    public function template()
    {
        return $this->hasMany(Template::class, 'type_ajuan', 'id');
    }
}
