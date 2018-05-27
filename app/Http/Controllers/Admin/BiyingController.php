<?php
/**
 * Created by PhpStorm.
 * User: 华阳
 * Date: 2018/5/24
 * Time: 15:03
 */

namespace App\Http\Controllers\Admin;


class BiyingController
{
    public function coin($symbol,$type)
    {

        if ($symbol == 'hsr')
        {
            return $this->hsr($symbol,$type);
        }
        if ($symbol == 'eth')
        {
            return $this->eth($symbol,$type);
        }
        if ($symbol == 'eos')
        {
            return $this->eos($symbol,$type);
        }
        if ($symbol == 'snt')
        {
            return $this->snt($symbol,$type);
        }
        if ($symbol == 'omg')
        {
            return $this->omg($symbol,$type);
        }
    }
    public function hsr($symbol,$type)
    {

        //hsr
        if ($symbol == 'hsr' && $type == 1)
        {
            //买一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=5';
            $dd= $this->curl_post_https($url);
            return $dd->buy;
        }else{
            //卖一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=5';
            $dd= $this->curl_post_https($url);
            return $dd->sell;
        }

    }


    public function eth($symbol,$type)
    {
        //eth
        if ($symbol == 'eth' && $type == 1)
        {
            //买一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=14';
            $dd= $this->curl_post_https($url);
            return $dd->buy;
        }else{
            //卖一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=14';
            $dd= $this->curl_post_https($url);
            return $dd->sell;
        }

    }

    public function eos($symbol,$type)
    {
        //eos
        if ($symbol == 'eos' && $type == 1)
        {
            //买一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=29';
            $dd= $this->curl_post_https($url);
            return $dd->buy;
        }else{
            //卖一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=29';
            $dd= $this->curl_post_https($url);
            return $dd->sell;
        }

    }

    public function snt($symbol,$type)
    {
        //ltc
        if ($symbol == 'snt' && $type == 1)
        {
            //买一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=24';
            $dd= $this->curl_post_https($url);
            return $dd->buy;
        }else{
            //卖一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=24';
            $dd= $this->curl_post_https($url);
            return $dd->sell;
        }

    }

    public function omg($symbol,$type)
    {
        //ltc
        if ($symbol == 'omg' && $type == 1)
        {
            //买一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=11';
            $dd= $this->curl_post_https($url);
            return $dd->buy;
        }else{
            //卖一价
            $url = 'https://www.coinw.me/appApi.html?action=market&symbol=11';
            $dd= $this->curl_post_https($url);
            return $dd->sell;
        }

    }

    /**
     * @param $url
     * @param $data
     * @return mixed
     */
    function curl_post_https($url){ // 模拟提交数据函数
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        //curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return json_decode($tmpInfo); // 返回数据，json格式
    }
}