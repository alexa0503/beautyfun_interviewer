@extends('layouts.app')
@section('content')

<div class="pageOuter">
	<div class="page page0" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="page0Img1 bgImg"></div>
            </div>
        </div>
    </div>

    <div class="page page4" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="p3a1">
                	<div class="page4Img1 bgImg"></div>
                </div>
            	<div class="p3a2" style="display:none;">
                	<div class="page4Img21 bgImg"></div>
                    <div class="page4Img22 bgImg"></div>
                    <div class="abs p3a2Btn" style="display:none;">
                    	<a href="javascript:void(0);" onClick="goP4a3();"><img src="{{asset('assets/images/page4Btn1.png')}}"></a>
                    </div>
                </div>
                <div class="p3a3" style="display:none;">
                	<div class="page4Img3 bgImg"></div>
                    <div class="abs p3a3Btn">
                    	<img src="{{asset('assets/images/page4Btn2.png')}}">
                        <canvas class="touchBtn" width="310" height="80"></canvas>
                    </div>
                </div>
                <div class="p3a4" style="display:none;">
                	<div class="page4Img4 bgImg"></div>
                    <div class="abs p3a4Btn">
                    	<a href="{{url('level/3')}}"><img src="{{asset('assets/images/page4Btn3.png')}}"></a>
                        <a href="javascript:void(0);" onClick="getLottery('{{url("lottery")}}');;"><img src="{{asset('assets/images/page4Btn4.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('info')

    <div class="page pageInfo2" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="pageInfoImg2 bgImg"></div>
                <a href="{{url('/?goSel=goSel')}}" class="abs infoBtn4"><img src="{{asset('assets/images/infoBtn4.png')}}"></a>
                <a href="javascript:void(0);" onClick="showShareNote();" class="abs infoBtn5"><img src="{{asset('assets/images/infoBtn5.png')}}"></a>
            </div>
        </div>
    </div>
</div>

<div class="popBg" style="display:none;"></div>
<img src="{{asset('assets/images/shareNote.png')}}" class="shareNote" onClick="closeShareNote();" style="display:none;">

@endsection
@section('scripts')
<script>
function updateShare(){
	shareData.imgUrl = '{{asset("assets/images/share_2.jpg")}}';
	shareData.title = '我成功拯救了尔康，尔康还送了我一份大礼！';
	shareData.desc = '单挑拯救世界！';
	wxShare(shareData);
	$.get('{{asset("unlock/3")}}');
}
$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	loadingPage4();
});
</script>
@endsection
