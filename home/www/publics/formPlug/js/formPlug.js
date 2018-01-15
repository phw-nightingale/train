$(function () {
    $('#plugHelp')
    // 邮箱,用于验证的正则表达式。 true：验证通过
    var vEmailMatch = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\\.[a-zA-Z0-9_-]{1,3}){1,2})$/";
    /**
     * 手机,用于验证的正则表达式。 true：验证通过
     * 这个表达式的意思是：
     1、以1为开头；
     2、第二位可为3,4,5,7,8,中的任意一位；  如需添加，则在[3,4,5,7,8] 里添加相应的号码
     3、最后以0-9的9个整数结尾。
     */
    var vPhoneMatch = /^[1][3,4,5,7,8][0-9]{9}$/;

    // 验证邮箱
    $('.vEmail').blur(function() {
        if (!$(this).val().match(eval(vEmailMatch))) {
            alert("邮箱格式不正确！");
        }
    });

    // 验证手机号码
    $('.vPhone').blur(function() {
        if (!$(this).val().match(eval(vPhoneMatch))) {
            alert("手机号码格式不正确！");
        }
    });

    /**
     * 输入框禁止修改
     */
    $('.disabled-input').mousedown(function (event) {
        event.stopPropagation();
        $(this).blur();
        return false;
    });
    $('.disabled-input').keyup(function (event) {
        event.stopPropagation();
        $(this).val("");
        $(this).blur();
        return false;
    });

    $('.disabled').click(function () {
        return false;
    });

    // 帮助
    $('#plugHelp').click(function () {
        if($(this).data('show') == "true"){
            $(this).data('show',"false");
            $(this).css("height","25px");
        }else{
            $(this).data('show',"true");
            $(this).css("height","auto");
        }
    });

    /**
     * 文本域
     */
    var textMax = $('.text-num > strong').text();
    $('.form-control').bind("input",function (event) {
        event.stopPropagation();
        var textNum = $(this).val().length;
        if(textNum > textMax){
            $(this).val($(this).val().substring(0,textMax));
            alert('最多只能填写'+textMax+'个字');
            $('.text-num > i').text(textMax);
            return false;
        }
        $('.text-num > i').text(textNum);
    });
    
    /**
     * 上传图片
     * @type {*|jQuery}
     */
    var imgMax = $('#upImgBtn').attr('imgMaxNum');
    $('#upImgBtn').click(function (event) {
        $('#upImg').trigger("click");
        event.stopPropagation();
    });
    var showImgHtml = "<img/>";
    $('#upImg').change(function () {
        var _URL = window.URL || window.webkitURL;
        var file, img;
        var img = new Array();
        for (var i = 0; i < this.files.length; i++) {
            img[i] = new Image();
            // 获取图片宽高
            // img.onload = function () {
            //     alert(this.width + " " + this.height);
            // };
            img[i].src = _URL.createObjectURL(this.files[i]);
        }
        if (img.length <= imgMax){
            $('#upImgBtn').html("");
            for(var i=0; i<img.length; i++){
                $('#upImgBtn').append(showImgHtml);
                $('#upImgBtn img').eq(i).attr("src",img[i].src)
            }
        }else{
            alert("上传的图片数量不能超过"+imgMax+"个");
        }
    });
});
