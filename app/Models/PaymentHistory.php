<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $table = 'payment_history'; // Specify the table name

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'event_id',
        'type',
        'amount',
        'transaction_id',
        'event_status',
        'status',
        'payment_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userEvent()
    {
        return $this->belongsTo(UserEvent::class, 'event_id');
    }
}
