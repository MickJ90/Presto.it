<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Insertions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\FuncCall;

class RevisorController extends Controller
{
    public function index()
    {
        $insertionToCheck = Insertions::where('is_accepted', null)->where('user_id','!=', Auth::id())->first();
        return view('revisor.index', compact('insertionToCheck'));
    }
    public function acceptInsertion(Insertions $insertion)
    {
        $insertion->setAccepted(true);
        return redirect()->back()->with('success', __('ui.insertionAccepted'));
    }
    public function rejectInsertion(Insertions $insertion)
    {
        $insertion->setAccepted(false);
        return redirect()->back()->with('error',  __('ui.insertionRejected'));
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('success', __('ui.revisorRequest'));
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('presto:make-user-revisor', ["email" => $user->email]);
        return redirect('/')->with('success',  __('ui.doneRevisor'));
    }

};
