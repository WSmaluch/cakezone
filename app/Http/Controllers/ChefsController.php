<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use Illuminate\Http\Request;

class ChefsController extends Controller
{
    public function index()
    {
        $models = Chefs::where("IsActive","=", true)->get();
        return view("Chefs.index", ["models" => $models]);
    }
    public function edit($id)
    {
        $model = Chefs::find($id);
        return view("Chefs.edit",["model" => $model]);
    }
    public function update($id, Request $request)
{
    // Walidacja danych
    $validatedData = $request->validate([
        'name' => 'required',
        'specialty' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $model = Chefs::find($id);
    $model->name = $validatedData['name'];
    $model->specialty = $validatedData['specialty'];

    // Zapisywanie pliku
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filePath = $file->store('img');
        $model->image = $filePath;
    }

    $model->save();

    return redirect("/Chefs");
}


    public function create()
    {
        $model = new Chefs();
        $model -> created_at = date("Y-m-d");

        return view("Chefs.create", ["model" => $model]);
    }
    // public function addToDb(Request $request)
    // {
    //     $model = new Chefs();
    //     $model -> name = $request -> input("name");
    //     $model -> specialty = $request -> input("specialty");
    //     $model -> image = $request -> input("image");
    //     $model -> created_at = $request -> input("created_at");
    //     $model -> updated_at = $request -> input("updated_at");
    //     $model -> IsActive = true;
    //     $model -> save();
    //     return redirect("/Chefs");
    // }
    public function addToDb(Request $request)
{
    // Walidacja danych
    $validatedData = $request->validate([
        'name' => 'required',
        'specialty' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Zapisywanie pliku
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filePath = $file->store('img');
    }

    // Zapisywanie danych kucharza
    $model = new Chefs();
    $model->name = $validatedData['name'];
    $model->specialty = $validatedData['specialty'];
    $model->image = $filePath; // Ścieżka do zapisanego pliku
    $model->created_at = $request->input("created_at");
    $model->updated_at = $request->input("updated_at");
    $model->IsActive = true;
    $model->save();

    // Przekierowanie po zapisaniu
    return redirect("/Chefs");
}

    public function delete($id)
    {
        $model = Chefs::find($id);
        $model -> IsActive = false;
        $model -> save();
        return redirect("/Chefs");
    }
    
}
