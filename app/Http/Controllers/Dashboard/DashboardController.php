<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\States\Order\Delivered;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use function view;

class DashboardController extends Controller
{
    public function view()
    {
        $products_count = Product::all()->count();
        $users_count = User::all()->count();
        $orders_count = Order::all()->count();
        $sales = Order::where('status', Delivered::class)->sum('total');

        $chart_options = [
            'chart_title' => 'Commandes par mois',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        return view('dashboard.pages.main', compact('products_count', 'users_count', 'orders_count', 'sales', 'chart1'));
    }
}
