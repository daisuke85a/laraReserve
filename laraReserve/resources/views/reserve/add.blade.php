@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-2">
                    <form action="/reserve/create" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="kind" value="1">
                        <input type="hidden" name="lesson_id" value="{{$id}}">
                        <input type="submit" value="予約する" class="btn btn-primary btn-sm btn-dell">
                    </form>
                </div>

                <div class="col-2">
                    <form action="/reserve/create" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="kind" value="2">
                        <input type="hidden" name="lesson_id" value="{{$id}}">
                        <input type="submit" value="行けたら行く" class="btn btn-primary btn-sm btn-dell">
                    </form>
                </div>

                <div class="col-2">
                    <form action="/reserve/create" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="kind" value="3">
                        <input type="hidden" name="lesson_id" value="{{$id}}">
                        <input type="submit" value="いつか行ってみたい" class="btn btn-primary btn-sm btn-dell">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
