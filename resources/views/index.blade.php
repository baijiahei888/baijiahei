<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<meta name="apple-mobile-web-app-title" content="手触屏版">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<title>玩客云行情,链克行情/链克行情查看</title>
<meta name="keywords" content="玩客币,玩客币行情,链克,链克口袋,链克行情">
<meta name="description" content="玩客云,链克口袋行情查看网">
<link href="css/tfui.common.css" rel="stylesheet" type="text/css">
<link href="css/calc.css" rel="stylesheet" type="text/css">
<script src="js/flexible.js?v=1.0.0"></script>
</head>

<body class="flexview">

<section class="container">
    <div class="panel bgc-white">
        <h2>链克(玩客币)交易实时行情
        <span class="fs-12 fc-gray">{{date("Y-m-d")}}</span>
        <span class="fs-12 fc-red ml-10" id="mes">倒计时0秒刷新</span>
        </h2>

        <dl class="hq-dl clearfix">
            <dt>交易平台</dt>
                <dd>最新成交价</dd>
                <dd>成交量</dd>
                <dd>日涨幅</dd>

            @foreach($info->result as $key => $value)
                @if (!strstr($value->dict->name,"虫洞",0)) 
                    <dt>{{$value->dict->name}}</dt>
                    @if (!strstr($value->change,"-"))
                        <dd ><span class="up-text">¥{{number_format($value->cnyPrice,2)}}▲</span></dd>
                    @else
                        <dd ><span class="down-text">¥{{number_format($value->cnyPrice,2)}}▼</span></dd>
                    @endif
                    <dd >{{round($value->turnover,2)}}</dd>
                    @if (!strstr($value->change,"-"))
                        <dd><span class="up-text">+{{round($value->change,2)}}%</span></dd>
                    @else
                        <dd><span class="down-text">{{round($value->change,2)}}%</span></dd>
                    @endif
                @endif
            @endforeach
<!--             <dt class="line-bg" >cex-eth</dt>
                <dd class="line-bg"><span class="up-text">¥9.02▲</span></dd>
                <dd class="line-bg">94169</dd>
                <dd class="line-bg"><span class="up-text">+9.93%</span></dd>

            <dt >零肆叁贰</dt>
                <dd ><span class="up-text">¥9▲</span></dd>
                <dd >73510</dd><dd><span class="down-text">--</span></dd>

            <dt class="line-bg" >随求</dt>
                <dd class="line-bg"><span class="up-text">¥9.17▲</span></dd>
                <dd class="line-bg">14219.0908</dd><dd  class="line-bg" ><span class="up-text">+5.7%</span></dd>

            <dt>玩客币社区</dt><dd><span class="up-text">¥8.35▲</span></dd>
                <dd >0</dd>
                <dd ><span class="down-text">--100%</span></dd>       -->
      </dl>
    </div>
    
    <div class="panel bgc-white">
      <h2>链克(玩客币)昨日矿场情况 <span class="fs-12 fc-gray">{{$wkcMine->updated_at}}</span></h2>
      <ul class="yesterday">
        <li>
          <h4>{{$wkcMine->count}}</h4>
          <span>挖矿总量</span> </li>
        <li>
          <h4>{{$wkcMine->height}}</h4>
          <span>区块高度</span> </li>
        <li>
          <h4>{{$wkcMine->onlineTime}}小时</h4>
          <span>人均在线时长</span> </li>
        <li>
          <h4>{{$wkcMine->width}}Mbps</h4>
          <span>人均带宽</span> </li>
        <li>
          <h4>{{$wkcMine->disk}}GB</h4>
          <span>人均存储</span> </li>
          <li>
          <h4>387856</h4>
          <span>当前矿机数量</span> </li>
      </ul>
    </div>
    <div class="panel bgc-white">
      <h2>更多玩客云/链克/暴风技术讨论、交易请加QQ群<span class="fc-red">523683643</span>&nbsp;&nbsp;
        <a target="_blank" href="https://jq.qq.com/?_wv=1027&k=59r1KdS"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="玩客币交流切磋群" title="玩客云/链克/暴风交流" style="display:inline"></a>
      </h2>
    </div>
</section>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

<script>  
    function myrefresh() {  
        window.location.reload();  
    }  
    var time;  
  
    time = getNowFormatDate();  
  
    $("#time").html(time);  
    function getNowFormatDate() {  
        var date = new Date();  
        var seperator1 = "-";  
        var seperator2 = ":";  
        var month = date.getMonth() + 1;  
        var strDate = date.getDate();  
        if (month >= 1 && month <= 9) {  
            month = "0" + month;  
        }  
        if (strDate >= 0 && strDate <= 9) {  
            strDate = "0" + strDate;  
        }  
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate  
            + " " + date.getHours() + seperator2 + date.getMinutes()  
            + seperator2 + date.getSeconds();  
        return currentdate;  
    }  
  
    setTimeout('myrefresh()', 30000); //指定1秒刷新一次  
  
    //还有几秒；  
  
    var i = 30;  
    var intervalid;  
    intervalid = setInterval("fun()", 1000);  
    function fun() {  
        if (i == 0) {  
            clearInterval(intervalid);  
        }  
        document.getElementById("mes").innerHTML = '倒计时' + i + "秒刷新";  
        i--;  
    }  
  
</script>  

</body>
</html>