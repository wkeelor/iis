<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','host_id','category_id','venue_id','start_time','end_time','capacity'];

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

    public function load_by_id($id){
        return self::find($id);
    }

}
