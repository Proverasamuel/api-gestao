<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Produto::with('categoria')->get();
        return response()->json($products);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'marca' => 'nullable|string|max:255',
        'referencia' => 'nullable|string|max:255',
        'categoria_id' => 'required|exists:categorias,id',
        'quantidade_total' => 'required|integer|min:0',
        'preco' => 'required|numeric|min:0',
        'icone' => 'nullable|string|max:255',
        'status' => 'required|string|in:ativo,inativo,esgotado',
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // Upload da imagem, se existir
    if ($request->hasFile('imagem')) {
        $path = $request->file('imagem')->store('produtos', 'public');
        $validated['imagem'] = $path;
    }

    $produto = Produto::create($validated);

    return response()->json([
        'message' => 'Produto criado com sucesso',
        'produto' => $produto
    ], 201);
}

}
