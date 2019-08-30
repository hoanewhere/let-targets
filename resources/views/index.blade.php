@extends('layouts.target')

@section('content')
<div class="main-container" id="index">
    <aside class="aside p-4 m-1">
        <h2 class="mb-4">{{ __('Search') }}</h2>
        <form>
            @csrf
            <p class="mb-1">{{ __('Keyword') }}</p>
                <input type="text" name="keyword" id="keyword" class="mb-4 form-control" v-model="search_target" placeholder="検索キーワード" value="@isset ($getRequest['keyword']){{$getRequest['keyword']}}@endisset">
            <p class="mb-1">{{ __('User') }}</p>
            <select name="user" class="mb-4 custom-select" v-model="search_user">
                <option :value="0">{{ __('All') }}</option>
                <option :value="1">{{ __('Only Me') }}</option>
            </select>
            <p class="mb-1">{{ __('State') }}</p>
            <select name="state" class="mb-4 custom-select" v-model="search_state">
                <option :value="0">{{ __('Not Yet') }}</option>
                <option :value="1">{{ __('Complete') }}</option>
                <option :value="2">{{ __('All State') }}</option>
            </select>
            <button type="button" v-on:click="searchTarget" class="btn d-block">{{ __('Search') }}</button>
        </form>
    </aside>
    <article class="main-article m-1">
        <div class="add-form p-4 mb-2">
            <form>
                @csrf
                <div class="form-row">
                    <div class="form-group col-8">
                        <label class="mb-1">{{ __('New Target') }}</label>
                        <input type="text" name="target" id="target" v-model="new_target" class="form-control @error('target') is-invalid @enderror" placeholder="{{ __('New Target') }}">
                        @error('target')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="mb-1">{{ __('Completion Date') }}</label>
                        <input type="date" name="completion_date" id="completion_date" v-model="new_date" class="form-control @error('completion_date') is-invalid @enderror">
                        @error('completion_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="button" v-on:click="addTarget" class="btn d-block">{{ __('Add') }}</button>
            </form>
        </div>
        <div class="targets p-4">
            <h2 class="mb-2">{{ __('Targets') }}</h2>
                <div class="target m-2 p-2"
                    v-for="target in targets"
                    :key="target.id"
                    :class="{completed: target.state}"
                    v-if="target.delete_flg == false">
                    <div class="target-top p-2">
                        <p>@{{ target.user.name }}</p>
                        <p>@{{ target.completion_date }}</p>
                    </div>
                    <div class="target-main">
                        <a v-if="target.state != true" v-on:click="complete(target, $event)" href="" :class="{select_none: userJudge(target)}"><i class="far fa-square p-2"></i></a>
                        <a v-else v-on:click="notComplete(target, $event)" href="" :class="{select_none: userJudge(target)}"><i class="far fa-check-square p-2"></i></a>
                        <input type="text" name="edit" id="edit" class="form-control" :readonly="userJudge(target)" v-model="target.target" @keyup.enter="editTarget(target)">
                        <a v-on:click="deleteTarget(target, $event)"　href="" :class="{select_none: userJudge(target)}"><i class="far fa-trash-alt p-2"></i></a>
                    </div>
                </div>
        </div>
    </article>
</div>
@endsection
