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

    <div class="page page5" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="p3a1">
                	<div class="page5Img1 bgImg"></div>
                </div>
            	<div class="p3a2" style="display:none;">
                	<div class="page5Img21 bgImg"></div>
                    <div class="page5Img22 bgImg"></div>
                    <div class="abs p3a2Btn" style="display:none;">
                    	<a href="javascript:void(0);" onClick="goP5a3();"><img src="{{asset('assets/images/page5Btn1.png')}}"></a>
                    </div>
                </div>
                <div class="p3a3" style="display:none;">
                	<div class="page5Img3b bgImg"></div>
                	<div class="page5Img3 bgImg"></div>
                    <div class="abs p3a3Btn">
                    	<a href="javascript:void(0);" onClick="startGame5();"><img src="{{asset('assets/images/page5Btn2.png')}}"></a>
                    </div>
                    <div class="abs faceBlock">
                    	<div class="innerDiv">
                        	<img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img51" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img52" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img53" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img54" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img55" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img56" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img57" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img58" ontouchstart="clearDoudou(this);">
                            <img src="{{asset('assets/images/page5Img5.png')}}" class="abs page5Img59" ontouchstart="clearDoudou(this);">
                        </div>
                    </div>
                    <img src="{{asset('assets/images/page5Img6.png')}}" class="bgImg page5Img6" onClick="closeP5Img6();" style="display:none;">
                </div>
                <div class="p3a4" style="display:none;">
                	<div class="page5Img4 bgImg"></div>
                    <div class="abs p3a4Btn">
                    	<a href="{{url('level/4')}}"><img src="{{asset('assets/images/page5Btn3.png')}}"></a>
                        <a href="javascript:void(0);" onClick="getLottery('{{url("lottery")}}');;"><img src="{{asset('assets/images/page5Btn4.png')}}"></a>
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
	shareData.imgUrl = '{{asset("assets/images/share_3.jpg")}}';
	shareData.title = '我成功拯救了净王，净王还送了我一份大礼！';
	shareData.desc = '单挑拯救世界！';
	wxShare(shareData);
}
$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	loadingPage5();
});
</script>
@endsection
