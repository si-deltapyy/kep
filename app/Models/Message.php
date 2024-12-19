<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $table = 'message';
    protected $guarded = ['id'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submissions_id', 'id');
    }

    public function docGroup()
    {
        return $this->belongsTo(Dummy::class, 'doc_group', 'id');  
    }
}
