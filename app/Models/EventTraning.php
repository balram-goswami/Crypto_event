<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventTraning extends Model
{
    use HasFactory;

    protected $table = 'event_traning';
    protected $fillable = [
        'title',
        'event_id',
        'video_type',
        'order_id',
    ];

    /**
     * Define relationships, if any.
     */
    public function event()
    {
        return $this->belongsTo(UserEvent::class, 'event_id');
    }
}
