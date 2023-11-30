<?php

namespace App\Http\Controllers;
use App\Models\PriceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PriceTypeController extends Controller
{
    public function create_type(Request $request){
        $form_fields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'event_id' => 'required'
        ]);
        $priceType = PriceType::create($form_fields);
        $priceType->save();
        return redirect()->back();
    }

    public function delete(int $id) {
        $type = PriceType::find($id);
        $type->delete();
        return redirect()->back()->with('message', 'Price type deleted');
    }

}
