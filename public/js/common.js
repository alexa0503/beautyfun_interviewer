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

function loadingImg() {
    var images = [];
    images.push("images/end1Btn.png");
    images.push("images/end1Img1.png");
    images.push("images/end1Img2.png");
    images.push("images/end1Img3.png");
    images.push("images/end1Img4.png");
    images.push("images/end2Img1.png");

    images.push("images/shareImg.png");

    images.push("images/page1Img1.png");
    images.push("images/page1Img2.png");

    images.push("images/page21.jpg");
    images.push("images/page22.jpg");
    images.push("images/page23.jpg");
    images.push("images/page24.jpg");
    images.push("images/page25.jpg");

    images.push("images/page21Btn.png");
    images.push("images/page22Btn.png");
    images.push("images/page23Btn.png");
    images.push("images/page24Btn.png");
    images.push("images/page25Btn.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images,
        {
            each: function () {
                var status = $(this).data('loaded') ? 'success' : 'error';
                if (status == "success") {
                }
            },
            all: function () {
                goPage1();
            }
        });
}

function loadingImg1() {
    var images = [];
    images.push("images/fail1.png");
    images.push("images/page2Btn.png");
    images.push("images/page31.jpg");
    images.push("images/page31Btn.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images,
        {
            each: function () {
                var status = $(this).data('loaded') ? 'success' : 'error';
                if (status == "success") {
                }
            },
            all: function () {
            }
        });
}

function loadingImg2() {
    var images = [];
    images.push("images/fail2.png");
    images.push("images/page2Btn.png");
    images.push("images/page32.jpg");
    images.push("images/page32Btn.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images,
        {
            each: function () {
                var status = $(this).data('loaded') ? 'success' : 'error';
                if (status == "success") {
                }
            },
            all: function () {
            }
        });
}

function loadingImg3() {
    var images = [];
    images.push("images/fail3.png");
    images.push("images/page2Btn.png");
    images.push("images/page33.jpg");
    images.push("images/page33Btn.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images,
        {
            each: function () {
                var status = $(this).data('loaded') ? 'success' : 'error';
                if (status == "success") {
                }
            },
            all: function () {
            }
        });
}

function loadingImg4() {
    var images = [];
    images.push("images/fail4.png");
    images.push("images/page2Btn.png");
    images.push("images/page34.jpg");
    images.push("images/page34Btn.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images,
        {
            each: function () {
                var status = $(this).data('loaded') ? 'success' : 'error';
                if (status == "success") {
                }
            },
            all: function () {
            }
        });
}

function loadingImg5() {
    var images = [];
    images.push("images/fail5.png");
    images.push("images/page2Btn.png");
    images.push("images/page35.jpg");
    images.push("images/page35Btn.png");

    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images,
        {
            each: function () {
                var status = $(this).data('loaded') ? 'success' : 'error';
                if (status == "success") {
                }
            },
            all: function () {
            }
        });
}

$(document).ready(function () {
    var wHeigt;
    wHeigt = $(window).height();
    if (wHeigt < 832) {
        wHeigt = 832;
    }
    $('.page0').height(wHeigt);
    loadingImg();
});

function goPage1() {
    $('.page0').fadeOut(500);
    $('.page1').fadeIn(500);
}

var selNumb;
function selQus(e) {
    selNumb = e;
    $('.page1').fadeOut(500);
    switch (selNumb) {
        case 1:
            loadingImg1();
            $('.page2Img1').show();
            $('.popFail').addClass('popFail1');
            setTimeout(function () {
                $('.page2Img1').addClass('page2Img1Act');
                setTimeout(function () {
                    $('.page21Btns').fadeIn(500);
                }, 1200);
            }, 500);
            break;
        case 2:
            loadingImg2();
            $('.page2Img2').show();
            $('.popFail').addClass('popFail2');
            setTimeout(function () {
                $('.page2Img2').addClass('page2Img2Act');
                setTimeout(function () {
                    $('.page22Btns').fadeIn(500);
                }, 800);
            }, 500);
            break;
        case 3:
            loadingImg3();
            $('.page2Img3').show();
            $('.popFail').addClass('popFail3');
            setTimeout(function () {
                $('.page2Img3').addClass('page2Img3Act');
                setTimeout(function () {
                    $('.page23Btns').fadeIn(500);
                }, 800);
            }, 500);
            break;
        case 4:
            loadingImg4();
            $('.page2Img4').show();
            $('.popFail').addClass('popFail4');
            setTimeout(function () {
                $('.page2Img4').addClass('page2Img4Act');
                setTimeout(function () {
                    $('.page24Btns').fadeIn(500);
                }, 1200);
            }, 500);
            break;
        case 5:
            loadingImg5();
            $('.page2Img5').show();
            $('.popFail').addClass('popFail5');
            setTimeout(function () {
                $('.page2Img5').addClass('page2Img5Act');
                setTimeout(function () {
                    $('.page25Btns').fadeIn(500);
                }, 1200);
            }, 500);
            break;
        default:
            loadingImg1();
    }
    $('.page2').fadeIn(500);
    $('.page3Img').addClass('page3Img' + selNumb);
    $('.page3Btn').addClass('page3Btn' + selNumb);
}

function showFail() {
    $('.popBg').fadeIn(500);
    $('.popFail').fadeIn(500);
}

function closePop() {
    $('.popBg').fadeOut(500);
    $('.pop').fadeOut(500);
}

function goPage3() {
    $('.page2').fadeOut(500);
    $('.page3').fadeIn(500);
    $('.page3Img').addClass('page3ImgAct');
}

var canGoLottery = true;
function goLottery(url) {
    if (canGoLottery) {
        canGoLottery = false;//加锁
        //ajax请求抽奖
        var data = {_token:$("input[name='_token']").val()};
        //ajax成功
        $.ajax({
            url:url,
            data:data,
            dataType:'json',
            type:'post',
            success:function (json) {
                if ( json.ret == 0 && json.has_win == 1 ){
                    //中奖
                    $('.page3').fadeOut(500);
                    $('.page4').fadeIn(500);
                }
                else if ( json.ret == 0 && json.has_win == 0){
                    //不中奖
                    $('.page3').fadeOut(500);
                    $('.page5').fadeIn(500);
                }
                else{
                    alert(json.msg);
                    //ajax失败
                    canGoLottery=true;
                }
            },
            error:function () {
                alert('提交失败,请重试');
                //ajax失败
                canGoLottery=true;
            }
        })



    }
}

var canSubmit = true;
function submitInfo(url) {
    var iName = $.trim($('.page4Txt1').val());
    var iTel = $.trim($('.page4Txt2').val());
    var iAddress = $.trim($('.page4Txt3').val());
    var pattern = /^1\d{10}$/;
    if (iName == '') {
        alert('请输入姓名~');
        return false;
    }
    else if (iTel == '' || !pattern.test(iTel)) {
        alert('请输入正确的手机号');
        return false;
    }
    else if (iAddress == '') {
        alert('请输入收件地址');
        return false;
    }
    else {
        if (canSubmit) {
            canSubmit = false;
            var data = {
                _token: $("input[name='_token']").val(),
                name: iName,
                mobile: iTel,
                address: iAddress
            };
            //ajax提交信息
            $.ajax({
                url:url,
                dataType:'json',
                type:'post',
                data:data,
                success:function (json) {
                    if (json.ret == 0){
                        //ajax成功
                        $('.page4Pop').show();
                    }
                    else{
                        //ajax失败
                        canSubmit=true;
                        alert(json.msg);
                    }
                },
                error:function () {
                    //ajax失败
                    canSubmit=true;
                    alert('提交失败,请重试~')
                }
            })
        }
    }
}

function showShare() {
    $('.popBg').fadeIn(500);
    $('.popShare').fadeIn(500);
}

function playAgain() {
    window.location.reload();
}