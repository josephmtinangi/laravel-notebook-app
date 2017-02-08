<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Notebook;

class NotebookController extends Controller
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
    public function index()
    {
        $notebooks = Auth::user()->notebooks()->with('notes')->latest()->get();
        return view('notebooks.index', compact('notebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $notebook = new Notebook;
        $notebook->name = $request->input('name');
        $notebook->slug = str_slug($request->input('name'), '-');
        $notebook->color = $request->input('color');
        $notebook->description = $request->input('description');

        $user->notebooks()->save($notebook);

        return redirect('notebooks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notebook = Notebook::whereUserId(Auth::user()->id)->whereId($id)->first();
        return view('notebooks.edit', compact('notebook'));
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
        $notebook = Notebook::whereUserId(Auth::user()->id)->whereId($id)->first();
        if ($notebook) {
            $notebook->name = $request->input('name');
            $notebook->slug = str_slug($request->input('name'), '-');
            $notebook->color = $request->input('color');
            $notebook->description = $request->input('description');

            $notebook->save();
        }

        return redirect('notebooks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notebook = Notebook::whereUserId(Auth::user()->id)->whereId($id)->first();

        $notebook->delete();

        return redirect('notebooks');
    }
}
