<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flashcard extends Model
{
    protected $fillable = [
      'question', 'answer'
    ];

    public function practices(): HasMany
    {
        return $this->hasMany('App\Models\Practice');
    }
}
