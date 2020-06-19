<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryEntry extends Model
{
    protected $table="inventory_entry";
    protected $primaryKey = 'inventory_entryID';

    protected $fillable = [
        'estatus' , 'description','inventory_entryID'
    ];   

    public function details(){
        return $this->hasMany('App\Models\InventoryEntryDet','inventory_entryID');
    }

    public function getEstatusAttribute($value)
    {
        return ($value==1)? 'Activo' : 'Cancelado';
    }

    public function _get($key){
        
        return $this->attributes[$key];
    }

    
}
