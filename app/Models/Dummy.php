<?php

namespace App\Models;

use App\Models\Pesan;
use App\Models\Document;
use App\Models\Feedback;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Dummy extends Model
{
    use HasFactory;
    public $table = 'dummy';
    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'user_id',
        'sekertaris_id',
        'doc_status',
        'doc_flag',
        'ec_proceed_at',
        'review_status',
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'doc_group', 'doc_group');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Sekertaris()
    {
        return $this->belongsTo(User::class, 'sekertaris_id', 'id');
    }

    public function pesans()
    {
        return $this->hasMany(Pesan::class, 'dummy_id');
    }

    public function Document()
    {
        return $this->hasMany(Document::class, 'doc_group');
    }

    public function firstDocument()
    {
        return $this->hasOne(Document::class, 'doc_group', 'id')->oldest('created_at');
    }

    public function Feedback()
    {
        return $this->hasMany(Feedback::class, 'dummy_id');
    }

    public function Payments()
    {
        return $this->hasMany(Payment::class);
    }


}
