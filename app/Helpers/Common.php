<?php

function showDateTime($carbon, $format = "d F Y")
{
    return $carbon->translatedFormat($format);
}
