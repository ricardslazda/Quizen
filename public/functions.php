<?php

if(!function_exists('redirect')) {
    function redirect(string $target)
    {
        header('Location: ' . $target);
        die;
    }
}
if(!function_exists('snakeToCamel')) {
    function snakeToCamel($string)
        {
    $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    $str[0] = strtolower($str[0]);
            return $str;
        }
}
if(!function_exists('camelToSnake')) {
    function camelToSnake($input) : string
    {

        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}