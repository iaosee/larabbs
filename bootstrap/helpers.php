<?php


/*
    This is helper file
*/


function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

