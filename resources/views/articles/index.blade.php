@extends('layouts.app')

@section('content')
    <div class="row mx-auto">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body p-0">
                    <ul class="list-group">
                        <a href="/">
                            <li class="list-group-item">
                                🔅 All
                            </li>
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('home', ['category' => $category->id]) }}">
                                <li class="list-group-item">
                                    {{ $category->name }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="col-md-12">
                @forelse($articles as $article)
                    <div class="card mb-2">
                        <div class="card-header">
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </div>
                        <div class="card-body">
                            {{ $article->short_description }}
                            <p class="card-text small float-right">
                                {{ $article->created_at }}
                            </p>
                        </div>
                    </div>
                @empty
                    List of empty
                @endforelse
            </div>
            {{ $articles->links() }}
        </div>
    </div>
@stop
