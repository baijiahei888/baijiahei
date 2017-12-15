@extends('layouts.app')
@section('title',"this is title")
@section('keywords',"keywords")
@section('description',"description")

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">链克(玩客币)交易实时行情</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>交易平台</th>
                    <th>最新成交价</th>
                    <th>成交量</th>
                    <th>日涨幅</th>
                </tr>
            </thead>
            <tbody>
                @foreach($info->result as $key => $value)
                    @if (!strstr($value->dict->name,"虫洞",0))
                        @if ($value->change >= 0)
                            <tr class="success">
                        @elseif($value->change < 0)
                            <tr class="danger">
                        @else
                            <tr>
                        @endif
                                <!-- name -->
                                @if ($value->dict->name == '悠雨林')
                                    <td><a target="_blank" href="http://www.uyulin.com/?invit=MC916519" rel="nofollow">{{$value->dict->name}}</a></td>
                                @else
                                    <td>{{$value->dict->name}}</td>
                                @endif

                                <!-- cntPrice -->
                                @if (!strstr($value->change,"-"))
                                    <td>¥{{number_format($value->cnyPrice,2)}}▲</td>
                                @else
                                    <td>¥{{number_format($value->cnyPrice,2)}}▼</td>
                                @endif

                                <!-- count -->
                                <td>{{round($value->turnover,2)}}</td>

                                <!-- change -->
                                @if (!strstr($value->change,"-"))
                                    <td>+{{round($value->change,2)}}%</td>
                                @else
                                    <td>{{round($value->change,2)}}%</td>
                                @endif

                            </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="panel panel-default">
    <div class="panel-heading">链克(玩客币)昨日矿场详情</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>挖矿总量</th>
                    <th>区块高度</th>
                    <th>人均在线时长</th>
                </tr>
            </thead>
            <tbody>

                <tr class="info">
                    <td>{{$wkcMine->count}}</td>
                    <td>{{$wkcMine->height}}</td>
                    <td>{{$wkcMine->onlineTime}}小时</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>人均带宽</th>
                    <th>人均存储</th>
                    <th>当前矿机数量</th>
                </tr>
            </thead>
            <tbody>

                <tr class="info">
                    <td>{{$wkcMine->width}}Mbps</td>
                    <td>{{$wkcMine->disk}}GB</td>
                    <td>393456</td>
                </tr>
            </tbody>
        </table>
    </div>

     <p class="well text-center">更多玩客云/链克/暴风技术讨论、交易请加QQ群<span class="fc-red">523683643</span>&nbsp;&nbsp;
        <a target="_blank" href="https://jq.qq.com/?_wv=1027&k=59r1KdS"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="玩客币交流切磋群" title="玩客云/链克/暴风交流" style="display:inline"></a>
      </p>
</div>

<!--     <div style="text-align: center;">
        <script src="https://s13.cnzz.com/z_stat.php?id=1271333081&web_id=1271333081" language="JavaScript"></script>
    </div> -->
</div>


<script>  
    function myrefresh() {  
        getData();
        setTimeout('myrefresh()', 30000); //指定1秒刷新一次  
        times();
    }
    var time;  
    time = getNowFormatDate();  
    // $("#time").html(time);  

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
    times();
    //还有几秒；  
    function times() {
            document.getElementById("mes").innerHTML = "倒计时30秒刷新";  
            var i = 30;  
            var intervalid;  
            window.setInterval(function () {
                function fun() {  
                    if (i == 0) {  
                        i=30; 
                    }  
                    document.getElementById("mes").innerHTML = '倒计时' + i + "秒刷新";  
                    i--;  
                };
                fun();
            },1000);
        //intervalid = setInterval("fun()", 1000);  
    }
  
</script>  


<script type="text/javascript">
    function getData() {
        $.get("api/wkcdata",function(data,status){
            //alert("Data: " + data.code + "\nStatus: "+ status)
            for (var i = 0; i < data.result.length; i++) {
                if ( data.result[i].dict.name.match("虫洞") == null ){
                    $("dt").eq(i+1).text(data.result[i].dict.name); //name
                    if (data.result[i].change > 0 ){
                        $("dd span").eq(i*2).text("¥"+data.result[i].cnyPrice+"▲"); // buy
                    } else if (data.result[i].change == 0 ) { 
                        $("dd span").eq(i*2).text("¥"+data.result[i].cnyPrice); // buy
                    } else{
                        $("dd span").eq(i*2).text("¥"+data.result[i].cnyPrice+"▼"); // buy
                    }
                    $("dd").eq((i+1)*3+1).text(data.result[i].turnover); // 
                    if (data.result[i].change > 0 ){
                        $("dd span").eq(i*2+1).text("+"+data.result[i].change +"%"); // 
                    } else {
                        $("dd span").eq(i*2+1).text(data.result[i].change +"%"); // 
                    }
                }
            };
        })
    }
</script>
@endsection
