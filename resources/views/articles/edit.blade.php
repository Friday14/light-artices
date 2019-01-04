@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('articles.update', $article) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">Edit article <strong>{{ $article->title }}</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $article->title }}">
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" class="form-control">
                            <option value="">Без категории</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Short description</label>
                        <input name="short_description" class="form-control" value="{{ $article->short_description }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"
                                  class="form-control"
                        >{{ $article->description }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
@stop
