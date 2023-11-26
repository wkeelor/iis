<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function edit_category(Request $request){
        $categ = Category::find($request->id);
        $request->validate([
            'name' => 'required',
            'parent' => []
        ]);
        $categ->name = $request['name'];
        $categ->parent_id = $request['parent'];
        $categ->save();
        return redirect('/categories');
    }

    public function add(Request $request){
        //dd($request->logo);
        $form_fields = $request->validate([
            'name' => 'required',
            'parent_id' => [],
            'approved' => []
        ]);

        $categ = Category::create($form_fields);
        $categ->save();
        return redirect('/categories');
    }

    public function approve(Category $categ){
        $categ->approved = true;
        $categ->save();
        return redirect()->back();
    }
    public function decline(Category $categ){
        $categ->approved = false;
        $categ->save();
        return redirect()->back();
    }

    public function index(){
        $declined =  Category::where('approved', false)->get();
        $awaiting =  Category::where('approved', null)->get();
        $approved =  Category::where('approved', true)->get();

        // Eager load the 'category' relationship
        $jsons = [$approved, $awaiting, $declined];
        Category::whereIn('id', collect($jsons)->flatten()->pluck('id'))->get();

        return view('categories.categories', [
            'jsons' => $jsons,
        ]);
    }

    public function allExceptSelf(Category $categ){
        $categories =  DB::table('categories')
            ->where('id', '!=', $categ->id)
            ->where('approved',true)
            ->select('id', 'name')
            ->get();
        return view('categories.edit_category',[
            'categories' => $categories,
            'categ'=>$categ
        ]);
    }

    public function new(){
        return view('categories.create_category',[
            'categories' => Category::all()
        ]);
    }

}
