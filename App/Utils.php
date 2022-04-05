<?php

function short($content, $size)
{
    $contentSize = strlen($content);
    $finded = "";
    if ($contentSize <= $size) {
        return $content;
    } else {

        for ($count = 0; $count < $size; $count++) {
            $finded = $finded . $content[$count];
        }

        $finded = $finded . "...";
    }

    return $finded;
}
