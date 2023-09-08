<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Insertions;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $categories = \App\Models\Category::all();
        $insertions = \App\Models\Insertions::where('is_accepted', true)->take(6)->latest()->get();
        return view('home', compact('insertions', 'categories'));
    }

    public function categoryShow(Category $category)
    {
       $insertions = $category->insertions()->where('is_accepted', true)->get();
        return view('categoryShow', compact('category', 'insertions'));
    }
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
