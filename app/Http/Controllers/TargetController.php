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
        return view('index');
    }

    public function firstSearch()
    {
        // TBD: 最初の検索条件が決まったらここも修正
        $targets = Target::with('user')->where('delete_flg', false)->get();
        Log::debug('$targets: '.$targets);
        return $targets;
    }

    public function getUser()
    {
        $user = Auth::user();
        Log::debug('$targets: '.$user);
        return $user;
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

        // データを追加
        $target->fill([
            'target' => $request->target,
            'completion_date' => $request->completion_date,
            'user_id' => $user->id
        ]);
        $target->save();

        // 更新後、表示する分のデータを取得
        // TBD: セッションに保存した検索条件でデータを取得する
        $targets = Target::where('delete_flg', false)->get();
        Log::debug('$targets: '.$targets);

        return $targets;
    }

    public function editTarget($id, $text) {
        Log::debug('edit処理呼び出し');
        if(!ctype_digit($id)) {
            return redirect('/')->with('flash_message', __('Invalid operation was performed'));
        }
        $target = Target::find($id);
        Log::debug('idからレコード検索');
        Log::debug('更新情報(target):' .$text);
        $target->fill([
            'target' => $text
        ]);
        Log::debug('該当レコードのtarget更新');
        $target->save();
        Log::debug('セーブ');

        return 0;
    }

    public function complete($id) {
        Log::debug('complete処理呼び出し');
        if(!ctype_digit($id)) {
            return redirect('/')->with('flash_message', __('Invalid operation was performed'));
        }

        $target = Target::find($id);
        $target->fill([
            'state' => true
        ]);
        $target->save();

        return 0;
    }

    public function notComplete($id) {
        Log::debug('notComplete処理呼び出し');
        if(!ctype_digit($id)) {
            return redirect('/')->with('flash_message', __('Invalid operation was performed'));
        }

        $target = Target::find($id);
        $target->fill([
            'state' => false
        ]);
        $target->save();

        return 0;
    }

    public function delete($id) {
        Log::debug('delete処理呼び出し');
        if(!ctype_digit($id)) {
            return redirect('/')->with('flash_message', __('Invalid operation was performed'));
        }

        $target = Target::find($id);
        $target->fill([
            'delete_flg' => true
        ]);
        $target->save();

        return 0;
    }

    public function search( Request $request ) {
        $request->validate([
            'keyword' => 'string|nullable|max:255',
            'user' => 'numeric',
            'state' => 'numeric',
        ]);

        $user = Auth::user();
        $getRequest = $request->all();
        $target = Target::query();

        if ( $request->keyword ) {
            $target->where('target', $request->keyword);
        }
        if ( !empty($user) && $request->user ) {
            $target->where('user_id', $request->user);
        }
        if ( $request->state != 2 ) {
            $target->where('state', $request->state);
        }
        $target->where('delete_flg', false);
        $targets = $target->get();

        Log::debug('$targets: '.$targets);
        Log::debug('$getRequest: '. print_r($getRequest, true));
        Log::debug('$getRequest->keyword: '. $getRequest['keyword']);
        return view('index', compact('targets', 'getRequest'));
    }
}
