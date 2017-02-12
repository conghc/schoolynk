<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $guarded  = ['id'];

    public function school(){
        return $this->belongsTo('App\User', 'school_id', 'id');
    }

    protected $appends = ['degree_lv'];

    public function getDegreeLvAttribute(){
        $return = [];
        switch ($this->degree_level) {
            case "bachelor":
                $return['label'] = 'B';
                $return['value'] = 'Bachelor';
                break;
            case "master":
                $return['label'] = 'M';
                $return['value'] = 'Master';
                break;
            case "ph.d":
                $return['label'] = 'P';
                $return['value'] = 'Professional';
                break;
            case "non_degree_program":
                $return['label'] = 'N';
                $return['value'] = 'None-Derge Program';
                break;
            default:
                $return['label'] = '';
                $return['value'] = '';
        }
        return $return;
    }
}
