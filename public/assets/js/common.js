//找到url中匹配的字符串
function findInUrl(str) {
    url = location.href;
    return url.indexOf(str) == -1 ? false : true;
}
//获取url参数
function queryString(key) {
    return (document.location.search.match(new RegExp("(?:^\\?|&)" + key + "=(.*?)(?=&|$)")) || ['', null])[1];
}

//产生指定范围的随机数
function randomNumb(minNumb, maxNumb) {
    var rn = Math.round(Math.random() * (maxNumb - minNumb) + minNumb);
    return rn;
}

var wHeight;
$(function() {
    wHeight = $(window).height();
    if (wHeight >= 980) {
        $('body').on('touchmove', function(e) {
            e.preventDefault();
        });
    }
    $('.shareNote').on('touchmove', function(e) {
        e.preventDefault();
    });
    if (wHeight < 980) {
        wHeight = 980;
    }
    $('.pageOuter,.page').height(wHeight);
    $('.h980').css('padding-top', (wHeight - 980) / 2 + 'px');
    //loadingLoadingImg();
});

function loadingLoadingImg() {
    var images = [];
    images.push("/assets/images/loading.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage0();
        }
    });
}

function goPage0() {
    $('.page0').show();
    loadingPage1();
}

function loadingPage1() {
    var images = [];
    images.push("/assets/images/page1Img1.png");
    images.push("/assets/images/page1Img2.png");
    images.push("/assets/images/page2Img1.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage1();
        }
    });
}

function goPage1() {
	var goSel=queryString('goSel');
	if(goSel=='goSel'){
		$('.page0').fadeOut(500);
		$('.page2').fadeIn(500);
		}
		else{
			$('.page0').fadeOut(500);
			$('.page1').fadeIn(500);
			$('.page1Img2').addClass('page1Img2Act').show();
			$(".page1Img2").touchwipe({
				min_move_x: 40, //横向灵敏度
				min_move_y: 40, //纵向灵敏度
				wipeUp: function() {
					goPage2();
				}, //向上滑动事件
				//wipeDown: function() { $("#val").append("下，");}, //向下滑动事件
				preventDefaultEvents: true //阻止默认事件
			});
			}
}

function goPage2() {
    $('.page1Img1').removeClass('page1Img1Act');
    $('.page1').addClass('upHide');
    $('.page2').addClass('downShow').show();
    setTimeout(function() {
        $('.page1').hide();
    }, 700);
}

var canClick = [1];

function getBtn1() {
    $('.btn1').addClass('btn1On');
}

function getBtn2() {
    canClick.push(2);
    $('.btn1').addClass('btn1On');
    $('.btn2').addClass('btn2On');
}

function getBtn3() {
    canClick.push(2, 3);
    $('.btn1').addClass('btn1On');
    $('.btn2').addClass('btn2On');
    $('.btn3').addClass('btn3On');
}

function getBtn4() {
    canClick.push(2, 3, 4);
    $('.btn1').addClass('btn1On');
    $('.btn2').addClass('btn2On');
    $('.btn3').addClass('btn3On');
    $('.btn4').addClass('btn4On');
}

function getBtn5() {
    canClick.push(2, 3, 4, 5);
    $('.btn1').addClass('btn1On');
    $('.btn2').addClass('btn2On');
    $('.btn3').addClass('btn3On');
    $('.btn4').addClass('btn4On');
    $('.btn5').addClass('btn5On');
}

/*page3*/
function loadingPage3() {
    var images = [];
    images.push("/assets/images/loading.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage03();
        }
    });
}

function goPage03() {
    $('.page0').show();
    loadingPage3Detail();
}

function loadingPage3Detail() {
    var images = [];
    images.push("/assets/images/page3Img1.png");
    images.push("/assets/images/page3Img21.png");
    images.push("/assets/images/page3Img22.png");
    images.push("/assets/images/page3Img3.png");
    images.push("/assets/images/page3Img4.png");
    images.push("/assets/images/infoBg.png");
    images.push("/assets/images/infoBg2.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage3();
        }
    });
}

function goPage3() {
    $('.page0').fadeOut(500);
    $('.page3').fadeIn(500);
    $('.page3Img1').addClass('page3Img1Act');
    setTimeout(function() {
        $('.page3Img21').addClass('page3Img2Left');
        $('.page3Img22').addClass('page3Img2Right');
        $('.p3a1').fadeOut(500);
        $('.p3a2').fadeIn(500);
        $('.p3a2Btn').delay(1000).fadeIn(500);
    }, 2500);
}

function goP3a3() {
    $('.p3a2').fadeOut(500);
    $('.p3a3').fadeIn(500);
    startGame3();
}

var g3Time;
var isG3End = false;

function startGame3() {
    $('.p3a3Btn .touchBtn').on('touchstart', function() {
        g3Time = setTimeout(function() {
            getGame3();
        }, 2000);
    });
    $('.p3a3Btn .touchBtn').on('touchend', function() {
        if (isG3End) {
            return false;
        } else {
            clearTimeout(g3Time);
        }
    });
}

function getGame3() {
    isG3End = true;
    $('.p3a3Btn img').off('touchstart');
    $('.p3a3Btn img').off('touchend');
    $('.p3a3').delay(500).fadeOut(500);
    $('.p3a4').delay(500).fadeIn(500);
    updateShare();
	//over1
}

/*page4*/
function loadingPage4() {
    var images = [];
    images.push("/assets/images/loading.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage04();
        }
    });
}

function goPage04() {
    $('.page0').show();
    loadingPage4Detail();
}

function loadingPage4Detail() {
    var images = [];
    images.push("/assets/images/page4Img1.png");
    images.push("/assets/images/page4Img21.png");
    images.push("/assets/images/page4Img22.png");
    images.push("/assets/images/page4Img3.png");
    images.push("/assets/images/page4Img4.png");
    images.push("/assets/images/infoBg.png");
    images.push("/assets/images/infoBg2.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage4();
        }
    });
}

function goPage4() {
    $('.page0').fadeOut(500);
    $('.page4').fadeIn(500);
    $('.page4Img1').addClass('page3Img1Act');
    setTimeout(function() {
        $('.page4Img21').addClass('page3Img2Left');
        $('.page4Img22').addClass('page3Img2Right');
        $('.p3a1').fadeOut(500);
        $('.p3a2').fadeIn(500);
        $('.p3a2Btn').delay(1000).fadeIn(500);
    }, 2500);
}

function goP4a3() {
    $('.p3a2').fadeOut(500);
    $('.p3a3').fadeIn(500);
    startGame4();
}

var g4Time;
var isG4End = false;

function startGame4() {
    $('.p3a3Btn .touchBtn').on('touchstart', function() {
        g4Time = setTimeout(function() {
            getGame4();
        }, 2000);
    });
    $('.p3a3Btn .touchBtn').on('touchend', function() {
        if (isG4End) {
            return false;
        } else {
            clearTimeout(g4Time);
        }
    });
}

function getGame4() {
    isG4End = true;
    $('.p3a3Btn img').off('touchstart');
    $('.p3a3Btn img').off('touchend');
    $('.p3a3').delay(500).fadeOut(500);
    $('.p3a4').delay(500).fadeIn(500);
    updateShare();
	//over2
}

/*page5*/
function loadingPage5() {
    var images = [];
    images.push("/assets/images/loading.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage05();
        }
    });
}

function goPage05() {
    $('.page0').show();
    loadingPage5Detail();
}

function loadingPage5Detail() {
    var images = [];
    images.push("/assets/images/page5Img1.png");
    images.push("/assets/images/page5Img21.png");
    images.push("/assets/images/page5Img22.png");
    images.push("/assets/images/page5Img3.png");
    images.push("/assets/images/page5Img4.png");
    images.push("/assets/images/infoBg.png");
    images.push("/assets/images/infoBg2.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage5();
        }
    });
}

function goPage5() {
    $('.page0').fadeOut(500);
    $('.page5').fadeIn(500);
    $('.page5Img1').addClass('page3Img1Act');
    setTimeout(function() {
        $('.page5Img21').addClass('page3Img2Left');
        $('.page5Img22').addClass('page3Img2Right');
        $('.p3a1').fadeOut(500);
        $('.p3a2').fadeIn(500);
        $('.p3a2Btn').delay(1000).fadeIn(500);
    }, 2500);
}

function goP5a3() {
    $('.p3a2').fadeOut(500);
    $('.p3a3').fadeIn(500);
}

function startGame5() {
    $('.page5Img6').fadeIn(500);
    $('.p3a3Btn').fadeOut(500);
}

function closeP5Img6() {
    $('.page5Img6').hide();
    canClear = true;
}

var doudouNumb = 0;
var canClear = false;

function clearDoudou(e) {
    if (canClear) {
        $(e).hide();
        doudouNumb++;
        if (doudouNumb == 9) {
            $('.p3a3').delay(500).fadeOut(500);
            $('.p3a4').delay(500).fadeIn(500);
            updateShare();
			//over3
        }
    }
}

/*page6*/
function loadingPage6() {
    var images = [];
    images.push("/assets/images/loading.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage06();
        }
    });
}

function goPage06() {
    $('.page0').show();
    loadingPage6Detail();
}

function loadingPage6Detail() {
    var images = [];
    images.push("/assets/images/page6Img1.png");
    images.push("/assets/images/page6Img21.png");
    images.push("/assets/images/page6Img22.png");
    images.push("/assets/images/page6Img3.png");
    images.push("/assets/images/page6Img4.png");
    images.push("/assets/images/infoBg.png");
    images.push("/assets/images/infoBg2.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage6();
        }
    });
}

function goPage6() {
    $('.page0').fadeOut(500);
    $('.page6').fadeIn(500);
    $('.page6Img1').addClass('page3Img1Act');
    setTimeout(function() {
        $('.page6Img21').addClass('page3Img2Left');
        $('.page6Img22').addClass('page3Img2Right');
        $('.p3a1').fadeOut(500);
        $('.p3a2').fadeIn(500);
        $('.p3a2Btn').delay(1000).fadeIn(500);
    }, 2500);
}

function goP6a3() {
    $('.p3a2').fadeOut(500);
    $('.p3a3').fadeIn(500);
}

function startGame6() {
    $('.page6Img6').fadeIn(500);
    $('.p3a3Btn').fadeOut(500);
}

function closeP6Img6() {
    $('.page6Img6').hide();
    game6Init();
}

var wTime;
var wInterval;

//按下标记
var onoff = false;
var oldx = 0;
var isFirst = 0; //初次点击

var outDiv = document.getElementById('page6Img3');
var x = 0; //画布X位置
var tempX = 0; //画布临时位置

function game6Init() {
    //添加手指移动事件
    outDiv.addEventListener("mousemove", draw, false);
    //添加手指按下事件
    outDiv.addEventListener("mousedown", down, false);
    //添加手指弹起事件
    outDiv.addEventListener("mouseup", up, false);

    //添加手指移动事件
    outDiv.addEventListener("touchmove", draw, false);
    //添加手指按下事件
    outDiv.addEventListener("touchstart", down, false);
    //添加手指弹起事件
    outDiv.addEventListener("touchend", up, false);

    wInterval = setInterval(function() {
        waterGo()
    }, 1000);
}

var wL = ['60px', '300px', '500px', '150px', '380px'];
var wS = 0;
var getW = 0;

function waterGo() {
    if (wS == 5) {
        wS = 0;
    }
    $('.page6Img5').css({
        'left': wL[wS],
        'top': '-120px'
    }).show();
    $('.page6Img5').stop().animate({
        top: 600
    }, 800, 'swing', function() {
        wS++;
    });
    setTimeout(function() {
        var g6i5Left = parseInt($('.page6Img3b').css('left'));
        if (((g6i5Left - 205) <= parseInt(wL[wS])) && ((g6i5Left + 210) >= (parseInt(wL[wS]) + 36))) {
            $('.page6Img5').hide();
            $('#testP').html(getW);
            getW++;
            $('.we').css('background-position', getW * (-39) + 'px');
            if (getW == 6) {
                clearInterval(wInterval);
                $('.p3a3').delay(1000).fadeOut(500);
                $('.p3a4').delay(1000).fadeIn(500);
                updateShare();
				//over4
            }
        }
    }, 450);
}

function down(event) {
    onoff = true;
    if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {
        oldx = event.targetTouches[0].pageX;
    } else if (/(Android)/i.test(navigator.userAgent)) {
        var touch = event.touches[0];
        oldx = touch.pageX;
    } else {
        oldx = event.pageX;
    }
}

function up() {
    onoff = false;
}

function draw(event) {
    if (onoff == true) {
        event.stopPropagation(); //禁止手势缩放
        event.preventDefault(); //在页面滑动时禁止事件

        tempX = parseInt($('.page6Img3b').css('left'));

        var newx;
        if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {
            newx = event.targetTouches[0].pageX;
        } else if (/(Android)/i.test(navigator.userAgent)) {
            var touch = event.touches[0];
            newx = touch.pageX;
        } else {
            newx = event.pageX;
        }
        var diffx = newx - oldx;
        if ((tempX + diffx) <= 120) {
            $('.page6Img3b').css({
                'left': '130px'
            })
        } else if ((tempX + diffx) >= 550) {
            $('.page6Img3b').css({
                'left': '550px'
            })
        } else {
            $('.page6Img3b').css({
                'left': tempX + diffx + 'px'
            })
        }

        oldx = newx;
    };
};

/*page7*/
function loadingPage7() {
    var images = [];
    images.push("/assets/images/loading.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage07();
        }
    });
}

function goPage07() {
    $('.page0').show();
    loadingPage7Detail();
}

function loadingPage7Detail() {
    var images = [];
    images.push("/assets/images/page7Img1.png");
    images.push("/assets/images/page7Img21.png");
    images.push("/assets/images/page7Img22.png");
    images.push("/assets/images/page7Img3.png");
    images.push("/assets/images/page7Img4.png");
    images.push("/assets/images/infoBg.png");
    images.push("/assets/images/infoBg2.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images, {
        each: function() {
            var status = $(this).data('loaded') ? 'success' : 'error';
            if (status == "success") {}
        },
        all: function() {
            goPage7();
        }
    });
}

function goPage7() {
    $('.page0').fadeOut(500);
    $('.page7').fadeIn(500);
    $('.page7Img1').addClass('page3Img1Act');
    setTimeout(function() {
        $('.page7Img21').addClass('page3Img2Left');
        $('.page7Img22').addClass('page3Img2Right');
        $('.p3a1').fadeOut(500);
        $('.p3a2').fadeIn(500);
        $('.p3a2Btn').delay(1000).fadeIn(500);
    }, 2500);
}

function goP7a3() {
    $('.p3a2').fadeOut(500);
    $('.p3a3').fadeIn(500);
}

function startGame7() {
    $('.page7Img6').fadeIn(500);
    $('.p3a3Btn').fadeOut(500);
}

function closeP7Img6() {
    $('.page7Img6').hide();
    game7Init();
}

function game7Init() {
    $('#page7Img3b').eraser({
        progressFunction: function(p) {
            var progress = parseInt((Math.round(p * 100)));
            if (progress >= 70) {
                $('#page7Img3b').eraser('clear');
                $('.p3a3').delay(1000).fadeOut(500);
                $('.p3a4').delay(1000).fadeIn(500);
                updateShare();
            }
        }
    });
}

function showShareNote() {
    $('.popBg').fadeIn(500);
    $('.shareNote').fadeIn(500);
}

function closeShareNote() {
    $('.popBg').fadeOut(500);
    $('.shareNote').fadeOut(500);
}

var canSubmitInfo = true;

function submitInfo(url) {
    var iName = $.trim($('.infoTxt1').val());
    var iTel = $.trim($('.infoTxt2').val());
    var iAddress = $.trim($('.infoTxt3').val());
    var pattern = /^1[3456789]\d{9}$/;
    if (iName == '') {
        alert('请输入姓名');
        return false;
    } else if (iTel == '' || !pattern.test(iTel)) {
        alert('请输入正确的手机号码');
        return false;
    } else if (iAddress == '') {
        alert('请输入地址');
        return false;
    }
    //ajax提交信息
    if (canSubmitInfo) {
        canSubmitInfo = false;
        $('.infoTxt').prop('disabled', true);
        $('.infoBtn1').hide();
        $.ajax(url, {
            data: {
                name: iName,
                mobile: iTel,
                address: iAddress
            },
            dataType: 'json',
            type: 'post',
            success: function(json) {
                if (json.ret == 0) {
                    //提交成功
                    alert('信息提交成功');
                } else {
                    $('.infoTxt').prop('disabled', true);
                    $('.infoBtn1').hide();
                    canSubmitInfo = true;
                }
            },
            error: function() {
                //提交失败
                $('.infoTxt').prop('disabled', false);
                $('.infoBtn1').show();
                canSubmitInfo = true;
            }
        })
    }
}

var canLottery = true;

function getLottery(url) {
    //ajax提交信息
    if (canLottery) {
        canLottery = false;
        $.ajax(url, {
            dataType: 'json',
            type: 'post',
            success: function(json) {
                if (json.ret == 0 && json.has_win == 1) {
                    $('.pageInfo1').fadeIn(500);
                } else {
                    canLottery = true;
                    $('.pageInfo2').fadeIn(500);
                    //alert(json.msg);
                }
            },
            error: function() {
                canLottery = true;
                $('.pageInfo2').fadeIn(500);
            }
        })

    }
}

var isPlay=true;
function bgmCon(){
	if(isPlay){
		isPlay=false;
		var bgm=document.getElementById('bgm');
		bgm.pause();
		$('.bgm1').hide();
		$('.bgm2').show();
		}
		else{
			isPlay=true;
			var bgm=document.getElementById('bgm');
			bgm.play();
			$('.bgm2').hide();
			$('.bgm1').show();
			}
	}
