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


<script type="text/javascript">
    document.title ="30S自动刷新网页 - www.liankeyun.org";
    setTimeout(function(){  //使用  setTimeout（）方法设定定时2000毫秒
    window.location.reload();//页面刷新
},30000);
</script>
@endsection
