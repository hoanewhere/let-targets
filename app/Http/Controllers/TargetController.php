<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Target;


class TargetController extends Controller
{
    public function index()
    {
        $targets = Target::all();
        return view('index', compact('targets'));
    }

    public function add( Request $request ) {
        Log::debug('targets.add呼び出し');
        $request->validate([
            'target' => 'required|max:255|string',
            'completion_date' => 'required|date'
        ]);

        Log::debug('$request: '.$request);

        $user = Auth::user();
        $target = New Target();
        $target->fill([
            'target' => $request->target,
            'completion_date' => $request->completion_date,
            'user_id' => $user->id
        ]);
        $target->save();

        return redirect('/')->with('flash_message', __('Added'));
    }
}
