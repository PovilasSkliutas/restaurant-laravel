<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // savybes pridejimas prie modelio
    // kuri galima pasiimti vaizde arba kontroleryje

    // metdodas turi buti kaip lenteles pavadinimas
    public function categories() {
      // sukuria sasaja su Category modeliu
      return $this->hasOne('App\Category', 'id', 'category');
    }
    // metdodas turi buti kaip lenteles pavadinimas
    public function manufacturers() {
      // sukuria sasaja su Manufacturer modeliu
      return $this->hasOne('App\Manufacturer', 'id', 'manufacturer');
    }
}
