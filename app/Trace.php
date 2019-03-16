<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tracker_id', 'user_id', 'trace'
    ];

    /**
     * Get Tracker without trace Id
     * You could use model bidding but you choose this
     *
     * @param  int $user_id
     * @param  int $trace
     * @return void
     */
    public function getTrace(int $user_id, int $trace)
    {
        return $this->where(
            'user_id',
            $user_id
        )->where(
            'trace',
            $trace
        )->get();
    }
}
