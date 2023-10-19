<?php

if (! function_exists('format_rupiah')) {
    function format_rupiah($number)
    {
        return 'Rp' . number_format($number, 0, ',', '.');
    }
}

if (! function_exists('numberToRoman')) {
    /**
     * @param int $number
     * @return string
     */
    function numberToRoman(int $number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
