<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;
use App\Handlers\MarkdownParseHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        //
    }

    public function created(Reply $reply)
    {
        // 创建回复，未读次数 +1
        $topic = $reply->topic;
        $topic->increment('reply_count', 1);

        $topic->user->notify(new TopicReplied($reply));
    }

    public function saving(Reply $reply)
    {
        $reply->content_parsed = app(MarkdownParseHandler::class)->parser($reply->content);
    }

    public function updating(Reply $reply)
    {
        $reply->content_parsed = app(MarkdownParseHandler::class)->parser($reply->content);        
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }
}