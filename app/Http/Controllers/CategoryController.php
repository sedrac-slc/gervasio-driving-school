<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{

    public function panel($categories)
    {
        $panel = 'Categorias';
        return view('auth.category.index', compact('categories', 'panel'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate();
        return $this->panel($categories);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::where('name','like',"%{$search}%")
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try{
            Category::create($request->all());
            flash()->success('Categoria criado com successo');
            return redirect()->route('categories.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('auth.category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        try{
            $category = Category::find($id);
            $category->update($request->all());
            flash()->success('Categoria editado com successo');
            return redirect()->route('categories.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $category = Category::find($id);
            $category->delete();
            flash()->success('Categoria eliminado com successo');
            return redirect()->route('categories.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
