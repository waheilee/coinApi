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
class OtcController
{

    public function index()
    {
        $huobi = new HuobiOtcController();
        $inUsdt =  $huobi->getInUsdt();
        $outUsdt = $huobi->getOutUsdt();
        $in = $this->coinIn();
        $out = $this->coinOut();

//        dd($arr);
        return view('admin.otc.index',compact('in',$in,'out',$out,'inUsdt',$inUsdt,'outUsdt',$outUsdt));
    }
    public function Symbol(Request $request)
    {
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

    public function coinIn()
    {
       $eth = $this->eth($status = 1);
       $eos = $this->eos($status = 1);
       $snt = $this->snt($status = 1);
       $hsr = $this->hsr($status = 1);
       $omg = $this->omg($status = 1);
       $arr = array($eth,$eos,$snt,$hsr,$omg);
//       dd($arr);
       return $arr;
    }

    public function coinOut()
    {
        $eth = $this->eth($status = 0);
        $eos = $this->eos($status = 0);
        $snt = $this->snt($status = 0);
        $hsr = $this->hsr($status = 0);
        $omg = $this->omg($status = 0);
        $arr = array($eth,$eos,$snt,$hsr,$omg);
//       dd($arr);
        return $arr;
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
        $arr['huobi'] = round($huobiIn,3);
        $arr['biying'] = round($biIn,3);
        $arr['price'] = round($price,3);

        return $arr;
    }

    public function outArr($symbol,$type)
    {

        $huobi = new HuobiOtcController();
        $biying = new BiyingController();
        $huobiOut = $huobi->getSymbol($symbol,$type);
        $usdt = $huobi->getOutUsdt();
        $biIn = $biying->coin($symbol,$type);
        $price = ($huobiOut*$usdt)-$biIn;
        $arr = [];
        $arr['huobi'] = round($huobiOut,3) ;
        $arr['biying'] = round($biIn,3);
        $arr['price'] = round($price,3);

        return $arr;
    }



    public function eth($status)
    {
        $symbol = 'eth';
        if ($status ==1)
        {
            $in  = $this->inArr($symbol,$type = 1);
            $in['name'] = 'eth';
            return $in;
        }else{
            $out = $this->outArr($symbol,$type = 0);
            $out['name'] = 'eth';
            return $out;
        }

    }

    public function eos($status)
    {
        $symbol = 'eos';
        if ($status ==1)
        {
            $in  = $this->inArr($symbol,$type = 1);
            $in['name'] = 'eos';
            return $in;
        }else{
            $out = $this->outArr($symbol,$type = 0);
            $out['name'] = 'eos';
            return $out;
        }

    }
    public function hsr($status)
    {
        $symbol = 'hsr';
        if ($status ==1)
        {
            $in  = $this->inArr($symbol,$type = 1);
            $in['name'] = 'hsr';
            return $in;
        }else{
            $out = $this->outArr($symbol,$type = 0);
            $out['name'] = 'hsr';
            return $out;
        }

    }
    public function snt($status)
    {
        $symbol = 'snt';
        if ($status ==1)
        {
            $in  = $this->inArr($symbol,$type = 1);
            $in['name'] = 'snt';
            return $in;
        }else{
            $out = $this->outArr($symbol,$type = 0);
            $out['name'] = 'snt';
            return $out;
        }

    }
    public function omg($status)
    {
        $symbol = 'omg';
        if ($status ==1)
        {
            $in  = $this->inArr($symbol,$type = 1);
            $in['name'] = 'omg';
            return $in;
        }else{
            $out = $this->outArr($symbol,$type = 0);
            $out['name'] = 'omg';
            return $out;
        }

    }

}