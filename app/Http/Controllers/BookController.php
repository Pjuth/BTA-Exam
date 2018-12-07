<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request['author_id']) {
            return view('books/index', [
                'books'   => Book::with('author')->orderBy('title')->where('author_id',
                    $request['author_id'])->paginate(10),
                'authors' => Author::all(),
                'request' => $request,
            ]);
        } else {
            return view('books/index', [
                'books'   => Book::with('author')->orderBy('title')->paginate(10),
                'authors' => Author::all(),
                'request' => $request,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        return view('books/create', [
            'book'    => $book,
            'authors' => Author::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Book::create([
            'title'             => $request->title,
            'pages'             => $request->pages,
            'isbn'              => $request->isbn,
            'short_description' => $request->short_description,
            'author_id'         => $request->author_id,
        ]);

        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'book'    => $book,
            'authors' => Author::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Book                $book
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->isbn = $request->isbn;
        $book->short_description = $request->short_description;
        $book->author_id = $request->author_id;
        $book->save();

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book $book
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect(route('books.index'));
    }
}
