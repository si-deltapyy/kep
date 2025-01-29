<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ECDocument extends Model
{
    use HasFactory;
    public $table = 'ec_document';
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'user_id',
        'doc_path',
        'doc_name',
        'doc_group',
        'ec_status',
        'ethical_number',
        'signed_at',
    ];


    public function Dummy()
    {
        return $this->belongsTo(Dummy::class, 'doc_group', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function logs()
    {
        return $this->hasMany(ECLog::class);
    }

}
