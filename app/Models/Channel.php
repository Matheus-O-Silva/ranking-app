<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name'
    ];

    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function WatchedTimes()
    {
        return $this->hasMany(WatchedTime::class);
    }
    

}
