@extends('layouts.app')
@section('title', isset($category) ? $category->name : '话题列表')


@section('content')
<section>
    <div class="row">
        <div class="col-md-9">
            @if (isset($category))
                <div class="alert alert-info" role="alert">
                    {{ $category->name }} ：{{ $category->description }}
                </div>
            @endif
            @include('topics._topic_list', ['topics' => $topics])
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection