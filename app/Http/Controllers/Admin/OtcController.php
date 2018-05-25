<?php
/**
 * Created by PhpStorm.
 * User: 华阳
 * Date: 2018/5/24
 * Time: 15:50
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HuobiOtcController;
use App\Http\Controllers\Admin\BiyingController;
class OtcController extends ComController
{

    public function index()
    {
        $arr = array();
        $arr['huobi'] = 123;
        $arr['biying'] = 321;
        $arr['usdt'] = 1234;
        $arr['price'] = 4332;
//           dd($arr);

        return view('admin.otc.index')->with('arr',$arr);
    }
    public function Symbol(Request $request)
    {
//dd($request->all());
        if ($request->ajax()){
            $symbol = $request->symbol;
            $type   = $request->type;

            if($type ==1){
                $arr =  $this->inArr($symbol,$type);
//                return view('admin.otc.index')->with('arr',$arr);
                return response()->json($arr);
            }else{
                $arr =  $this->outArr($symbol,$type);
//                return view('admin.otc.index')->with('arr',$arr);
                return response()->json($arr);
            }
        }
        return view('admin.otc.index');

    }



    public function inArr($symbol,$type)
    {
        $huobi = new HuobiOtcController();
        $biying = new BiyingController();
        $huobiIn = $huobi->getSymbol($symbol,$type);
        $usdt = $huobi->getInUsdt();
        $biIn = $biying->coin($symbol,$type);
        $price = $huobiIn*$usdt-$biIn;
        $arr = [];
        $arr['huobi'] = $huobiIn*$usdt;
        $arr['biying'] = $biIn;
        $arr['usdt'] = $usdt;
        $arr['price'] = $price;

        return $arr;
    }

    public function outArr($symbol,$type)
    {

        $huobi = new HuobiOtcController();
        $biying = new BiyingController();
        $huobiOut = $huobi->getSymbol($symbol,$type);
        $usdt = $huobi->getOutUsdt();
        $biIn = $biying->coin($symbol,$type);
        $price = $biIn-($huobiOut*$usdt);
        $arr = [];
        $arr['huobi'] = $huobiOut*$usdt;
        $arr['biying'] = $biIn;
        $arr['usdt'] = $usdt;
        $arr['price'] = $price;

        return $arr;
    }
}