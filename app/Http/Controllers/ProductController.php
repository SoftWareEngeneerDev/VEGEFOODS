<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
// use App\Http\Controllers\validate;

class ProductController extends Controller
{
    //
    public function ajouterproduit()
    {
        $categorie = Category::ALL()->pluck('Category_name', 'Category_name');
        return view('admin.ajouterproduit')->with('categorie', $categorie);
    }

    public function sauverproduit(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required |unique:products',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('product_image')) {
            // Recupéreration du nom complet de l'image
            $fullNameWithExt = $request->file('product_image')->getClientOriginalName();

            // Recupéreration du nom  de l'image sans l'extension
            $ImageNameOnly = pathinfo($fullNameWithExt, PATHINFO_FILENAME);

            // Recupéreration de l'extension de l'image (.jpg)
            $ImgExt = $request->file('product_image')->getClientOriginalExtension();

            // Le modèle du nom à enregistrer dans la base de donné
            $ImageNametoStore = $ImageNameOnly . '_' . time() . '.' . $ImgExt;

            // Uploader l'image dans le dossier Public et crée le lien correspondant le nom de l'image dans la base de données
            $path = $request->file('product_image')->storeAs('public/Product_images', $ImageNametoStore);
        } else {
            $ImageNametoStore = 'noimage.jpg';
        }

        $produit = new Product();
        $produit->Product_name = $request->input('product_name');
        $produit->Product_price = $request->input('product_price');
        $produit->Product_category = $request->input('product_category');
        $produit->Product_image = $ImageNametoStore;
        $produit->status = 1;

        $produit->save();

        return redirect('/ajouterproduit')->with('status', 'Le produit ' . $produit->Product_name . ' a été
        ajouter avec succès');
    }

    public function produit()
    {
        $produits = Product::get();
        return view('admin.produit')->with('produits', $produits);
    }

    public function edit_produit($id)
    {
        $product = Product::find($id);

        $categorie = Category::ALL()->pluck('Category_name', 'Category_name');

        return view('admin.edit_produit')->with('product', $product)->with('categorie', $categorie);
        // return view('admin.html')->with('id', $id);
    }

    public function sauvermodifproduit(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required |unique:products',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_image' => 'image|nullable|max:1999'
        ]); // validation des champs


        $produit = Product::find($request->input('id'));
        $produit->Product_name = $request->input('product_name');
        $produit->Product_price = $request->input('product_price');
        $produit->Product_category = $request->input('product_category');
        //$produit->status = 1;
        //$produit->Product_image = $ImageNametoStore;
        if ($request->hasFile('product_image')) {
            // Recupéreration du nom complet de l'image
            $fullNameWithExt = $request->file('product_image')->getClientOriginalName();
            // Recupéreration du nom  de l'image sans l'extension
            $ImageNameOnly = pathinfo($fullNameWithExt, PATHINFO_FILENAME);
            // Recupéreration de l'extension de l'image (.jpg)
            $ImgExt = $request->file('product_image')->getClientOriginalExtension();
            // Le modèle du nom à enregistrer dans la base de donné
            $ImageNametoStore = $ImageNameOnly . '_' . time() . '.' . $ImgExt;
            // Uploader l'image dans le dossier Public et crée le lien correspondant le nom de l'image dans la base de données
            $path = $request->file('product_image')->storeAs('public/Product_images', $ImageNametoStore);

            if ($produit->Product_image != 'noimage.jpg') {
                Storage::delete('public/Product_images'.$produit->Product_image);

            $produit->Product_image=$ImageNametoStore;
        }

        $produit->update();

        return redirect('/ajouterproduit')->with('status', 'Le produit ' . $produit->Product_name . ' a été modifié
        avec succès');
    }

    public function supprimer_produit($id)
    {
        $produit = Product::find($id);
        $produit->delete();

        return redirect('/produit')->with('status', 'Le produit ' . $produit->Product_name . ' a été supprimé
        avec succès!');
    }
}
