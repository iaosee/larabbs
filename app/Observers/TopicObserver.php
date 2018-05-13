<?php

namespace App\Observers;

use App\Handlers\MarkdownParseHandler;
use App\Models\Topic;
use Auth;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        $topic->user_id = Auth::id();
        $topic->excerpt = make_excerpt($topic->body);
        $topic->body_parsed = MarkdownParseHandler::parser($topic->body);
    }

    public function updating(Topic $topic)
    {
        $topic->excerpt = make_excerpt($topic->body);
        $topic->body_parsed = MarkdownParseHandler::parser($topic->body);
    }
}