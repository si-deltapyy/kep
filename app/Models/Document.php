<?php

namespace App\Models;

use App\Models\Dummy;
use App\Models\Pesan;
use App\Models\Feedback;
use App\Models\AjuanType;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory, HasRoles;
    public $table = 'document';
    protected $fillable = [
        'user_id',
        'doc_name',
        'doc_path',
        'doc_type',
        'ajuan_type',
        'doc_group',
    ];
    protected $guarded = ['id'];

    public function logDocument()
    {
        return $this->hasMany(LogDocument::class, 'doc_id');
    }

    public function Pesan()
    {
        return $this->hasMany(Pesan::class, 'document_id');
    }

    public function Feedback()
    {
        return $this->hasMany(Feedback::class, 'document_id');
    }

    public function Dummy()
    {
        return $this->belongsTo(Dummy::class, 'doc_group', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'doc_group', 'id');
    }

    public function AjuanType()
    {
        return $this->belongsTo(AjuanType::class, 'ajuan_type', 'id');
    }

}
