<?php

namespace App\Http\Controllers\Ingredient;

use App\Unit;
use App\Stock;
use Carbon\Carbon;
use App\Ingredient;
use App\IngredientCategory;
use Illuminate\Http\Request;
use App\IngredientSubCategory;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{
    public function addIngredientCategory()
    {
        $ingredient_category = IngredientCategory::all();
        return view('admin.ingredientCategory.addIngredientCategory')->with('ingredientCategories', $ingredient_category);
    }
    public function postIngredientCategory(Request $request)
    {
    //    saving into Ingridient category table
        IngredientCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->back();
    }

    public function addIngredientSubCategory()
    {
        $ingredient_subcategory = IngredientSubCategory::all();
       
        return view('admin.ingredientSubCategory.IngredientSubCategories')->with('ingredientSubCategories', $ingredient_subcategory);
    }
    public function postIngredientSubCategory(Request $request)
    {
        if ($request->image != null) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/IngredientSubCategory'), $imageName);
            $img_url = '/images/IngredientSubCategory/' . $imageName;
            IngredientSubCategory::create([
                'name' => $request->name,
                'image' => $img_url,
                'description' => $request->description,
                'ingredient_category_id' => $request->category
            ]);
        } else {
            return redirect()->back();
        }

        return redirect()->back();
    }

    // deleteing
    public function deleteIngredientCategory($id)
    {
        IngredientCategory::where('id', $id)->delete();
        return redirect()->back();
    }
    public function deleteIngredientSubCategory($id)
    {
        IngredientSubCategory::where('id', $id)->delete();
        return redirect()->back();
    }
    // editing
    public function editIngredientCategory($id)
    {
        $ic = IngredientCategory::where('id', $id)->first();
        return view('admin.ingredientCategory.editIngredientCategory')->with('ingredientCategory' , $ic);
    }
    public function editIngredientCategoryPost(Request $request)
    {
        \App\IngredientCategory::where('id',$request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('/add_ingredient_category');
    }

    public function editIngredientSubCategory($id)
    {
        $isc = IngredientSubCategory::where('id', $id)->first();
        return view('admin.ingredientSubCategory.editIngredientSubCategory')->with('ingredientSubCategory',$isc);
    }
    public function editIngredientSubCategoryPost(Request $request)
    {
        if ($request->image != null) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/IngredientSubCategory'), $imageName);
            $img_url = '/images/IngredientSubCategory/' . $imageName;

            IngredientSubCategory::where('id',$request->id)->update([
                'name' => $request->name,
                'image' => $img_url,
                'description' => $request->description,
                'ingredient_category_id' => $request->category
            ]);
        } 
        
        else {
            IngredientSubCategory::where('id',$request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'ingredient_category_id' => $request->category
            ]);
        }

        return redirect('/add_ingredient_subcategory');
    }

    // ingredients
    public function ingredients(){
        
        return view('admin.ingredient.ingredients');
    }
    public function postIngredient(Request $request)
    {
       
        Ingredient::create([
            'name'=>$request->name,
            'ingredient_category_id'=>$request->category,
            'ingredient_subcategory_id'=>$request->subcategory,
            'batchwise_stock_management'=>$request->stock_management,
        ]);
        return redirect('/ingredients');
    }

    public function stock($id){
        $ingredient = \App\Ingredient::where('id',$id)->first();
       
        return view('admin.ingredient.stocks')->with(['ingredient'=>$ingredient]);
    }

    public function StockPost(Request $request, $ingredient_id)
    {

        $ingram = Unit::where('id',$request->unit_id)->first()->in_gram;
       
        Stock::create([
         'amount'=>(double)$ingram * (double)$request->amount,
         'ingredient_id'=>$ingredient_id,
         'expire_date'=>$request->expire_date,
         'manufacture_date'=>$request->manufacture_date,
         'entry_date'=>Carbon::now()->format('d-m-y'),
         'cost_per_unit'=>doubleval($request->total_cost) / doubleval($ingram),
         'remaining'=>(double)$ingram * (double)$request->amount,
         'alert_qty'=>$request->alert_qty,
         'batch_no' =>$request->batch_no,
        ]);
        $ingredient = Ingredient::where('id',$ingredient_id)->first();
         //dd($ingredient->unit->name);
         $stock = Stock::where('ingredient_id',$ingredient_id)->get();
         return redirect('/stock_entry/'.$ingredient_id);
     }


    // unit
    public function createIngredientUnitForm()
    {     
        $ingredient_units =Unit::all();
        return view('admin.Unit.units')->with([
            'ingredient_units' => $ingredient_units,
        ]);
    }

    public function createIngredientUnit(Request $request)
    {
        Unit::create([
            'name' =>$request->name,
            'short_name' =>$request->short_name,
            'in_gram'=>$request->gram,
        ]);
        return redirect()->back();
    }

    public function editunit(Request $re, $id)
    {
        $edit = unit::where('id', $id)->first();
        // dd($edit);
        return view('admin.Unit.updateunit')->with('edit', $edit);
    }

    public function punit(Request $ob, $id)
    {
            
         Unit::where("id", $id)->update([
            'name' => $ob->full_name,
            'short_name' => $ob->short_name,
            'in_gram' => $ob->in_gram,
        ]);
        return redirect('/units');
    }

    public function deleteunit($id)
    {
        Unit::where("id", $id)->delete();
        return redirect('/units');
    }
    
}
