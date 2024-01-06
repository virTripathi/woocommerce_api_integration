<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    use HttpResponses;

    public function index(Request $request) {
        return view('welcome');
    }

    public function redeem_coupon(Request $request) {
        $validate_coupon_code = Validator::make($request->all(),[
            'coupon_code'=>'required'
        ]);

        if($validate_coupon_code->fails()) {
            $this->error([],'Coupon Code is Required!',422);
        }

        $woocommerce_api_response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('WooCommerceUserName') . ':' . env('WooCommercePassword'))
        ])->get(env('WooCommerceEndpoint'));
        
        $woocommerce_api_response = $woocommerce_api_response->json();
        $key = array_search($request->coupon_code, array_column($woocommerce_api_response, 'number'));
        
        if ($key !== false) {
            return $this->success(['valid' => true, 'balance' => $woocommerce_api_response[$key]['balance']],'OK',200);
        }

        return $this->error(['valid' => false],'Invalid Coupon Code',422);
    }

    public function store_coupon_data(Request $request) {
        $validation_rules = Validator::make($request->all(),[
            'coupon_code'=>'required',
            'number'=>'required|numeric|max:9999999999|min:1000000000|unique:users'
        ]);
        if ($validation_rules->fails()) {
            $errors = $validation_rules->errors();
            if ($errors->has('coupon_code')) {
                return $this->error([], $errors->first('coupon_code'), 422);
            }
            if ($errors->has('number')) {
                return $this->error([], $errors->first('number'), 422);
            }
            return $this->error([], 'Unprocessable Content', 422);
        }

        $woocommerce_api_response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('WooCommerceUserName') . ':' . env('WooCommercePassword'))
        ])->get(env('WooCommerceEndpoint'));
        
        $woocommerce_api_response = $woocommerce_api_response->json();
        $key = array_search($request->coupon_code, array_column($woocommerce_api_response, 'number'));
        
        if ($key === false) {
            return $this->error([], 'Invalid Coupon Code, Please Validate it and then try again!', 422);
        }

        $balance = $woocommerce_api_response[$key]['balance'];

        try {
            $user = User::create([
                'number'=>$request->number,
                'card_number'=>Crypt::encrypt($request->coupon_code),
                'wallet_balance'=>$balance
            ]); 
            return $this->success([],'Gift Card Balance Of INR '.$balance.' has been added successfully to your account!',201);
        } catch(\Exception $e) {
            dd($e);
            return $this->error([], 'OOPS! Some Error Occurred. Please Try Again', 500);
        }

               

    }
}
