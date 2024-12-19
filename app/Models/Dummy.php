<?php

namespace App\Models;

use App\Models\Pesan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dummy extends Model
{
    use HasFactory;
    public $table = 'dummy';
    protected $guarded = ['id'];

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'doc_group', 'doc_group');
    }

    public function Sekertaris()
    {
        return $this->belongsTo(User::class, 'sekertaris_id', 'id');
    }

    public function pesans()
{
    return $this->hasMany(Pesan::class);
}
}
