<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserEvent extends Model
{
    use HasFactory;
    protected $table = 'user_events';
    protected $fillable = [
        'event_name',
        'user_id',
        'event_date',
        'guest_names',
        'speaker_name',
        'status',
        'type',
        'location',
        'event_type',
        'description',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'id');
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'event_type');
    }
}
