
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/12/27
 * Time: 15:48
 */

use app\assets\AppAsset;
AppAsset::register($this);

AppAsset::addCss($this,'@web/publics/resource/css/bootstrap.min.css');
AppAsset::addCss($this,'@web/publics/formPlug/css/formPlug.css');

AppAsset::addScript($this,'@web/publics/formPlug/js/formPlug.js');
AppAsset::addScript($this,'@web/publics/resource/js/lib/bootstrap.min.js');


?>
<strong id="plugHelp"><i>需导入的包说明（点击展开）：</i><br />
    css:<br />
    1、home/www/publics/resource/css/bootstrap.min.css<br />
    2、home/www/publics/formPlug/css/formPlug.css<br />
    js:<br />
    3、home/www/publics/formPlug/js/formPlug.js<br />
    3、home/www/publics/resource/js/lib/bootstrap.min.js<br /><br /><br />

    PHP 导入方式：<br /><br />
    use app\assets\AppAsset;<br />
    AppAsset::register($this);<br /><br />

    AppAsset::addCss($this,'@web/publics/resource/css/bootstrap.min.css');<br />
    AppAsset::addCss($this,'@web/publics/formPlug/css/formPlug.css');<br /><br />

    AppAsset::addScript($this,'@web/publics/formPlug/js/formPlug.js');<br />
    AppAsset::addScript($this,'@web/publics/resource/js/lib/bootstrap.min.js');<br /><br />
</strong>
<form class="bs-docs-example form-group">
    邮箱验证:<br />
    (使用说明：在需要验证邮箱的input标签中添加class:vEmail。该标签失去焦点时便会进行验证并提示)<br />
    添加class：<strong>vEmail</strong><br />
    <div class="input-group">
        <span class="input-group-addon">@</span>
        <input class="form-control vEmail" placeholder="Email" type="text" />
    </div>



    <br /><br />手机号码验证:<br />
    (使用说明：在需要验证邮箱的input标签中添加class:vPhone。该标签失去焦点时便会进行验证并提示)<br />
    添加class：<strong>vPhone</strong><br />
    <div class="input-group">
        <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>

        <input class="form-control vPhone" placeholder="Phone" type="text" />
    </div>

    <br /><br />禁止点击、点击失效<br />
    使用说明：<br />
    添加class：<strong>disabled</strong><br />
    按钮样式(添加class)：<strong>btn btn-default</strong><br />
    <a href="http://baidu.com" class="disabled">超链接</a>
    <button type="button" class="btn-default disabled btn">Button</button>
    <br /><br />禁止修改<br />
    使用说明：<br />
    添加class：<strong>form-control disabled-input</strong><br />
    <!--    并添加<strong>disabled</strong>属性<br />-->
    <input type="text" class="form-control disabled-input" placeholder="禁止修改"/>

    <br /><br />隐藏发送数据表单(不占位置)<br />
    使用说明：<br />
    添加class：<strong>hide-input</strong><br />
    <!--    并添加<strong>disabled</strong>属性<br />-->
    <input type="text" name="xxxxxxx" class="hide-input" placeholder="隐藏的表单"/>

    <br /><br />表格。复制粘贴就对了<br />
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>昵称</th>
            <th>性别</th>
            <th>年龄</th>
            <th>xxxx</th>
        </tr>
        <tr>
            <td>name1</td>
            <td>1</td>
            <td>3</td>
            <td>xx</td>
        </tr>
        <tr>
            <td>name2</td>
            <td>1</td>
            <td>3</td>
            <td>xx</td>
        </tr>
        <tr>
            <td>name3</td>
            <td>2</td>
            <td>3</td>
            <td>xx</td>
        </tr>
    </table>

    <br /><br />下拉框<br />
    使用说明：<br />
    button：<strong>触发下拉动作的按钮</strong><br />
    ul：<strong>下拉的内容</strong><br />
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>

    <br /><br />文本域<br />
    使用说明：<br />
    在<strong>textarea</strong>标签添加class：<strong>form-control</strong><br />
    rows：改变文本域的高度<br />
    text-num：为右下角显示当前字数与字数最大值限制<br />
    <strong> 填写在&lt; strong &gt;里面的值可以设置字数最大限制 </strong><br />
    <div class="textarea-box">
        <textarea class="form-control" rows="3"></textarea>
        <span class="text-num"><i>0</i> / <strong>1000</strong></span>
    </div>

    <br /><br />多个文件上传<br />
    使用说明：<br />
    按钮添加id：<strong>upImgBtn</strong><br />
    imgMaxNum参数：<strong>表示选择图片的最大数量限制</strong><br />
    上传图片的input标签添加id：<strong>upImg</strong><br />
    其他：<strong>复制粘贴就对了</strong><br />
    <div id="upImgBtn" imgMaxNum="10">点击批量添加图片</div>
    <input type="file" id="upImg" name="file" multiple="multiple"/>
</form>
<script>


</script>