<?php

namespace App\Http\Controllers;

use App\Movie;

class MoviesController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {
        return view('projects.create', [
            'projects' => Movie::all()
        ]);
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
//        $this->validate(request(), [
//            'name' => 'required',
//            "description" => 'required'
//        ]);

//        $movie = new Movie;

//        Movie::forceCreate([
//            'name' => request('name'),
//            'description' => request('description')
//        ]);

        return ['message' => 'Title:'.request('title')];
    }
}
