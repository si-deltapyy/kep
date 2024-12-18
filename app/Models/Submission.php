<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Submission extends Model
{
    use HasFactory, HasRoles;
    public $table = 'submission';
    protected $guarded = ['id'];

    public function logDocument()
    {
        return $this->belongsTo(LogDocument::class, 'log_id', 'id');
    }

    public function Dummy()
    {
        return $this->belongsTo(Dummy::class, 'doc_group', 'id');
    }

}
