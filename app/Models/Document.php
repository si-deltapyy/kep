<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Document extends Model
{
    use HasFactory, HasRoles;
    public $table = 'document';
    protected $guarded = ['id'];

    public function logDocument()
    {
        return $this->hasMany(LogDocument::class, 'doc_id');
    }
}
