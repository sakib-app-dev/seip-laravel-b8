<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    // use HasFactory;
    protected $guarded=[];


    public function uploadededBy()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }


    public function imageable()
    {
        return $this->morphTo();
    }
    
}
