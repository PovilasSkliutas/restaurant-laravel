<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products() {
      /* SELECT COUNT(*) FROM */
      return Product::where('category', $this->id)->count();
    }
}
