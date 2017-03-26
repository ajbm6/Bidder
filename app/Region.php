<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
    	'slug', 'name', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * Disable timestamps on the model.
     *  
     * @var boolean
     */
    public $timestamps = false;

    /**
     * A region has many cities
     * 
     * @return Eloquemt Relationship
     */
    public function cities() {
        return $this->hasMany('App\City');
    }

    /**
     * A region has many services
     * 
     * @return Eloquent Relationship
     */
    public function services() {
    	return $this->hasMany('App\Service');
    }

    /**
     * Parse the regions.
     * 
     * @param  Collection $regions [Collecton of App\Region]
     * @return void
     */
    public static function parseRegions($regions) {
        foreach ($regions as $region) {
            self::parseRegion($region);
        }
    }

    /**
     * Parse one region.
     * 
     * @param  App\Region $region [Region to be parsed]
     * @return void
     */
    public static function parseRegion($region) {
        $region->view_services = [
            'href' => 'api/v1/regions/' . $region->slug . '/services',
            'method' => 'GET'
        ];

        if ( !empty($region->cities) ) {
            \App\City::parseCities($region->cities);
        }
    }
    
}
