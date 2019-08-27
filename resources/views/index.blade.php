@extends('layouts.target')

@section('content')
<div class="main-container">
    <aside class="aside p-4 m-1">
        <h2 class="mb-4">{{ __('Search') }}</h2>
        <form action="">
            <p class="mb-1">{{ __('Keyword') }}</p>
                <input type="text" name="" id="" class="mb-4 form-control">
            <p class="mb-1">{{ __('User') }}</p>
            <select name="user" class="mb-4 custom-select">
                <option value="0">{{ __('Only Me') }}</option>
                <option value="1">>{{ __('All') }}</option>
            </select>
            <p class="mb-1">{{ __('State') }}</p>
            <select name="task" class="mb-4 custom-select">
                <option value="0">{{ __('Not Yet') }}</option>
                <option value="1">{{ __('Complete') }}</option>
                <option value="2">>{{ __('All') }}</option>
            </select>
            <button type="submit" class="btn d-block">{{ __('Search') }}</button>
        </form>       
    </aside>
    <article class="main-article m-1">
        <div class="add-form p-4 mb-2">
            <form action="{{route('target.add')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-8">
                        <label class="mb-1">{{ __('New Target') }}</label>
                        <input type="text" name="target" id="target" class="form-control @error('target') is-invalid @enderror" placeholder="{{ __('New Target') }}">
                        @error('target')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="mb-1">{{ __('Completion Date') }}</label>
                        <input type="date" name="completion_date" id="completion_date" class="form-control @error('completion_date') is-invalid @enderror">
                        @error('completion_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn d-block">{{ __('Add') }}</button>
            </form>
        </div>
        <div class="targets p-4">
            <h2 class="mb-2">{{ __('Targets') }}</h2>
            @foreach ( $targets as $target )
                <div class="target m-2 p-2">
                    <div class="target-top p-2">
                        <p>{{ $target->user->name }}</p>
                        <p>{{ $target->completion_date }}</p>
                    </div>
                    <div class="target-main">
                        <i class="fas fa-check p-2"></i>
                        <input type="text" name="" id="" class="form-control" value="{{ $target->target }}">
                        <i class="far fa-trash-alt p-2"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </article>
</div>
@endsection
