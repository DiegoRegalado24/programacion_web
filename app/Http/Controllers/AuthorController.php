<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index',compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        Author::create($request->all());
        return redirect()->route('authors.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(String $id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit',compact('author'));
        }
        
        public function update(Request $request, String $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return redirect()->route('authors.index');
    }

    public function destroy(String $id)
    {
        Author::destroy($id);
        return redirect()->route('authors.index');
    }
}
