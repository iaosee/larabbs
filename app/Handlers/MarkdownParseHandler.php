<?php

namespace App\Handlers;

use Parsedown;


class MarkdownParseHandler
{

    private static $parsedown;


    private static function initParsedown()
    {

        if( self::$parsedown ) {
            return;
        }

        self::$parsedown = new Parsedown();
        // self::$parsedown->setSafeMode(true);
    }

    public static function parser($markdown)
    {
        self::initParsedown();

        return self::$parsedown->text($markdown);
    }
}
