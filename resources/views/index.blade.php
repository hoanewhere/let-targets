@extends('layouts.target')

@section('content')
<div class="main-container">
    <aside class="aside p-4 m-1">
        <h2 class="mb-4">絞り込み</h2>
        <form action="">
            <p class="mb-1">キーワード</p>
                <input type="text" name="" id="" class="mb-4 form-control">
            <p class="mb-1">ユーザー</p>
            <select name="user" class="mb-4 custom-select">
                <option value="0">ONLY ME</option>
                <option value="1">>ALL</option>
            </select>
            <p class="mb-1">進捗</p>
            <select name="task" class="mb-4 custom-select">
                <option value="0">NOT YET</option>
                <option value="1">COMPLETE</option>
                <option value="2">>ALL</option>
            </select>
            <button type="submit" class="btn d-block">検索</button>
        </form>       
    </aside>
    <article class="main-article m-1">
        <div class="add-form p-4 mb-2">
            <form action="">
                <div class="form-row">
                    <div class="form-group col-8">
                        <label class="mb-1">新規目標</label>
                        <input type="text" name="" id="" class="form-control" placeholder="新規目標">
                    </div>
                    <div class="form-group col-4">
                        <label class="mb-1">完了予定日</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn d-block">追加</button>
            </form>
        </div>
        <div class="targets p-4">
            <h2 class="mb-2">目標一覧</h2>
            <div class="target m-2 p-2">
                <div class="target-top p-2">
                    <p>ユーザー名</p>
                    <p>YYYY/MM/DD</p>
                </div>
                <div class="target-main">
                    <i class="fas fa-check p-2"></i>
                    <input type="text" name="" id="" class="form-control">
                    <i class="far fa-trash-alt p-2"></i>
                </div>
            </div>
            <div class="target m-2 p-2">
                <div class="target-top p-2">
                    <p>ユーザー名</p>
                    <p>YYYY/MM/DD</p>
                </div>
                <div class="target-main">
                    <i class="fas fa-check p-2"></i>
                    <input type="text" name="" id="" class="form-control">
                    <i class="far fa-trash-alt p-2"></i>
                </div>
            </div>
            <div class="target m-2 p-2">
                <div class="target-top p-2">
                    <p>ユーザー名</p>
                    <p>YYYY/MM/DD</p>
                </div>
                <div class="target-main">
                    <i class="fas fa-check p-2"></i>
                    <input type="text" name="" id="" class="form-control">
                    <i class="far fa-trash-alt p-2"></i>
                </div>
            </div>
            <div class="target m-2 p-2">
                <div class="target-top p-2">
                    <p>ユーザー名</p>
                    <p>YYYY/MM/DD</p>
                </div>
                <div class="target-main">
                    <i class="fas fa-check p-2"></i>
                    <input type="text" name="" id="" class="form-control">
                    <i class="far fa-trash-alt p-2"></i>
                </div>
            </div>
            <div class="target m-2 p-2">
                <div class="target-top p-2">
                    <p>ユーザー名</p>
                    <p>YYYY/MM/DD</p>
                </div>
                <div class="target-main">
                    <i class="fas fa-check p-2"></i>
                    <input type="text" name="" id="" class="form-control">
                    <i class="far fa-trash-alt p-2"></i>
                </div>
            </div>
            <div class="target m-2 p-2">
                <div class="target-top p-2">
                    <p>ユーザー名</p>
                    <p>YYYY/MM/DD</p>
                </div>
                <div class="target-main">
                    <i class="fas fa-check p-2"></i>
                    <input type="text" name="" id="" class="form-control">
                    <i class="far fa-trash-alt p-2"></i>
                </div>
            </div>
            <div class="target m-2 p-2">
                <div class="target-top p-2">
                    <p>ユーザー名</p>
                    <p>YYYY/MM/DD</p>
                </div>
                <div class="target-main">
                    <i class="fas fa-check p-2"></i>
                    <input type="text" name="" id="" class="form-control">
                    <i class="far fa-trash-alt p-2"></i>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection
