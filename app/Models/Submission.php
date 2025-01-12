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

    protected $fillable = [
        'log_id', 'reviewer', 'reviewer_status', 'doc_group'
    ];

    public function log_id()
    {
        return $this->hasOne(LogDocument::class, 'id');
    }

    public function doc_group()
    {
        return $this->belongsTo(Dummy::class, 'doc_group');
    }

    public function pesans()
    {
        return $this->hasMany(Pesan::class, 'submission_id');
    }



}
