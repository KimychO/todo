<?php

namespace Model;


class Validator
{
    /**
     * @param $fieldname
     * @param $string
     * @param $minSymbols
     *
     * @return bool
     */
    public static function validateText($fieldname, $string, $minSymbols)
    {
        if (strlen($string) >= $minSymbols) {
            return true;
        }
        $error = ['type' => 'error', 'text' => $fieldname . ' must have more than ' . $minSymbols . ' symbols'];
        array_push($_SESSION['messages'], $error);

        return false;
    }
}