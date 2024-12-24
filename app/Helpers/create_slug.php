<?php

function create_slug(string $string): string
{
    // replace & to and
    $string = str_replace('&', "and", $string);

    /**
     * remove any char that not :
     * lowercase letters
     * uppercase
     * numbers
     * spaces
     * underscore
     * hyphens
     */

    $string = preg_replace('/[^a-zA-Z0-9 _-]/', '', $string);

    // convert all char into lowercase
    $string = strtolower($string);

    // remove multiple space to single space
    $string = preg_replace("/[ ]+/", " ", $string);

    // replace space to hyphens
    $string = str_replace(" ", "-", $string);

    return $string;
}
