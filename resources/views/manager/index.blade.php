@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">{{--
                    <div class="card-header">
                        Controls
                    </div>--}}
                    <div class="card-body">
                        <a href="{{ route('articles.create') }}" class="btn btn-primary">📰 Create Article</a>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">📦 Create Category</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Articles</div>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            @foreach($articles as $article)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="{{ route('articles.show', $article) }}">
                                                {{ $article->title }}
                                            </a>
                                        </div>
                                        <div class="col-auto ml-auto">
                                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary btn-sm">
                                                edit
                                            </a>
                                            <form action="{{ route('articles.destroy', $article) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="m-3">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            {{ $category->name }}
                                        </div>
                                        <div class="col-auto ml-auto">
                                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-sm">
                                                edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop