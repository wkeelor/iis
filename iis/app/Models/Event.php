<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','host_id','category_id','venue_id','price_category_id','start_time','end_time','capacity','logo'];

    // Define the relationship to the host (User)

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }
    // Define the relationship to the host (User)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Define the relationship to the host (User)
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
    //get event ratings
    public function ratings() {
        return $this->hasMany(Rating::class);
    }
    public function price_category()
    {
        return $this->belongsTo(PriceCategory::class, 'price_category_id');
    }

    public function averageRating() {
        return $this->ratings()->avg('rating');
    }

}
