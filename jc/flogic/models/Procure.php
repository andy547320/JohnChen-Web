<?php namespace JC\Flogic\Models;

use Model;

/**
 * Testing Model
 */
class Procure extends Model
{
    function __construct()
    {
      
    }
    
    protected $primaryKey = 'id';

    public $exists = true;

    protected $dates = ['updated_at'];

    public $timestamps = true;

    protected $jsonable = [];

   
    
    protected $dateFormat = 'U';
    /**
     * @var string The database table used by the model.
     */
    public $table = 'jc_procures';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    
    
    public function json_merger()
    {
      $supplier = Model::select(['slug','json_official'])->get()->toArray();
       foreach($supplier as $supplier)
       {
     
           $suppliers_slug = Model::select(['data'])->from('jc_contacts')
                    ->where('suppliers_slug','=', $supplier['slug'])->get();
                    $suppliers_slug = json_decode(json_encode($suppliers_slug), true);
               
                    $json_official = json_decode($supplier['json_official'],true);
                    
                    
                    $new_official = array_merge($suppliers_slug,$json_official);
                     Model::where('slug',$supplier['slug'])->update(['json_official' =>  json_encode($new_official)]);
                    
          
       }
    }
    
    public function merger()
    {
      $supplier = Model::select(['json_official','slug','company_name'])->get()->toArray();
       foreach($supplier as $sup)
       {
     $suppl =  json_decode($sup['json_official'],true);
     $contact['公司全稱'] = $sup['company_name'];
 
         $new_official = array_merge($suppl,$contact);
                     Model::where('slug',$sup['slug'])->update(['json_official' =>  json_encode($new_official)]);
                    
          
       }
    }
    
    

}