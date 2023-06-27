<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function validateData(Request $request)
    {
        if ($request->input("property") == "Title") {
            if ($request->input("value") == "Wydarzenie") {
                return response()->json(["error" => "Nie możesz użyć tytułu Wydarzenie"]);
            } else {
                return response()->json(["error" => ""]);
            }
        } else {
            return response()->json(["error" => ""]);
        }
    }
}
