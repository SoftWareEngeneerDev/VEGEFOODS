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
        $this->validate($request, ['category_name' => 'required|unique:categories']);

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
        $this->validate($request, ['category_name' => 'required|unique:categories']);

        $categorie = Category::find($request->input('id'));

        $categorie->Category_name = $request->input('category_name');

        $categorie->update();

        return redirect('/categorie')->with('status', 'La categorie' . $categorie->Category_name . '
        a été modifié avec succès');
    }

    public function supprimercategorie($id)
    {

        $categorie = Category::find($id);

        $categorie->delete();

        return redirect('/categorie')->with('status', 'La categorie ' . $categorie->Category_name . '
        a été supprimé avec succès');
    }
}