<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejection extends Model
{
    use HasFactory;

    protected $table = 'rejection';

    protected $fillable = [
        'reason',
        'dummy_id',
    ];

    // Relasi ke Dummy (jika kamu punya model Dummy)
    public function dummy()
    {
        return $this->belongsTo(Dummy::class);
    }
}
