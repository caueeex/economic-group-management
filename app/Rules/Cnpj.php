<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Cnpj implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $value);
        if (strlen($cnpj) != 14) {
            $fail('O :attribute não é um CNPJ válido.');
            return;
        }
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            $fail('O :attribute não é um CNPJ válido.');
            return;
        }
        $t = [5,4,3,2,9,8,7,6,5,4,3,2];
        for ($i = 0, $s = 0; $i < 12; $i++) $s += $cnpj[$i] * $t[$i];
        $d1 = ($s % 11 < 2) ? 0 : 11 - ($s % 11);
        if ($cnpj[12] != $d1) {
            $fail('O :attribute não é um CNPJ válido.');
            return;
        }
        $t = [6,5,4,3,2,9,8,7,6,5,4,3,2];
        for ($i = 0, $s = 0; $i < 13; $i++) $s += $cnpj[$i] * $t[$i];
        $d2 = ($s % 11 < 2) ? 0 : 11 - ($s % 11);
        if ($cnpj[13] != $d2) {
            $fail('O :attribute não é um CNPJ válido.');
            return;
        }
    }
}
