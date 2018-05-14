<?php

namespace App\Handlers;

use Parsedown;


class MarkdownParseHandler
{

    private $parsedown;

    public function __construct()
    {

        if( !$this->parsedown ) {
            $this->parsedown = new Parsedown();
        }

        $this->parsedown->setSafeMode(true);
    }

    public function parser($markdown)
    {
        return $this->parsedown->text($markdown);
    }
}
