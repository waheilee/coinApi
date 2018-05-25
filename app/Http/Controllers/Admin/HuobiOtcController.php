<?php
/**
 * Created by PhpStorm.
 * User: 华阳
 * Date: 2018/5/24
 * Time: 13:13
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

class HuobiOtcController extends ComController
{
    public function index()
    {
        return view('admin.otc.index');
    }


    public function getSymbol($symbol,$type)
    {
            if ($symbol =='btc')
            {
                $symbol = 'btcusdt' ;
                $price = $this->huobi($symbol,$type);
                return $price;
            }

            if ($symbol =='eth')
            {
                $symbol = 'ethusdt' ;
                $price = $this->huobi($symbol,$type);
                return $price;
            }

            if ($symbol =='eos')
            {
                $symbol = 'eosusdt' ;
                $price = $this->huobi($symbol,$type);
                return $price;
            }

            if ($symbol =='ltc')
            {
                $symbol = 'ltcusdt' ;
                $price = $this->huobi($symbol,$type);
                return $price;
            }

    }

    public function huobi($symbol,$type)
    {
        if ($type == 1)
        {
            $req = new HuobiApiController();
            $amount = $req->get_detail_merged($symbol);
            return $amount->tick->bid[0];
        }else{
            $req = new HuobiApiController();
            $amount = $req->get_detail_merged($symbol);
            return $amount->tick->ask[0];
        }

    }

    /**
     * 火币usdt买入价格
     */
    public function getInUsdt()
    {
        $url = 'https://otc-api.huobi.br.com/v1/otc/trade/list/public?country=37&currency=1&payMethod=0&currPage=1&coinId=2&tradeType=1&merchant=1&online=1';
        $data =  $this->curl_get_https($url);
        return $data->data[0]->price;
    }

    /**
     * 火币usdt卖出价格
     */
    public function getOutUsdt()
    {
        $url = 'https://otc-api.huobi.br.com/v1/otc/trade/list/public?country=37&currency=1&payMethod=0&currPage=1&coinId=2&tradeType=0&merchant=1&online=1';
        $data =  $this->curl_get_https($url);
        return $data->data[0]->price;
    }

    /**
     * @param $url
     * @return mixed
     */
    public function curl_get_https($url){

        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
        $tmpInfo = curl_exec($curl);     //返回api的json对象
        //关闭URL请求
        curl_close($curl);
        return json_decode($tmpInfo) ;    //返回json对象
    }


}