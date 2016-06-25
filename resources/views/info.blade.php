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
                @if ($next_level <= 5)
                <a href="{{url('level/'.$next_level)}}" class="abs infoBtn2"><img src="{{asset('assets/images/infoBtn2.png')}}"></a>
                @else
                <a href="{{url('/')}}" class="abs infoBtn2"><img src="{{asset('assets/images/infoBtn2.png')}}"></a>
                @endif
                <a href="javascript:void(0);" onClick="showShareNote();" class="abs infoBtn3"><img src="{{asset('assets/images/infoBtn3.png')}}"></a>
            </div>
    </div>
</div>
