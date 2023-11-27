<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'event_id', 'price','amount', 'paid', 'enabled'];

    // Define the relationship to the host (User)

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Define the relationship to the host (User)
    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
