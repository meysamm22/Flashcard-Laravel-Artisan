<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    protected $fillable = [
      'question', 'answer'
    ];
}
