<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    
	/**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
    	'service_id', 'bid_id', 'service_price', 'service_start', 'service_end', 'service_hours', 
        'use_contract', 'accept_ends', 'started', 'cancelled', 'completed'
    ];

    /**
     * Each project has one service.
     * 
     * @return Eloquent Relationship
     */
    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    /**
     * Each project has one bid.
     * 
     * @return Eloquent Relationship
     */
    public function bid()
    {
        return $this->belongsTo('App\Bid');
    }

    /**
     * A project has many users.
     * 
     * @return Eloquent Relationship
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot(
            'role', 'title', 'review', 'use_contract', 'contract_accepted', 'accepted', 'cancelled', 'completed'
        );
    }

    /**
     * A project may have many project history entries.
     * 
     * @return Eloquent Relationhip
     */
    public function history()
    {
        return $this->hasMany('App\ProjectHistory')->orderBy('id', 'desc');
    }

    /**
     * A project may have many messages.
     * 
     * @return Eloquent Relationship
     */
    public function messages()
    {
        return $this->hasMany('App\Message')->orderBy('created_at', 'desc');
    }

    /**
     * Each project may have many contracts.
     * 
     * @return Eloquent Relationship
     */
    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }

    /**
     * A project has one invoice.
     * 
     * @return Eloquent Relationship
     */
    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

}
