<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\HuobiApiController;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function huobi()
    {
        $req = new HuobiApiController();
// 获取账户余额示例
        var_dump($req->get_detail_merged('btcusdt'));
    }

    public function curl_get_https(){
        $url = 'https://otc-api.huobi.br.com/v1/otc/trade/list/public?country=37&currency=1&payMethod=0&currPage=1&coinId=2&tradeType=1&merchant=1&online=1';
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

    public function otcApi()
    {
       $otc = $this->curl_get_https();
       return $otc->data[0];
    }

    public function otcUsdt()
    {
       $usdt = $this->otcApi();
       dd($usdt->price);
    }
}
