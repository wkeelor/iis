<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'max:255'
        ]);

        $ratings = new Rating();

        $ratings->user_id = auth()->id();
        $ratings->event_id = $validatedData['event_id'];

        $ratings->rating = $validatedData['rating'];
        $ratings->message = $validatedData['review'];

        $ratings->save();

        return redirect()->back()->with('success', 'Rating submitted successfully.');
    }

   /* public function event_ratings(Event $event){
        $ratings = Rating::where('event_id',$event->id)->get();
        return view('reviews.reviews',[
            'ratings' => $ratings
        ]);
    }*/

    public function delete(Rating $rating) {
        $rating->delete();
        return redirect()->back()->with('message', 'Review deleted');
    }

    public function edit_show(Rating $rating){
        return view('reviews.edit',[
            'rating' => $rating
        ]);
    }

    public function edit(Request $request){
        $rating = Rating::find($request->id);
        $rating->message = $request->message;
        $rating->rating = $request->rating;
        $rating->save();
        return redirect()->route('event_detail', ['event' => $rating->event_id]);
    }
}
