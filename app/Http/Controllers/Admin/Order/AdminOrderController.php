<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use Illuminate\Support\Facades\Mail;
class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $today_date = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($query) use ($request) {
            return $query->whereDate('created_at', $request->date);
        }, function ($query) use ($today_date) {
            $query->whereDate('created_at', $today_date);
        })
        ->when($request->status != null, function ($query) use ($request) {
            return $query->where('status_message', $request->status);
        })
        ->paginate(10);
    
        return view('admin_layout.order.index', compact('orders'));
    }
    
    public function show( $order_id)
    {
        $order = Order::where('id',$order_id)->first();
        return view('admin_layout.order.view',compact('order'));
    }

    public function update( $order_id,Request $request )
    {
        $order = Order::where('id',$order_id)->first();
        if( $order)
        {
            $order->update([
                'status_message'=>$request->status
            ]);
            return redirect('admin/order/'.$order->id)->with('message','Status Update');
        }
        return redirect('admin/order/'.$order->id)->with('message','Id Not Found');
    }


    public function view_invoice( $order_id )
    {
        $order = Order::findOrFail( $order_id );
        return view('admin_layout.invoice.generate-invoice',compact('order'));
    }

    public function download_invoice( $order_id )
    {
        $order = Order::findOrFail( $order_id );
        $today_date = Carbon::now()->format('d-m-Y');
        $data= ['order'=>$order];
        $pdf = Pdf::loadView('admin_layout.invoice.generate-invoice', $data);
        return $pdf->download('invoice-'.$order_id.'-'.$today_date.' .pdf');
    }

    public function mail_invoice($order_id)
    {
        try {
            $order = Order::findOrFail($order_id);
            $mailable = new InvoiceOrderMailable($order); // Pass the necessary arguments to the constructor
            Mail::to($order->email)->send($mailable);
            return redirect('admin/order/'.$order_id)->with('message', 'Invoice Sent To: '.$order->email);
        } catch (\Exception $e) {
           
            \Log::error('An error occurred while sending the invoice: '.$e->getMessage());die;
            return redirect('admin/order/'.$order_id)->with('message', 'Something Went Wrong');
        }
    }
    
}
