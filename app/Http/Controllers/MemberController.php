<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
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
            $model = Member::query();
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('member.show', $model->id),
                        'url_edit' => route('member.edit', $model->id),
                        'url_destroy' => route('member.destroy', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])->make(true);
        }

        return view('pages.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Member();
        return view('pages.member.form', compact('data'));
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
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'identity_number' => 'required|unique:members',
            'joined' => 'required',
            'is_active' => 'required'
        ]);
        return Member::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::findOrFail($id);
        return view('pages.member.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Member::findOrFail($id);
        return view('pages.member.form', compact('data'));
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
        $data = Member::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'identity_number' => 'required|unique:members,identity_number,' . $id,
            'joined' => 'required',
            'is_active' => 'required'
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
        return Member::destroy($id);
    }
}
