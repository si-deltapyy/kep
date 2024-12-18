<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dummy extends Model
{
    use HasFactory;
    public $table = 'dummy';
    protected $guarded = ['id'];

    public function Submission()
    {
        return $this->hasMany(Submission::class, 'doc_group', 'id');
    }
}
