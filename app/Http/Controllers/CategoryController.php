<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function ajouterCategorie()
    {
        return view('admin.ajouterCategorie');
    }

    public function sauvercategorie(Request $request)
    {
        $this->validate($request, ['category_name' => 'required']);

        $categories = new Category();
        $categories->Category_name = $request->input('category_name');
        $categories->save();
        return redirect('/ajoutercategorie')->with('status', 'La catégories ' . $categories->Category_name . ' a été 
        ajouté avec succès');
    }

    public function categorie()
    {
        return view('admin.categorie');
    }
}
