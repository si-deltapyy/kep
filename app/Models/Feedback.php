<?php

namespace App\Models;

use App\Models\Dummy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'sender_role',
        'receiver_role',
        'message',
        'is_read',
        'reviewer_id',
        'dummy_id',
        'document_id'
    ];

    public function Sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function Receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function Dummy()
    {
        return $this->belongsTo(Dummy::class, 'dummy_id');
    }

    public function Document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }


}
