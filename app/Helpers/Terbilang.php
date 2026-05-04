<?php

namespace App\Helpers;

class Terbilang
{
    private static $satuan = [
        '', 'satu', 'dua', 'tiga', 'empat', 'lima',
        'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
        'sebelas', 'dua belas', 'tiga belas', 'empat belas', 'lima belas',
        'enam belas', 'tujuh belas', 'delapan belas', 'sembilan belas'
    ];

    public static function convert(int|float $angka): string
    {
        $angka = (int) round($angka);
        if ($angka < 0) return 'minus ' . self::convert(abs($angka));
        if ($angka === 0) return 'nol';
        if ($angka < 20) return self::$satuan[$angka];
        if ($angka < 100) return self::$satuan[(int)($angka / 10)] . ' puluh' . ($angka % 10 ? ' ' . self::$satuan[$angka % 10] : '');
        if ($angka < 200) return 'seratus' . ($angka - 100 ? ' ' . self::convert($angka - 100) : '');
        if ($angka < 1000) return self::$satuan[(int)($angka / 100)] . ' ratus' . ($angka % 100 ? ' ' . self::convert($angka % 100) : '');
        if ($angka < 2000) return 'seribu' . ($angka - 1000 ? ' ' . self::convert($angka - 1000) : '');
        if ($angka < 1_000_000) return self::convert((int)($angka / 1000)) . ' ribu' . ($angka % 1000 ? ' ' . self::convert($angka % 1000) : '');
        if ($angka < 1_000_000_000) return self::convert((int)($angka / 1_000_000)) . ' juta' . ($angka % 1_000_000 ? ' ' . self::convert($angka % 1_000_000) : '');
        return self::convert((int)($angka / 1_000_000_000)) . ' miliar' . ($angka % 1_000_000_000 ? ' ' . self::convert($angka % 1_000_000_000) : '');
    }
}
