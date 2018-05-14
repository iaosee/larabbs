<?php

namespace App\Observers;

use App\Handlers\MarkdownParseHandler;
use App\Handlers\SlugTranslateHandler;
use App\Models\Topic;
use Auth;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->user_id = Auth::id();
        $topic->excerpt = make_excerpt($topic->body);
        $topic->body_parsed = app(MarkdownParseHandler::class)->parser($topic->body);

        if ( !$topic->slug) {
            $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
        }
    }

    public function creating(Topic $topic)
    {

    }

    public function updating(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);
        $topic->body_parsed = app(MarkdownParseHandler::class)->parser($topic->body);
    }
}