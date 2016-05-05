<?php namespace JC\Flogic\Models;

use Model;

/**
 * Testing Model
 */
class Supplier extends Model {
    function __construct() {

    }

    protected $primaryKey = 'id';

    public $exists = true;

    protected $dates = ['updated_at'];

    public $timestamps = true;

    protected $jsonable = ['json_bank'];



    protected $dateFormat = 'U';
    /**
     * @var string The database table used by the model.
     */
    public $table = 'jc_suppliers';

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


    public function json_merger() {
        $supplier = Model::select(['slug', 'json_official'])->get()->toArray();
        foreach($supplier as $supplier) {

            $suppliers_slug = Model::select(['data'])->from('jc_contacts')->where('suppliers_slug', '=', $supplier['slug'])->get();
            $suppliers_slug = json_decode(json_encode($suppliers_slug), true);
            $json_official = json_decode($supplier['json_official'], true);

        }
    }

    public function Contacts($slug) {
        $contact = Model::select(['data'])->from('jc_contacts')->where('suppliers_slug', '=', $slug)->get()->toArray();
    }

    public function merger() {

        Contact::select(['name', 'data'])->get()->each(function($each) {
            $each = json_decode($each, true);
            $data = $each['data'];
            $data['手機'] = $data['姓名'];
            $data['姓名'] = $each['name'];
            Contact::where('name', '=', $each['name'])->update(['data' => json_enceode($data)]);



        });
    }

    public function myJson() {

        Contact::select(['id', 'cellphone', 'data'])->get()->each(function($each) {
            $each = json_decode($each, true);
            $data = json_decode($each['data'], true);
            $data['手機'] = $each['cellphone'];
            Contact::where('id', '=', $each['id'])->update(['data' => json_encode($data)]);

        });

    }

    public function scopeMerger($query) {

        return $query->each(function($each) {
            $each = json_decode($each, true);
            $official = json_decode($each['json_official'], true);
            $contact = json_decode($each['json_contact'], true);
            $official = json_encode(array_merge($official_contact, $contact));
            return $each['json_official'] = $official;
        });


    }
    public function defaultJson() {
        self::select(['service as 產品服務', 'tax_id as 統編', 'company_name as 公司全稱', 'slug as 代稱', 'office_address as 地址', 'office_fax as 傳真', 'explanation as 備註'])->get()->each(function($each) {

            return self::where('slug', '=', $each['代稱'])->update(['data' => json_encode($each)]);


        });

    }

}