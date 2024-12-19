<?php

namespace App\Models;

use App\Models\Pesan;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory, HasRoles;
    public $table = 'submission';
    protected $guarded = ['id'];

    public function logDocument()
    {
        return $this->belongsTo(LogDocument::class, 'log_id', 'id');
    }

    public function dummy()
    {
        return $this->hasOne(Dummy::class, 'id', 'doc_group');
    }

    public function pesan()
{
    return $this->hasMany(Pesan::class);
}

}
