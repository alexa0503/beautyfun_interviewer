<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>{{env('PAGE_TITLE')}}</title>
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    <script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('js/jquery.imgpreload.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>

    <!--移动端版本兼容 -->
    <script type="text/javascript">
        var phoneWidth =  parseInt(window.screen.width);
        var phoneScale = phoneWidth/640;
        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)){
            var version = parseFloat(RegExp.$1);
            if(version>2.3){
                document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
            }else{
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>
    <!--移动端版本兼容 end -->

</head>

@yield('content')

        <!-- JavaScripts -->

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="http://wx.addechina.net/resources/Scripts/weixinjssdk.js"></script>
<script type="text/javascript">
    var shareData = {
        'title': '{{env("WECHAT_SHARE_TITLE")}}',
        'desc': '{{env("WECHAT_SHARE_DESC")}}',
        'link': '{{env("APP_URL")}}',
        'imgUrl': '{{env("APP_URL")}}' + '{{env("WECHAT_SHARE_IMG")}}'
    }
    // 可设置为 true 以调试
    DATAForWeixin.debug = true;
    //账号的appid
    DATAForWeixin.appId = '{{env("WECHAT_APPID")}}';
    DATAForWeixin.openid = '';
    DATAForWeixin.sharecampaign = '{{env("WECHAT_CAMPAIGN_NAME")}}';//campaign名称

    /* 请修改以下文字和图片，定制分享文案 */
    DATAForWeixin.setTimeLine({
        title: shareData.desc,
        imgUrl: shareData.imgUrl,
        link: shareData.link
        //success:function(){}
    });
    DATAForWeixin.setAppMessage({
        title: shareData.title,
        desc: shareData.desc,
        imgUrl: shareData.imgUrl,
        link: shareData.link
        //success:function(){}
    });
    DATAForWeixin.setQQ({
        title: shareData.title,
        desc: shareData.desc,
        imgUrl: shareData.imgUrl,
        link: shareData.link
    });

</script>
</body>
</html>
