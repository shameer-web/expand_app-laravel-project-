<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Enquiery;
use DB;
class CustomerController extends Controller
{
    public function create()
    {
        return view('admin/customer/create');
    }
}
