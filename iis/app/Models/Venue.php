<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','street','street_number','zip_code','province','country','logo'];

    public function events()
    {
        return $this->hasMany(Event::class, 'venue_id');
    }
}
