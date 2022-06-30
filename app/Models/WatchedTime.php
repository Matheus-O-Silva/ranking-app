<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedTime extends Model
{
    use HasFactory;

    /**
     * Table of Model
     */
    protected $table = 'watched_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'channel_id',
        'minutes',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

}
