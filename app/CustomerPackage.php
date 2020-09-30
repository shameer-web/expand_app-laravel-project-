<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerPackage extends Model
{
    //


     protected $fillable = [
       'package_name','package_type','cus_id','customer_package_status'
    ];
}
