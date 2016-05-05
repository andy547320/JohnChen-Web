<?php namespace JC\Flogic\Components;
use JC\Flogic\Models\Procure as Procure;
use JC\Flogic\Models\Supplier as Supplier;
use JC\Flogic\Models\Contact as Contact;
use Cms\Classes\ComponentBase;

class DptList extends ComponentBase {

    public function componentDetails() {
        return ['name' => 'DptList Component', 'description' => 'No description provided yet...'];
    }

    public function defineProperties() {
        return ['department' => ['title' => '部門', 'type' => 'dropdown', 'default' => 'procure'],

        ];

    }

    protected function loadDepartmentData() {
        return json_decode(file_get_contents(__DIR__.'/../data/countries-and-states.json'), true);
    }

    public function getDepartmenTOptions() {
        $countries = $this->loadCountryData();
        $result = [];

        foreach($countries as $code => $data)
        $result[$code] = $data['n'];

        return $result;
    }

    public function onRun() {
        $this->addCss('/plugins/rainlab/weather/assets/css/weather.css');
        $this->lists = $this->page['lists'] = $this->menu();
    }

    public function menu() {

        $this->type = $type = $this->page['type'] = 'type';
        $this->tag = $tag = $this->page['tag'] = 'tag';
        $items = array();
        $results = Model::select($type)->groupBy($type)->get();
        $datas = json_decode(json_encode($results), true);
        //想辦法抓到MODEL物件就成了
        $i = 0;
        $z = 0;
        foreach($datas as $data) {

            $results_ = Model::select($tag)->where($tag, '=', $data[$type])->groupBy($tag)->get();
            $datas_ = json_decode(json_encode($results_), true);
            foreach($datas_ as $data_) {
                //$items_list[$z] = $data_["$thirdth_col"];
                $items[$data[$type]][$z] = $data_[$tag];
                $z++;
            }
            $i++;
        }

        return $items;
    }

    

}