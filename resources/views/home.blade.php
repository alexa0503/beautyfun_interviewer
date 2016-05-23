@extends('layouts.app')

@section('content')
	<audio src="images/bgm.mp3" id="bgm" preload="auto" autoplay loop style="display:none; height:0;"></audio>

    <div class="pageOuter">
        <div class="page page0">
            <div class="innerDiv">
                <div class="loading loadingAct"></div>
            </div>
        </div>
        <div class="page page1" style="display:none;">
            <div class="page1Img1 page1Img1Act"></div>
            <div style="-webkit-transform:scale(0.85); -webkit-transform-origin:320px 0;">
            <div class="page1Img2 page1Img2Act">
                <div class="innerDiv">
                    <a href="javascript:void(0);" class="abs page1Btn1" onClick="selQus(1);"><img src="{{asset('images/space.gif')}}" width="308" height="212"></a>
                    <a href="javascript:void(0);" class="abs page1Btn2" onClick="selQus(2);"><img src="{{asset('images/space.gif')}}" width="272" height="210"></a>
                    <a href="javascript:void(0);" class="abs page1Btn3" onClick="selQus(3);"><img src="{{asset('images/space.gif')}}" width="286" height="210"></a>
                    <a href="javascript:void(0);" class="abs page1Btn4" onClick="selQus(4);"><img src="{{asset('images/space.gif')}}" width="278" height="210"></a>
                    <a href="javascript:void(0);" class="abs page1Btn5" onClick="selQus(5);"><img src="{{asset('images/space.gif')}}" width="271" height="210"></a>
                </div>
            </div>
            </div>
        </div>
        <div class="page page2" style="display:none;">
            <div class="page2Img1" style="display:none;">
                <div class="page21Btns" style="display:none;">
                    <div class="innerDiv">
                        <a href="javascript:void(0);" class="page2Btn1" onClick="showFail();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                        <a href="javascript:void(0);" class="page2Btn2" onClick="goPage3();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                    </div>
                </div>
            </div>
            <div class="page2Img2" style="display:none;">
            	<img src="{{asset('images/page22.png')}}" class="abs page22Txt" style="display:none;">
                <div class="page22Btns" style="display:none;">
                    <div class="innerDiv">
                        <a href="javascript:void(0);" class="page2Btn1" onClick="showFail();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                        <a href="javascript:void(0);" class="page2Btn2" onClick="goPage3();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                    </div>
                </div>
            </div>
            <div class="page2Img3" style="display:none;">
            	<img src="{{asset('images/page23.png')}}" class="abs page23Txt" style="display:none;">
                <div class="page23Btns" style="display:none;">
                    <div class="innerDiv">
                        <a href="javascript:void(0);" class="page2Btn1" onClick="showFail();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                        <a href="javascript:void(0);" class="page2Btn2" onClick="goPage3();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                    </div>
                </div>
            </div>
            <div class="page2Img4" style="display:none;">
                <div class="page24Btns" style="display:none;">
                    <div class="innerDiv">
                        <a href="javascript:void(0);" class="page2Btn1" onClick="showFail();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                        <a href="javascript:void(0);" class="page2Btn2" onClick="goPage3();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                    </div>
                </div>
            </div>
            <div class="page2Img5" style="display:none;">
                <div class="page25Btns" style="display:none;">
                    <div class="innerDiv">
                        <a href="javascript:void(0);" class="page2Btn1" onClick="showFail();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                        <a href="javascript:void(0);" class="page2Btn2" onClick="goPage3();"><img src="{{asset('images/space.gif')}}" width="238" height="99"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page3" style="display:none;">
            <div class="page3Img">
                <div class="innerDiv">
                    <div class="page3Btn">
                        <a href="javascript:void(0);" onClick="goLottery('{{url("lottery")}}');updateShare();" style="display:inline-block; width:100%; height:100%;">
                            <img src="{{asset('images/space.gif')}}" width="100%" height="100%">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page page4" style="display:none;">
            <div class="page4Img1"></div>
            <div class="page4Img2">
                <div class="innerDiv">
                    <input type="text" class="page4Txt page4Txt1" maxlength="20" value="@if($info != null && $info->name != null){{$info->name}}@endif">
                    <input type="tel" class="page4Txt page4Txt2" maxlength="11" value="@if($info != null && $info->mobile != null){{$info->mobile}}@endif">
                    <input type="text" class="page4Txt page4Txt3" maxlength="50" value="@if($info != null && $info->address != null){{$info->address}}@endif">
                    <a href="javascript:void(0);" class="abs page4Submit" onClick="submitInfo('{{url("post")}}');"><img src="{{asset('images/space.gif')}}" width="249" height="103"></a>
                    <img src="{{asset('images/end1Img4.png')}}" class="page4Pop abs" style="@if($info == null || $info->name == null || $info->mobile == null || $info->address == null || $info->has_win == 0)display:none;@endif">
                </div>
            </div>
            <div class="page4Img3"></div>
            <div class="page4Btn">
                <div class="innerDiv">
                    <a href="javascript:void(0);" class="abs page4Btn1" onClick="playAgain();"><img src="{{asset('images/space.gif')}}" width="239" height="107"></a>
                    <a href="javascript:void(0);" class="abs page4Btn2" onClick="showShare();"><img src="{{asset('images/space.gif')}}" width="239" height="107"></a>
                </div>
            </div>
        </div>

        <div class="page page5" style="display:none;">
            <div class="page5Img1"></div>
            <div class="page4Img3"></div>
            <div class="page4Btn">
                <div class="innerDiv">
                    <a href="javascript:void(0);" class="abs page4Btn1" onClick="playAgain();"><img src="{{asset('images/space.gif')}}" width="239" height="107"></a>
                    <a href="javascript:void(0);" class="abs page4Btn2" onClick="showShare();"><img src="{{asset('images/space.gif')}}" width="239" height="107"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="popBg" style="display:none;" onClick="closePop();"></div>
    <div class="pop popFail" style="display:none;">
        <div class="innerDiv">
            <a href="javascript:void(0);" class="abs page2Btn" onClick="closePop();"><img src="{{asset('images/page2Btn.png')}}"></a>
        </div>
    </div>
    <div class="pop popShare" onClick="closePop();" style="display:none;"></div>
    
    <a href="javascript:void(0);" class="bmgBtn" onClick="bgmCon();"><img src="{{asset('images/bgmBtn1.png')}}" class="bgm1"><img src="{{asset('images/bgmBtn2.png')}}" class="bgm2" style="display:none;"></a>
    
    {!! csrf_field() !!}
@endsection
