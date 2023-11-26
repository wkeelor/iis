<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceType extends Model
{
    use HasFactory;
    protected $fillable = ['event_id','price','name', 'default'];

    // Define the relationship to the evet (Event)

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
