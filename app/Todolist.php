<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    //
    protected $fillable = ['name','description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public static function changeDateFormat($date) {
     $date = preg_replace('/(\d{2})-(\d{2})-(\d{4})/', '$3-$2-$1', $date);
        if(!preg_match('/(\d{4})-(\d{2})-(\d{2})( \d{2}:\d{2}:\d{2})?/', $date, $mtc))
            return $date;
        else{
            $b = array( 1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            $mtc[2] = intval($mtc[2]);

            if(!isset($mtc[4]))
                $mtc[4] = '';

            return "{$mtc[3]} {$b[$mtc[2]]} {$mtc[1]}";
        }
    }
}
