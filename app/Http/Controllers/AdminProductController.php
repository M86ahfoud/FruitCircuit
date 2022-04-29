<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminProduit.index', [
            'produits' => Product::all(),
            'i' => '1',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminProduit.create', [
            'categories' => Category::all()->sortBy('name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // valider le formulaire 

        request()->validate([
            'nom' => 'required|min:3',
            'description' => 'required|min:10',
            // 'prix' => 'required|regex:/(^99|[1-9][0-9][0-9]|1000)+$/i',
            'slug' => 'unique:products,slug',
            'image' => 'required',
            'category' => 'exists:categories,id',
        ]);

        $image = request('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        //ajouter un produit dans la BDD;

         Product::create([
            'nom' => request ('nom'),
            'description' => request ('description'),
            'prix' => request ('prix'),
            'slug' => Str::snake(request('nom')),
            'image' =>'/images/'.$new_name,
            'promotion' => request ('promotion'), 
            'category_id' => request('category'),
        ]);

        //'image' =>'/storage/'.request ('image')->store('images', 'public'),

        return redirect('/Admin/Produit/creer')->with('status', 'Le produit a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $produit)
    {
        return view('AdminProduit.edit', [

            'produit' => $produit,
            'categories' => Category::all()->sortBy('name'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $produit)
    {
        $image_name = request('hidden_image');
        $image = request('image');
       

        // modifier un produit
        if($image != '') {

            request()->validate([
                
                'nom' => 'required|min:3',
                'description' => 'required|min:10',
              // 'prix' => 'required|regex:/(^99|[1-9][0-9][0-9]|1000)+$/i',
              
                'image' => 'image|min:2048',
                'category' => 'exists:categories,id',
            ]);
            $image_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }else {
            request()->validate([
                
                'nom' => 'required|min:3',
                'description' => 'required|min:10',
              // 'prix' => 'required|regex:/(^99|[1-9][0-9][0-9]|1000)+$/i',
                'category' => 'exists:categories,id',
            ]);
        }
        //modifierun produit dans la BDD;
       
        $produit->update([
            'nom' => request ('nom'),
            'description' => request ('description'),
            'prix' => request ('prix'),
            'slug' => Str::snake(request('nom')),
            'image' => $image_name,
            'promotion' => request ('promotion'), 
            'category_id' => request('category'),
        ]);
       
        return redirect('Admin/Produit')->with('status', 'Le produit'.$produit->nom.'a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $produit)
    {
        $produit->delete();

        return redirect('Admin/Produit')->with('status', 'Le'.$produit->nom.'a bien été supprimé.');
    }
}
