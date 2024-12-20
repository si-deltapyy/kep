<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class LogDocument extends Model
{
    use HasFactory, HasRoles;
    public $table = 'log_document';
    protected $guarded = ['id'];

    public function doc_id()
    {
        return $this->hasMany(Document::class, 'id');
    }

    public function submission()
    {
        return $this->hasMany(Document::class, 'log_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
