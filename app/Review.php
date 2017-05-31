<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
	/**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
    	'reviewing', 'reviewed', 'project_id', 'submitted', 'communication', 'as_described', 'would_recommend', 'review'
    ];

}