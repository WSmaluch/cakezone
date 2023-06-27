<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $models = Products::where("IsActive","=", true)->get();
        return view("Products.index", ["models" => $models]);
    }
    public function edit($id)
    {
        $model = Products::find($id);
        return view("Products.edit",["model" => $model]);
    }
    public function update($id, Request $request)
{
    $model = Products::find($id);

    // Definicja reguł walidacji
    $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        // Dodaj inne reguły walidacji dla innych pól
    ];

    // Komunikaty błędów
    $messages = [
        'name.required' => 'Please enter the product name.',
        'description.required' => 'Please enter the product description.',
        'price.required' => 'Please enter the product price.',
        'price.numeric' => 'The product price must be a numeric value.',
        'price.min' => 'The product price must be at least 0.',
        // Dodaj inne komunikaty błędów dla poszczególnych pól
    ];

    // Walidacja danych
    $validator = Validator::make($request->all(), $rules, $messages);

    // Sprawdzenie czy walidacja się powiodła
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Przypisanie wartości do modelu
    $model->name = $request->input("name");
    $model->description = $request->input("description");
    $model->price = $request->input("price");
    // Dodaj inne przypisania pól

    $model->created_at = $request->input("created_at");
    $model->updated_at = $request->input("updated_at");
    $model->photo = $request->input("photo");
    // $model->IsActive = $request->input("IsActive") ? true : false;

    $model->save();

    return redirect("/Products");
}

    public function create()
    {
        $model = new Products();
        $model -> created_at = date("Y-m-d");
        return view("Products.create",["model" => $model]);
    }
    // public function addToDb(Request $request)
    // {
    //     $model = new Products();
    //     $model -> name = $request -> input("name");
    //     $model -> description = $request -> input("description");
    //     $model -> price = $request -> input("price");
    //     $model -> created_at = $request -> input("created_at");
    //     $model -> updated_at = $request -> input("updated_at");
    //     $model -> photo = $request -> input("photo");
    //     $model -> IsActive = true;
    //     $model -> save();
    //     return redirect("/Products");
    // }
    public function addToDb(Request $request)
{
    // Definicja reguł walidacji
    $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        // Dodaj inne reguły walidacji dla innych pól
    ];

    // Komunikaty błędów
    $messages = [
        'name.required' => 'Please enter the product name.',
        'description.required' => 'Please enter the product description.',
        'price.required' => 'Please enter the product price.',
        'price.numeric' => 'The product price must be a numeric value.',
        'price.min' => 'The product price must be at least 0.',
        // Dodaj inne komunikaty błędów dla poszczególnych pól
    ];

    // Walidacja danych
    $validator = Validator::make($request->all(), $rules, $messages);

    // Sprawdzenie czy walidacja się powiodła
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Zapisywanie danych produktu
    $model = new Products();
    $model->name = $request->input("name");
    $model->description = $request->input("description");
    $model->price = $request->input("price");
    // Dodaj inne przypisania pól

    $model->created_at = $request->input("created_at");
    $model->updated_at = $request->input("updated_at");
    $model->photo = $request->input("photo");
    $model->IsActive = true;

    $model->save();

    return redirect("/Products");
}


    public function delete($id)
    {
        $model = Products::find($id);
        $model -> IsActive = false;
        $model -> save();
        return redirect("/Products");
    }
}
