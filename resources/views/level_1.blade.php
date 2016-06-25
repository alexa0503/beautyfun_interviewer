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

    <div class="page page3" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="p3a1">
                	<div class="page3Img1 bgImg"></div>
                </div>
            	<div class="p3a2" style="display:none;">
                	<div class="page3Img21 bgImg"></div>
                    <div class="page3Img22 bgImg"></div>
                    <div class="abs p3a2Btn" style="display:none;">
                    	<a href="javascript:void(0);" onClick="goP3a3();"><img src="{{asset('assets/images/page3Btn1.png')}}"></a>
                    </div>
                </div>
                <div class="p3a3" style="display:none;">
                	<div class="page3Img3 bgImg"></div>
                    <div class="abs p3a3Btn">
                    	<img src="{{asset('assets/images/page3Btn2.png')}}">
                    </div>
                </div>
                <div class="p3a4" style="display:none;">
                	<div class="page3Img4 bgImg"></div>
                    <div class="abs p3a4Btn">
                    	<a href="{{url('level/2')}}"><img src="{{asset('assets/images/page3Btn3.png')}}"></a>
                        <a href="javascript:void(0);" onClick="getLottery('{{url("lottery")}}');;"><img src="{{asset('assets/images/page3Btn4.png')}}"></a>
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
                <a href="{{url('/')}}" class="abs infoBtn4"><img src="{{asset('assets/images/infoBtn4.png')}}"></a>
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
	shareData.imgUrl = '{{asset("assets/images/share_1.jpg")}}';
	shareData.title = '我成功拯救了花千骨，花千骨还送了我一份大礼！';
	shareData.desc = '单挑拯救世界！';
	wxShare(shareData);
}
$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	loadingPage3();
});
</script>
@endsection
