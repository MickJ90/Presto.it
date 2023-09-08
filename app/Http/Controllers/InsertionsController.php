<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Insertions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsertionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insertions = Insertions::where('is_accepted', true)->get()->sortByDesc('created_at');
        return view('insertions.index', compact('insertions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view('insertions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function searchInsertions(Request $request)
    {
        $insertions = Insertions::search($request->searched)->where('is_accepted', true)->paginate(16);
        return view('insertions.index', compact('insertions'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Insertions $insertion)
    {
        $categories = \App\Models\Category::all();
        return view('insertions.show', compact('insertion','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(insertions $insertion)
    {
        
       // $images = \App\Models\Image::search($insertion->searched);
 
    return view('insertions.edit', compact('insertion'/*, 'images'*/));
    }
    public function modifyInsertion(Request $request, insertions $insertions)
    {
        $categories = \App\Models\Category::all();
        $insertion = Insertions::search($request->searched)->where('is_accepted', true)->paginate(16);
        return view('categoryShow', compact('insertion','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, insertions $insertions)
    {
        $categories = \App\Models\Category::all();
        $insertion = Insertions::search($request->searched)->where('is_accepted', true)->paginate(16);
        return view('categoryShow', compact('insertion','categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(insertions $insertion)
    {   
        if (!Auth::user()->is_revisor && Auth::user()->id !== $insertion->user_id) {

            return redirect()->back()->with(['error' => __('ui.notpossibleToRemove')]);

        } else {

            $insertion->delete();

            return redirect()->route('insertions.create')->with(['success' => __('ui.succesfullyRemoved')]);
        }
    }
}
