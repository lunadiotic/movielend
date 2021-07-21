<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['getMovie']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Movie::query();
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('movie.show', $model->id),
                        'url_edit' => route('movie.edit', $model->id),
                        'url_destroy' => route('movie.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.movie.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Movie();
        return view('pages.movie.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'genre' => 'required',
            'released' => 'required',
        ]);
        return Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Movie::findOrFail($id);
        return view('pages.movie.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Movie::findOrFail($id);
        return view('pages.movie.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Movie::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'genre' => 'required',
            'released' => 'required'
        ]);
        $data->update($request->all());

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Movie::destroy($id);
    }


    public function getMovie(Request $request)
    {
        $data = [];
        if ($request->has('search')) {
            $search = $request->search;
            $data = Movie::select("id", "title")
                ->where('title', 'LIKE', "%{$search}%")
                ->get();
        }
        return response()->json($data);
    }
}
