@extends('layouts.app')

@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title d-inline">
                    {{ $article->title }}
                </h3>
                Category:
                <span class="badge badge-info">
                    {{ $article->category->name ?? '-'}}
                </span>
                <hr>
                <p>
                    {{ $article->description }}
                </p>
            </div>
            <div class="card-footer">
                <div class="float-right">⌚ {{ $article->created_at }}</div>
            </div>
        </div>
    </div>
@stop
