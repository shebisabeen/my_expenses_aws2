<?php

function generateToken($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $generatedToken = '';
    for ($i = 0; $i < $length; $i++) {
        $generatedToken .= $characters[rand(0, $charactersLength - 1)];
    }
    return $generatedToken;
}

function printAndExit($data, $name = "data")
{
    echo $name . "<br/>";
    echo "------------------------- <br/>";
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}
