<?php

namespace App\Http\Controllers;

use App\Hint;
use Illuminate\Http\Request;
use App\Http\Requests\CreateHintRequest;

class HintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHintRequest $request)
    {
        $request->storeHint();
        session()->flash('success', 'Hint Created Successfully');
        return redirect()->route('hints.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hint  $hint
     * @return \Illuminate\Http\Response
     */
    public function show(Hint $hint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hint  $hint
     * @return \Illuminate\Http\Response
     */
    public function edit(Hint $hint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hint  $hint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hint $hint)
    {
        $input = $request->only('hint', 'description');
        $hint->fill($input)->save();

        session()->flash('success', "Hint Updated Successfully");
        return redirect()->route('hints.show', ['hint', $hint->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hint  $hint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hint $hint)
    {
        //
    }
}
