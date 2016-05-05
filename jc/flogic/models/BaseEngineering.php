<?php namespace JC\Flogic\Models\BaseEngineering;

use Model;

/**
 * Testing Model
 */
abstract class BaseEngineering extends Model {
    
    
    public function __construct() {

    }
  
  
    public function scopeMerger($query) {

        return $query->each(function($each){
    $each = json_decode($each,true);
    $official = json_decode($each['json_official'],true);
    $contact = json_decode($each['json_contact'],true);
    $official= json_encode(array_merge($official_contact,$contact));
   return $each['json_official'] = $official;
    });

}