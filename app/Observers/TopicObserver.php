<?php

namespace App\Observers;

use App\Handlers\MarkdownParseHandler;
use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
use App\Models\Topic;
use Auth;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {

    }

    public function updating(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);
        $topic->body_parsed = app(MarkdownParseHandler::class)->parser($topic->body);
    }

    public function saving(Topic $topic)
    {
        // $topic->body = clean($topic->body, 'user_topic_body');

        $topic->user_id = Auth::id();
        $topic->excerpt = make_excerpt($topic->body);
        $topic->body_parsed = app(MarkdownParseHandler::class)->parser($topic->body);
    }

    public function saved(Topic $topic)
    {
        //  保存数据库之后再操作
        if ( !$topic->slug) {
            // $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);

            // 取消直接调用, 使用队列完成
            dispatch(new TranslateSlug($topic));
        }
    }
}