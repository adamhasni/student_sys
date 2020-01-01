<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Level;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $classes = Classes::all();

        //levels tu nama folder :index nama file blade
        return view('Classes.index', compact('classes', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('classes.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Classes::create($request->all());

        return redirect()->route('class.index')->with('success', 'Level has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $class)
    {
        // $hantarLevelName = Classes::pluck('level_name', 'id');

        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        $levels = Level::all();

        return view('classes.edit', compact('class', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        $class->update($request->all());

        return redirect()->route('class.index')->with('success','Level<b>'.$class->class_name.'</b> has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $class)
    {
        $class_name = $class->class_name;
        $class->delete();
        return redirect()->route('class.index')->with('success','Class<b>'.$class->class_name.'</b> has been deleted successfully');
    }
}
