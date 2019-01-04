@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            @method('post')
            <div class="card">
                <div class="card-header">Create category</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
@stop
