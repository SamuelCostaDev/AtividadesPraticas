<?php

namespace NumeralConverter;


class RomanNumeralConverter 
{
    protected array $romanMap = [
        'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100,
        'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9,
        'V' => 5, 'IV' => 4, 'I' => 1,
    ];

    public function convertToRoman(int $number): string
    {
        $result = '';
        foreach ($this->romanMap as $roman => $value) {
            while ($number >= $value) {
                $result .= $roman;
                $number -= $value;
            }
        }
        return $result;
    }

    public function convertFromRoman(string $roman): int
    {
        $result = 0;
        $roman = strtoupper($roman);
        $i = 0;
        while ($i < strlen($roman)) {
            $currentValue = $this->romanMap[$roman[$i]];
            $nextValue = ($i + 1 < strlen($roman)) ? $this->romanMap[$roman[$i + 1]] : 0;

            if ($nextValue > $currentValue) {
                $result += $nextValue - $currentValue;
                $i += 2;
            } else {
                $result += $currentValue;
                $i++;
            }
        }
        return $result;
    }
}
