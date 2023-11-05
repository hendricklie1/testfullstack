<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Transactions;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Products;

class TransactionsController extends Controller
{
    public function index(){
        if (!Auth::check() && !Request::is('login')){
            return Redirect()->route('login')->with('error', 'You must be logged in to access this page!');
        }else{
            $trans = Transactions::all();
            return view('trans.index',compact('trans'));
        }
    }

    public function AddTrans(){
        if (!Auth::check() && !Request::is('login')){
            return Redirect()->route('login')->with('error', 'You must be logged in to access this page!');
        }else{
            $products = Products::all();
            return view('trans.add',compact('products'));
        }
    }

    public function getTransactions()
    {
        // URL API
        $url = 'http://tes-skill.datautama.com/test-skill/api/v1/transactions';

        // X-API-KEY
        $apiKey = 'DATAUTAMA';

        // Data untuk di-hash
        $dataToHash = 'GET:' . $apiKey;

        // X-SIGNATURE (Hash SHA-256)
        $signature = hash('sha256', $dataToHash);

        // Mengirim permintaan ke API dengan header yang sesuai
        $response = Http::withHeaders([
            'X-API-KEY' => $apiKey,
            'X-SIGNATURE' => $signature,
        ])->get($url);

        $data = $response->json([
            //'code'=>$response['status'],
            'message'=>"Success",
            //'data'=>$response['body']
        ]);

        print_r($data);
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'quantity' => 'required|integer',
            'product_id' => 'required|exists:products,id',
        ]);

        // Hitung harga berdasarkan product_id
        $product = Products::find($request->product_id);
        $price = $product->price;

        // Hitung payment_amount
        $paymentAmount = $request->quantity * $price;

        // Generate reference_no (contoh)
        $referenceNo = 'TRX-' . uniqid();

        // Simpan data transaksi
        $transaction = new Transactions([
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'price' => $price,
            'payment_amount' => $paymentAmount,
            'reference_no' => $referenceNo,
        ]);
        $transaction->save();

        return Redirect()->route('transactions')->with('success','Transactions Inserted Successful');

        // return response()->json([
        //     'message' => 'Transaksi berhasil ditambahkan',
        //     'transaction' => $transaction,
        // ], 201);
    }
}
