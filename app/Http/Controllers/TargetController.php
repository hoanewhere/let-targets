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

    public function complete($id) {
        Log::debug('complete処理呼び出し');
        if(!ctype_digit($id)) {
            return redirect('index')->with('flash_message', __('Invalid operation was performed'));
        }

        $target = Target::find($id);
        $target->fill([
            'state' => true
        ]);
        $target->save();

        return redirect('/')->with('flash_message', __('Completed'));
    }

    public function notComplete($id) {
        Log::debug('notComplete処理呼び出し');
        if(!ctype_digit($id)) {
            return redirect('index')->with('flash_message', __('Invalid operation was performed'));
        }

        $target = Target::find($id);
        $target->fill([
            'state' => false
        ]);
        $target->save();

        return redirect('/')->with('flash_message', __('NotCompleted'));
    }

    public function delete($id) {
        Log::debug('delete処理呼び出し');
        if(!ctype_digit($id)) {
            return redirect('index')->with('flash_message', __('Invalid operation was performed'));
        }

        $target = Target::find($id);
        $target->fill([
            'delete_flg' => true
        ]);
        $target->save();

        return redirect('/')->with('flash_message', __('deleted'));
    }
}
