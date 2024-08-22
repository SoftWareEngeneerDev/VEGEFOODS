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
        $categories = Category::get();

        return view('admin.categorie')->with('categories', $categories);
    }

    public function edit_categorie($id)
    {
        $categories = Category::find($id);
        return view('admin.edit_categorie')->with('categories', $categories);
    }

    public function sauvermodifcategorie(Request $request)
    {
        $categorie = new Category();
        $categorie->Category_name = $request->input('categorie_name');
        $categorie->save();

        return view('admin.edit_categorie')->with('status', 'La categorie' . $categorie->Category_name . '
        a été modifié avec succès');
    }
}
