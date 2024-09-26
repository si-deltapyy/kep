<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuan extends Model
{
    use HasFactory;
    public $table = 'document';
    protected $guarded = ['id'];

    public function document()
    {
        return $this->belongsTo(Document::class, 'doc_group');
    }
}
