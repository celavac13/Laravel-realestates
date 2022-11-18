<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realestate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'city_id',
        'title',
        'description',
        'image',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function city()
    {
        $this->belongsTo(City::class);
    }

    public function favouritedBy()
    {
        return $this->belongsToMany(User::class);
    }
}
