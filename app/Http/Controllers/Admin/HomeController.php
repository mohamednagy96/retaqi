<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ChartJs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('admin.pages.home');
    }


}
