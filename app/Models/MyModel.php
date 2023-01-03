<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyModel extends Model
{
    use HasFactory;
     public static function boot()
    {
        parent::boot();

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::created(function ($request) {

            print_r($request->attributes);
           $user = Auth::user()->name;
            $value = null;
            foreach ($request->attributes as $key => $val) {
                $value .= $key . ' = ' . $val . ', ';
            }
            $requete = '|Insert into ' . $request->getTable() . ' ' . $value . '|';
            Log::info('Created event call: ' . $request);
            File::append(

                storage_path('/logs/activity.log'),
                '|' . date('Y-m-d H:i:s') . '|created ' . '|' . $requete . 'created by : ' . $user . PHP_EOL
            );
        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updated(function ($request) {
            $user = Auth::user()->name;
            $value = null;
            foreach ($request->attributes as $key => $val) {
                $value .= $key . ' = ' . $val . ', ';
            }
            $requete = '|update into ' . $request->getTable() . ' ' . $value . '|';
            File::append(
                storage_path('/logs/activity.log'),
                '|' . date('Y-m-d H:i:s') . '|update' . '|' . $requete . 'update by : ' . $user . PHP_EOL
            );
        });

        /**
         * Write code on Method
         *
         * @return response()
         */
        static::deleted(function ($request) {
            $user = Auth::user()->name;
            $value = null;
            foreach ($request->attributes as $key => $val) {
                $value .= $key . ' = ' . $val . ', ';
            }
            $requete = '|deleted into ' . $request->getTable() . ' ' . $value . '|';
            File::append(
                storage_path('/logs/activity.log'),
                '|' . date('Y-m-d H:i:s') . '|deleted' . '|' . $requete . 'deleted by : ' . $user . PHP_EOL
            );
        });
    }

}
