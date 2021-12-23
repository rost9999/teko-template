<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teko;
use Illuminate\Support\Facades\DB;

class TekoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function mags($month)
    {
        $data = DB::select('SELECT `mag` as `Магазин`, ROUND(sum(`count`),2) as `Різниця в К-сть` FROM `tekos` WHERE `mounth` = :month GROUP BY `mag` ORDER BY `Різниця в К-сть`', ['month' => $month]);
        return view('teko', compact('data'));
    }

    public function grupa($month, $mag)
    {
        $data = DB::select('SELECT `torg3` as `Група`, ROUND(sum(`count`),2) as `Різниця в К-сть` FROM `tekos` WHERE `mounth` = :month and `mag` = :mag GROUP BY `torg3` ORDER BY `Різниця в К-сть`', ['month' => $month, 'mag' => $mag]);
        return view('teko', compact('data'));
    }

    public function TM($month, $mag, $grupa)
    {
        $grupa = str_replace('+', ' ', $grupa);
        $data = DB::select('SELECT `TM` as `Торгова Марка`, ROUND(sum(`count`),2) as `Різниця в К-сть` FROM `tekos` WHERE `mounth` = :month and `mag` = :mag and `torg3` = :grupa GROUP BY `TM` ORDER BY `Різниця в К-сть`', ['month' => $month, 'mag' => $mag, 'grupa' => $grupa]);
        return view('teko', compact('data'));
    }

    public function tovar($month, $mag, $grupa, $tm)
    {
        $grupa = str_replace('+', ' ', $grupa);
        $tm = str_replace('+', ' ', $tm);
        $data = DB::select('SELECT `name` as `Назва`, ROUND(sum(`count`),2) as `Різниця в К-сть`, `article` FROM `tekos` WHERE `mounth` = :month and `mag` = :mag and `torg3` = :grupa and `TM` = :TM GROUP BY `article` ORDER BY `Різниця в К-сть`', ['month' => $month, 'mag' => $mag, 'grupa' => $grupa, 'TM' => $tm]);
        return view('teko', compact('data'));
    }

    public function remainder($month, $mag, $grupa, $tm, $article)
    {
        $month = strval($month);
        if (strlen($month) < 2) {
            $month = '0' . $month;
        }
        $date = '%' . $month . '.2021';
        $data = DB::select('SELECT `date`, ROUND(`count`,2) as `count`  FROM remainders WHERE `mag` = :mag AND `article` = :article AND `date` LIKE :date ORDER BY `date`', ['mag' => $mag, 'article' => $article, 'date' => $date]);
        $newdata = [];
        foreach ($data as $d){
            $newdata[substr($d->date,0,2)] = $d->count;
        }
        $data = $newdata;
        return view('remainder', compact('data'));
    }
}
