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
                    </div>
                </div>
                <div class="p3a4" style="display:none;">
                	<div class="page4Img4 bgImg"></div>
                    <div class="abs p3a4Btn">
                    	<a href="url('level/3')"><img src="{{asset('assets/images/page4Btn3.png')}}"></a>
                        <a href="javascript:void(0);" onClick="getLottery();"><img src="{{asset('assets/images/page4Btn4.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page pageInfo1" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="pageInfoImg1 bgImg"></div>
                <input type="text" class="infoTxt infoTxt1" maxlength="20">
                <input type="tel" class="infoTxt infoTxt2" maxlength="11">
                <input type="text" class="infoTxt infoTxt3" maxlength="40">
                <a href="javascript:void(0);" onClick="submitInfo();" class="abs infoBtn1"><img src="{{asset('assets/images/infoBtn1.png')}}"></a>
                <a href="url('/')" class="abs infoBtn2"><img src="{{asset('assets/images/infoBtn2.png')}}"></a>
                <a href="javascript:void(0);" onClick="showShareNote();" class="abs infoBtn3"><img src="{{asset('assets/images/infoBtn3.png')}}"></a>
            </div>
        </div>
    </div>

    <div class="page pageInfo2" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="pageInfoImg2 bgImg"></div>
                <a href="url('/')" class="abs infoBtn4"><img src="{{asset('assets/images/infoBtn4.png')}}"></a>
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
