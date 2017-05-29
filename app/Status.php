<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'status';

    const Public = 1;
    const Private = 0;

    protected $fillable = ['user_id', 'content', 'type',
        'created_at', 'updated_at' // for faker purpose
    ];

    // public static function firstOnes($user_id)
    // {
    //     $last = self::where('user_id', $user_id)->first()->value(\DB::raw('DATE(created_at)'));
    //     return self::where(['user_id' => $user_id, ])->get();
    // }

    public static function scopeOfDate($query, $date)
    {
        return $query->where(\DB::raw('DATE(created_at)'), $date);
    }

    public static function getAllPublicDate($user_id)
    {
        return self::getAllDate($user_id, self::Public);
    }

    public static function getAllDate($user_id, $type = false)
    {
        $field = \DB::raw('DATE(created_at) as created_at');
        $query = self::distinct()->select($field)->where('user_id', $user_id);

        if ($type) {
            $query->where('type', $type);
        }

        $statuses = $query->orderBy('created_at', 'DESC')->get();
        $dates = [];

        foreach ($statuses as $status) {
            $dates[] = $status->created_at;
        }

        return $dates;
    }
}
