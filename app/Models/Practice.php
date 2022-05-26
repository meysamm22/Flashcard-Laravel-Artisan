<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = ['flashcard_id', 'user_id', 'user_answer', 'status' ];

    public function flashcard(){
        return $this->belongsTo('App\Models\Flashcard');
    }
}
