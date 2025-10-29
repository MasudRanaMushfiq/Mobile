<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){
    // Check if a search query is present
    if ($request->has('search')) {
        $search = $request->search;

        $books = Book::where('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->paginate(10);
    } else {
        $books = Book::paginate(10);
    }

    // Pass books data to view
    return view('books.index')->with('books', $books);
    }


    public function show($id){
        $book = Book::find($id);
        return view('books.show')->with('book', $book);
    }


    public function create(){
        return view('books.create');
    }

    public function store(Request $request){

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|max:13',
            'stock' => 'required|integer',
            'price' => 'required|integer'
        ];

        $request->validate($rules);


        $book = Book::create($request->all());
        return  redirect()->route('books.show', $book->id);
    }

    public function destroy(Request $request, $id){
            
            $book = Book::find($id);
            $book->delete();
            return redirect()->route('books.index');
        }

        public function edit($id){
            $book = Book::find($id);
            return view('books.edit')
                ->with('book', $book);
        }
        public function update(Request $request)
        {
            $rules = [
                'title' => 'required',
                'author' => 'required',
                'isbn' => 'required|max:13',
                'stock' => 'required|integer|max:5000',
                'price' => 'required|integer'
            ];

            $request->validate($rules);

            $book = Book::findOrFail($request->id);
            $book->update($request->only(['title', 'author', 'isbn', 'stock', 'price']));

            return redirect()->route('books.show', $book->id);
        }


}
