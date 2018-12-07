<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authors.index', ['authors' => Author::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors/create');
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
        Author::create([
            'name'    => $request->name,
            'surname' => $request->surname,
        ]);

        return redirect(route('authors.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author $author
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author $author
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Author              $author
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author->name = $request->name;
        $author->surname = $request->surname;
        $author->save();
        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author $author
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect(route('authors.index'));
    }
}
