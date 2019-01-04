@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('articles.store') }}" method="post">
            @csrf
            @method('post')
            <div class="card">
                <div class="card-header">Create new article</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Short description</label>
                        <input name="short_description" class="form-control" value="{{ old('short_description') }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Create</button>
                </div>
            </div>
        </form>
    </div>
@stop
