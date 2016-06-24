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

    <div class="page page7" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="p3a1">
                	<div class="page7Img1 bgImg"></div>
                </div>
            	<div class="p3a2" style="display:none;">
                	<div class="page7Img21 bgImg"></div>
                    <div class="page7Img22 bgImg"></div>
                    <div class="abs p3a2Btn" style="display:none;">
                    	<a href="javascript:void(0);" onClick="goP7a3();"><img src="{{asset('assets/images/page7Btn1.png')}}"></a>
                    </div>
                </div>
                <div class="p3a3" style="display:none;">
                	<div class="page7Img3 bgImg"></div>
                    <img src="{{asset('assets/images/page7Img3b.png')}}" id="page7Img3b">
                    <div class="abs p3a3Btn">
                    	<a href="javascript:void(0);" onClick="startGame7();"><img src="{{asset('assets/images/page7Btn2.png')}}"></a>
                    </div>
                    <img src="{{asset('assets/images/page7Img6.png')}}" class="bgImg page7Img6" onClick="closeP7Img6();" style="display:none;">
                </div>
                <div class="p3a4" style="display:none;">
                	<div class="page7Img4 bgImg"></div>
                    <div class="abs p3a4Btn">
                    	<a href="javascript:void(0);" onClick="showShareNote();"><img src="{{asset('assets/images/page7Btn3.png')}}"></a>
                        <a href="javascript:void(0);" onClick="getLottery('{{url("lottery")}}');"><img src="{{asset('assets/images/page7Btn4.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page pageInfo1" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="pageInfoImg1 bgImg"></div>
				@if ($info == null || $info->name == null)
                <input type="text" class="infoTxt infoTxt1" maxlength="20">
                <input type="tel" class="infoTxt infoTxt2" maxlength="11">
                <input type="text" class="infoTxt infoTxt3" maxlength="40">
                <a href="javascript:void(0);" onClick="submitInfo('{{url("post")}}');" class="abs infoBtn1"><img src="{{asset('assets/images/infoBtn1.png')}}"></a>
				@else
                <input type="text" class="infoTxt infoTxt1" maxlength="20" value="{{$info->name}}" disabled="true">
                <input type="tel" class="infoTxt infoTxt2" maxlength="11" value="{{$info->mobile}}" disabled="true">
                <input type="text" class="infoTxt infoTxt3" maxlength="40" value="{{$info->address}}" disabled="true">
				@endif
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
	loadingPage7();
});
</script>
@endsection
