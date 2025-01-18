<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjuanType extends Model
{
    use HasFactory;
    public $table = 'ajuan_type';
    protected $guarded = ['id'];

    public function Document()
    {
        return $this->hasMany(Document::class, 'ajuan_type');
    }
}
