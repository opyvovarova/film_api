<?php

namespace App\Models;
use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actors';

    protected $fillable = [
        'name'
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
