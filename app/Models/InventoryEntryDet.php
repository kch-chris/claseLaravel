<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryEntryDet extends Model
{
    protected $table="inventory_entry_det";
    protected $primaryKey = 'inventory_entry_detID';

    protected $fillable = [
        'productsID' , 'quantity'
    ];    

    public function entry(){
        return $this->belongsTo('App\Models\InventoryEntry','inventory_entryID');
    }

    public function productos(){
        return $this->hasOne('App\Models\Products','productsID','productsID');
    }

    public $timestamps= false;
}
