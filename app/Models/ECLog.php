<?php

namespace App\Models;

use App\Models\ECDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ECLog extends Model
{
    use HasFactory;
    public $table = 'ec_logs';
    protected $fillable = ['ec_id', 'old_status', 'new_status', 'changed_at'];

    public function ECDocument()
    {
        return $this->belongsTo(ECDocument::class);
    }
}
