<?php

namespace App\Models;

use App\Models\Dummy;
use App\Models\Document;
use App\Models\Submission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'review',
        'reviewer_id',
        'dummy_id',
        'document_id'
    ];

    public function Dummy()
    {
        return $this->belongsTo(Dummy::class, 'dummy_id');
    }

    public function Document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
