<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>{{env('PAGE_TITLE')}}</title>
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    <script>
	var needToInfo=false;
        var shareData = {
            'title': '{{env("WECHAT_SHARE_TITLE")}}',
            'desc': '{{env("WECHAT_SHARE_DESC")}}',
            'link': '{{env("APP_URL")}}',
            'imgUrl': '{{env("APP_URL")}}' + '{{env("WECHAT_SHARE_IMG")}}'
        }
        function wxShare(data) {
            /* 请修改以下文字和图片，定制分享文案 */
            DATAForWeixin.setTimeLine({
                title: data.title,
                imgUrl: data.imgUrl,
                link: data.link
                //success:function(){}
            });
            DATAForWeixin.setAppMessage({
                title: data.title,
                desc: data.desc,
                imgUrl: data.imgUrl,
                link: data.link
                //success:function(){}
            });
            DATAForWeixin.setQQ({
                title: data.title,
                desc: data.desc,
                imgUrl: data.imgUrl,
                link: data.link
            });
        }
        function updateShare() {
            shareData.title = '【{{json_decode(\Session::get("wechat.nickname"))}}】'+'参加了职场招聘大会，获得面试官的青睐，静待Offer！';
            shareData.dec = '听说，表现得好还有神秘大礼和好职位申请哦~';
            wxShare(shareData);
        }
    </script>
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
    // 可设置为 true 以调试
    DATAForWeixin.debug = false;
    //账号的appid
    DATAForWeixin.appId = '{{env("WECHAT_APPID")}}';
    DATAForWeixin.openid = '';
    DATAForWeixin.sharecampaign = '{{env("WECHAT_CAMPAIGN_NAME")}}';//campaign名称
@if(null == $info)
    wxShare(shareData);
@else
    updateShare();
@endif

@if($info != null && $info->name == null && $info->has_win == 1)
	needToInfo=true;
@endif
</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?0f140859aee948a0688beea164bd6667";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>
