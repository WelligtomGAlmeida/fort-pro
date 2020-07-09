<?php

namespace App\Library;

class Validation
{
    public static function validateCpf($cpf){
        // removing all characters that are not numbers
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // checking if the value is at least 11 characters
        if (strlen($cpf) != 11) {
            return false;
        }

        // Checking if the value is a sequence of the same number
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Doing the calculus
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}
