<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryEntry extends Model
{
    use SoftDeletes;
    
    protected $table="inventory_entry";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'inventory_entryID';

    protected $fillable = [
        'estatus' , 'description','inventory_entryID'
    ];   

    public function details(){
        return $this->hasMany('App\Models\InventoryEntryDet','inventory_entryID');
    }

    public function getDeletedAtAttribute($value)
    {
        return ($value==NULL)? 'Activo' : 'Cancelado';
    }

    public function _get($key){
        
        return $this->attributes[$key];
    }

    
}
