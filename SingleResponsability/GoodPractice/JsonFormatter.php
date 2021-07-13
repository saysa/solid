<?php


class JsonFormatter
{
    public static function format(array $items)
    {
        return json_encode($items);
    }
}
