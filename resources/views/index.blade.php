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

    <div class="page page1" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="page1Img1 page1Img1Act bgImg"></div>
                <div class="page1Img2 bgImg"></div>
                <img src="{{asset('assets/images/downArrow.png')}}" class="downArrow">
            </div>
        </div>
    </div>

    <div class="page page2" style="display:none;">
    	<div class="h980">
        	<div class="innerDiv">
            	<div class="page2Img1 bgImg"></div>
                <div class="abs btn1" onClick="goAct(1);"></div>
                <div class="abs btn2" onClick="goAct(2);"></div>
                <div class="abs btn3" onClick="goAct(3);"></div>
                <div class="abs btn4" onClick="goAct(4);"></div>
                <div class="abs btn5" onClick="goAct(5);"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	loadingLoadingImg();
	getBtn{{$level}}();
});
function goAct(e){
	if(canClick.toString().indexOf(e)>=0){
		window.location.href= 'level/'+e;
		//window.location.href='act'+e+'.html';
	}
}
</script>
@endsection
