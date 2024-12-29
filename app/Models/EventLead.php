<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class EventLead extends Model
{
    use HasFactory;

    protected $table = 'event_leads';
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'description'
    ];
}
