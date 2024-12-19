<?php

namespace App\Models;

use App\Models\Dummy;
use App\Models\Submission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesan extends Model
{
    use HasFactory;

    public function dummy()
{
    return $this->belongsTo(Dummy::class);
}

public function submission()
{
    return $this->belongsTo(Submission::class);
}
}
