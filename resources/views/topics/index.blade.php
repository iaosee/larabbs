@extends('layouts.app')
@section('title', isset($category) ? $category->name : '话题列表')


@section('content')
<section>
    <div class="row">
        <div class="col-md-9">
            <div class="topic-wrap">
                @if( isset($category) )
                <div>
                    <button class="btn btn-info pull-left category-button" title="{{ $category->description }}">{{ $category->name }}</button>
                </div>
                @else
                <div>
                    <button class="btn btn-info pull-left category-button">所有话题</button>
                </div>
                @endif
                <div class="clearfix">
                    <div class="btn-group pull-right" role="group">
                        <a href="{{ Request::url() }}?order=default" class="btn btn-light text-muted {{ active_class( !if_query('order', 'recent')) }}">最后回复</a>
                        <a href="{{ Request::url() }}?order=recent" class="btn btn-light text-muted {{ active_class(if_query('order', 'recent')) }}">最新发布</a>
                    </div>
                </div>

                @include('topics._topic_list', ['topics' => $topics])
            </div>
        </div>
        <div class="col-md-3">
            <aside class="aside">
                <div class="">
                    <a href="{{ route('topics.create') }}" class="btn btn-block btn-success"><i class="icon iconfont icon-survey1"></i>发布话题</a>
                </div>
                <!-- <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div> -->
            </aside>
        </div>
    </div>
</section>
@endsection