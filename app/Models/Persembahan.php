<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persembahan extends Model
{
    use HasFactory;

    protected $table = 'persembahan';
    protected $guarded = [];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
