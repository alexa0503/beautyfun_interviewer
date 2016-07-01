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

    <div class="page page6" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="p3a1">
                	<div class="page6Img1 bgImg"></div>
                </div>
            	<div class="p3a2" style="display:none;">
                	<div class="page6Img21 bgImg"></div>
                    <div class="page6Img22 bgImg"></div>
                    <div class="abs p3a2Btn" style="display:none;">
                    	<a href="javascript:void(0);" onClick="goP6a3();"><img src="{{asset('assets/images/page6Btn1.png')}}"></a>
                    </div>
                </div>
                <div class="p3a3" style="display:none;">
                	<div class="page6Img3b bgImg" style="left:340px;"></div><!--120px 550px-->
                    <img src="{{asset('assets/images/page6Img5.png')}}" class="abs page6Img5" style="display:none;">
                    <div class="abs we"></div>
                	<div class="page6Img3 bgImg" id="page6Img3"></div>
                    <div class="abs p3a3Btn">
                    	<a href="javascript:void(0);" onClick="startGame6();"><img src="{{asset('assets/images/page6Btn2.png')}}"></a>
                    </div>
                    <img src="{{asset('assets/images/page6Img6.png')}}" class="bgImg page6Img6" onClick="closeP6Img6();" style="display:none;">
                </div>
                <div class="p3a4" style="display:none;">
                	<div class="page6Img4 bgImg"></div>
                    <div class="abs p3a4Btn">
                    	<a href="{{url('level/5')}}"><img src="{{asset('assets/images/page6Btn3.png')}}"></a>
                        <a href="javascript:void(0);" onClick="getLottery('{{url("lottery")}}');;"><img src="{{asset('assets/images/page6Btn4.png')}}"></a>
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
	shareData.imgUrl = '{{asset("assets/images/share_4.jpg")}}';
	shareData.title = '我成功拯救了Andy，Andy还送了我一份大礼！';
	shareData.desc = '单挑拯救世界！';
	wxShare(shareData);
	$.get('{{asset("unlock/5")}}');
}
$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	loadingPage6();
});
</script>
@endsection
