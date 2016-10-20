<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //Columns specified can be mass assigned

        protected $fillable = [
          'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'status'
      ];


      public function category(){
        $this->belongsTo(Category::class);
      }
}
