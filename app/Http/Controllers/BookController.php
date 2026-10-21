<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    //Consultar los datos y retornarlos
    public function index()
    {
        $books = Book::all();
        return view("books.index", compact("books"));
    }

    public function create(){
        $authors= Author::all();
        return view('books.create',compact('authors'));
    }

    public function store(Request $request)
    {
        $book = Book::create($request->except(['_token', 'authors']));
        if ($request->has('authors')) {
            $book->authors()->attach($request->authors);
        }
        return redirect()->route('books.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(String $id)
    {
        $book = Book::findOrFail($id);
        $authors=Author::all();
        return view('books.edit', compact('book','authors'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        $book->authors()->sync($request->authors ??[]);
        return redirect()->route('books.index');
    }

    public function destroy(String $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index');
    }
}
