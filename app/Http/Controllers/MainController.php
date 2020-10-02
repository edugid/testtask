<?php 
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct(Request $request, Order $order) { 
        $this->request = $request;
        $this->orderModel = $order;
    }

    public function index()
    {

        if($this->request->search){
            $orders = $this->getOrdersByName($this->request->search);
        }else{
            $orders = $this->getAllOrders();
        }
        

        return view('main', [
            'orders' => $orders
        ]);
    }

    private function getAllOrders(){
        return $this->orderModel
        ->orderBy('name')
        ->take(1)
        ->paginate(config('orders.paginate'));
    }

    private function getOrdersByName($slug){
        return $this->orderModel
        ->where('name', 'LIKE', "%$slug%" )
        ->orderBy('name')
        ->take(1)
        ->paginate(config('orders.paginate'));
    }
}
