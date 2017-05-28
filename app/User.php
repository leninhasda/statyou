<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function statuses()
    {
        return $this->hasMany('\App\Status')->orderBy('created_at', 'DESC');
    }

    public function hasStatus()
    {
        return $this->statuses()->count();
    }

    public function getLastPublicStatusDate()
    {
        return $this->getLastStatusDate(Status::Public);
    }

    public function getLastStatusDate($type = false)
    {
        $query = $this->statuses();

        if ($type) {
            $query->where('type', $type);
        }

        $lastStatus = $query->latest()->first();

        return $lastStatus->created_at;
    }

    public function publicStatusOfDate($date)
    {
        return $this->statusOfDate($date, Status::Public);
    }

    public function statusOfDate($date, $type = false)
    {
        $query = $this->statuses();
        if( $type ) {
            $query->where('type', $type);
        }
        return $query->ofDate($date->format('y-m-d'))->get();
    }
}
