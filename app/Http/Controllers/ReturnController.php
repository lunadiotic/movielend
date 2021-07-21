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
}
