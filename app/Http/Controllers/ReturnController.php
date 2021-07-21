<?php

namespace App\Http\Controllers;

use App\Lending;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Lending::where('returned', '!=', null)->with(['member', 'movie']);
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('return.show', $model->id),
                        'url_edit' => route('return.edit', $model->id),
                        'url_destroy' => route('return.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.return.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Lending::findOrFail($id);
        return view('pages.return.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Lending::find($id);
        return view('pages.return.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Lending::findOrFail($id);
        $this->validate($request, [
            'returned' => 'required',
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
        return Lending::destroy($id);
    }
}
