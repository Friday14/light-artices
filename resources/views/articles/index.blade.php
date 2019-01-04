@extends('app')

@section('content')
    @foreach($articles as $article)
        <div class="col-md-12">
            <div class="card">
                <div class="card-title">
                    {{ $article->title }}
                </div>
                <div class="card-body">
                    {{ $article->description }}
                </div>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@stop