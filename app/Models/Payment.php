<?php

namespace App\Models;

use App\Models\Dummy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    public $table = 'payment';
    protected $guarded = ['id'];

    public function Dummy()
    {
        return $this->belongsTo(Dummy::class, 'group_id');
    }
}
