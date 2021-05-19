<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo C('DEFAULT_CHARSET');?>" />
<title><?php echo L('welcome'); echo L('system_name');?></title>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Css/style.css" />
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.min.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/iframeTools.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.form.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.validate.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/MyDate/WdatePicker.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.colorpicker.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/my.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/swfupload.js"></script>

    <meta name="google-translate-customization" content="108d9124921d80c3-80e20d618ff053c8-g4f02ec6f3dba68b7-c"></meta>
<script language="JavaScript">
<!--
var ROOT =	 '__ROOT__';
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
function confirm_delete(url){
	art.dialog.confirm("<?php echo L('real_delete');?>", function(){location.href = url;});
}
$(window.parent.$("#main_loading").hide());
//-->
</script>
</head>
<body width="100%">
<div id="result" class="result none"></div>
<div class="mainbox">

<?php if(empty($_GET['isajax'])): ?><div id="nav" class="mainnav_title" <?php if(MODULE_NAME=='Product') : ?>style='height:81px;'<?php endif;?>>

	<div id="lang">
	<?php if(APP_LANG): parse_str($_SERVER['QUERY_STRING'],$urlarr); unset($urlarr[l]); $url='index.php?'.http_build_query($urlarr); foreach($Lang as $k=>$v){ $arrlang[] =$v['mark']; } $strlang = implode(',',$arrlang); ?>
		<?php if(is_array($Lang)): $i = 0; $__LIST__ = $Lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$langvo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($url); ?>&l=<?php echo ($langvo["mark"]); ?>" <?php if($langvo[mark]==$_SESSION['YP_lang']): ?>class="on"<?php endif; ?>><?php echo ($langvo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>    
<?php if(in_array($action_name,array('edit')) && $m !='Category') : ?>
<style>
    .goog-te-banner-frame{display: none !important;}
</style>
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: '<?php echo $strlang;?>', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php endif; endif; ?>
	</div>
	<ul>
            <?php if(MODULE_NAME=='Message') : ?>
            <a href="javascript:;" onclick='portexcel();'>导出excel</a>|
                <input type="hidden" name="ep" id='ep' value="<?php if($p) : echo ($p); else :?>1<?php endif;?>">
                <input type="hidden" name="elistRows" id='elistRows' value="<?php if($listRows) : echo ($listRows); else :?>15<?php endif;?>">
                <input type="hidden" name="em" id='em' value="<?php echo ($m['name']); ?>">
                <input type="hidden" name="emid" id='emid' value="<?php echo ($m['id']); ?>">
                <script>

                            function portexcel(){
                                    var ep = $('#ep').val();
                                    var listRows = $("select[name='listRows']").val();
                                    if(!listRows){
                                        listRows = $('#elistRows').val();
                                    }
                                    var title = $('#title').val();
                                    var status = $('#status').val();
                                    var em = $('#em').val();
                                    var emid = $('#emid').val();
                                    window.location.href="/index.php?g=Home&a=getExcel&ep="+ep+'&listRows='+listRows+'&title='+title+'&status='+status+'&em='+em+'&emid='+emid;

                                    //alert(ep+'|'+listRows+'|'+title+'|'+status+'|'+em);
                            }

                          
                </script>
            <?php endif;?>
            <?php if(MODULE_NAME=='Product') : ?>
            <a href="javascript:;" onclick='showinput();'>批量上传</a>|
<div id="showinput" class="d-bg">
    <div class="close-btn" onclick="hideinput();">X</div>
    <div><a href="__PUBLIC__/www/images/product.xls" download>下载模板</a></div>
        <form id="showinput" enctype="multipart/form-data" method="post" action="/index.php?g=Home&a=inputexcel">
        <div class="upload"><input type="file" name="fileToUpload" id="fileToUpload" /></div>
        <div style="text-align: center;"><input class="sbumit-btn" type="submit" value="提交" /></div>
        </form>
</div>
                
                <script>
function hideinput(){
$('#showinput').hide();
}
                            function showinput(){
                            $('#showinput').show();
//                                    var ep = $('#ep').val();
//                                    var listRows = $("select[name='listRows']").val();
//                                    if(!listRows){
//                                        listRows = $('#elistRows').val();
//                                    }
//                                    var title = $('#title').val();
//                                    var status = $('#status').val();
//                                    var em = $('#em').val();
//                                    var emid = $('#emid').val();
//                                    window.location.href="/index.php?g=Home&a=getExcel&ep="+ep+'&listRows='+listRows+'&title='+title+'&status='+status+'&em='+em+'&emid='+emid;

                                    //alert(ep+'|'+listRows+'|'+title+'|'+status+'|'+em);
                            }

                          
                </script>
            <?php endif;?>
            <a href="<?php echo U($nav[bnav][model].'/'.$nav[bnav][action],$nav[bnav][data]);?>"><?php echo ($nav["bnav"]["name"]); ?></a>|
	<?php if(is_array($nav["nav"])): $n = 0; $__LIST__ = $nav["nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vonav): $mod = ($n % 2 );++$n; if($vonav[data][isajax]): if($n>1) : ?>|<?php endif;?><a href="javascript:void(0);" onclick="openwin('<?php echo ($vonav[action]); ?>','<?php echo U($vonav[model].'/'.$vonav[action],$vonav[data]);?>','<?php echo ($vonav["name"]); ?>',600,440)"><?php echo ($vonav["name"]); ?></a>
	<?php else: ?>
	    <?php if($n>1) : ?>|<?php endif;?><a href="<?php echo U($vonav[model].'/'.$vonav[action],$vonav[data]);?>"><?php echo ($vonav["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?></ul>
<?php if(MODULE_NAME=='Product') : ?>
        <?php
 $enpwhere =array(); $enpwhere['lang'] = 0; $enpwhere['module'] = "Product"; $enpwhere['child'] = 0; $enprocates = M('category')->field('id,module,catname')->where($enpwhere)->order('id asc')->select(); ?>
<div class='formcopy'>
           选择  
        <?php if($_SESSION['YP_lang']) : ?>
                          语种
                          <select id='cLang'>
               <option value="">选择语种</option>
                <?php if(is_array($Lang)): $n = 0; $__LIST__ = $Lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>"><?php echo ($r["name"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select> 
                   栏目
            <select id='catid'>
               <option value="" rel=''>选择栏目</option>  
            </select> 
        <?php else :?>
            栏目
            <select id='catid'>
               <option value="" rel=''>选择栏目</option>
                <?php if(is_array($enprocates)): $n = 0; $__LIST__ = $enprocates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>" rel='<?php echo ($r["module"]); ?>'><?php echo ($r["catname"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>  
            </select>
        <?php endif;?>
           复制到
        <?php if($_SESSION['YP_lang']) : ?>
                    语种
                          <select id='cLang2'>
               <option value="">选择语种</option>
                <?php if(is_array($Lang)): $n = 0; $__LIST__ = $Lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>"><?php echo ($r["name"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>      
            </select>
                   栏目
            <select id='catid2'>
               <option value="" rel=''>选择栏目</option>     
            </select>  
        <?php else :?>
            栏目
            <select id='catid2'>
               <option value="" rel=''>选择栏目</option>
                <?php if(is_array($enprocates)): $n = 0; $__LIST__ = $enprocates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>" rel='<?php echo ($r["module"]); ?>'><?php echo ($r["catname"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>  
            </select>
        <?php endif;?>
            <span onclick="copypro();" style='padding:4px 13px;background: #1caf9a;color: #fff;cursor: pointer;'>确定复制</span>
 <script>
$("#cLang").change(function(){
        var cLang = $(this).val();
        if(cLang){
                $.ajax({
                     type:"POST",
                     url:'/index.php?g=Home&a=getLangCate',
                     data:'cLang='+cLang,
                     dataType:'json',
                     success:function(res){
var tbody = "";
var obj = res.enprocates;
$.each(obj, function (n, value) {
               var trs = "";
               trs += "<option value='" + value.id +"' rel='"+ value.module +"'>" + value.catname +"("+ value.id+ ")</option>";
               tbody += trs;
           });
$("#catid").append(tbody); 
                     }
                   }); 
        }
});
$("#cLang2").change(function(){
        var cLang = $(this).val();
        if(cLang){
                $.ajax({
                     type:"POST",
                     url:'/index.php?g=Home&a=getLangCate',
                     data:'cLang='+cLang,
                     dataType:'json',
                     success:function(res){
var tbody = "";
var obj = res.enprocates;
$.each(obj, function (n, value) {
               var trs = "";
               trs += "<option value='" + value.id +"' rel='"+ value.module +"'>" + value.catname +"("+ value.id+ ")</option>";
               tbody += trs;
           });
$("#catid2").append(tbody); 
                     }
                   }); 
        }
});
function copypro(){
var cLang = $('#cLang2').val();
var catid = $('#catid').val();
var catid2 = $('#catid2').val();
//alert(cLang);
//alert(catid);
//alert(catid2);
//return false;
if(catid && catid2){
                    $.ajax({
                     type:"POST",
                     url:'/index.php?g=Home&a=CopyProduct',
                     data:'catid='+catid+'&catid2='+catid2+'&cLang='+cLang,
                     dataType:'json',
                     success:function(res){
//                         $('.focusBox').html(res.str);
                         alert(res.str);
                     }
                   }); 
}else{
       alert('请确认选择栏目');
}
    
}
</script>                        
</div>
<?php endif;?>
	</div>
    <script>
	var onurl ='?<?php echo ($_SERVER["QUERY_STRING"]); ?>';
	jQuery(document).ready(function(){
		$('#nav ul a ').each(function(i){
		if($('#nav ul a').length>1){
			var thisurl= $(this).attr('href');
			thisurl = thisurl.replace('&menuid=<?php echo cookie("menuid");?>','');
			if(onurl.indexOf(thisurl) == 0 ) $(this).addClass('on').siblings().removeClass('on');
		}else{
			$('#nav').hide();
		}
		});
		if($('#nav ul a ').hasClass('on')==false){
		$('#nav ul a ').eq(0).addClass('on');
		}
	});
	</script><?php endif; ?>
<style>
   .d-bg{
        display: none;
        position: absolute;
    background: rgb(255, 255, 255);
    padding: 20px;
    box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.5);
    }
    .d-bg .close-btn{
        position: absolute;
        top: 0;
        right: 20px;
        color:#1caf9a;
        cursor: pointer;
        font-size: 18px;
    }
    .d-bg .sbumit-btn{
        padding: 5px 20px;
        border:none;
        cursor: pointer;
        font-size: 15px;
        margin-top: 10px;
        background: #F5F5F5;
        color: #333;
    }
    .d-bg .sbumit-btn:hover{
        color:#fff;
        background-color:#1caf9a ;
    }
    .d-bg  .mainnav_title a{
        font-size: 15px;
    }
    .d-bg  .upload {
margin: 10px ;
    }
    .d-bg  .upload input{
        cursor: pointer;
        font-size: 15px;
        color:#666; 
    }
</style>

  


<script>
if(self==top){
	window.top.location.href = '<?php echo U("Login/index");?>';
}

function menutype(leftmenuid){
    $(window.parent.$("#leftMenu ul li").removeClass("on"));
    $(window.parent.$("#li_"+leftmenuid).addClass("on"));
    $(window.parent.$("#li_"+leftmenuid).parents("dl").siblings().removeClass("on"));
    $(window.parent.$("#li_"+leftmenuid).parents("dl").addClass("on"));
    $(window.parent.$("#li_"+leftmenuid).parents("dl").siblings().find("dd").slideUp(300));
    $(window.parent.$("#li_"+leftmenuid).parents("dd").slideDown(300));
}
</script>

<style>

.mainnav_title{ display:none;}
h1 { height:30px;line-height:30px;font-size:14px; margin-bottom: 10px; overflow:hidden;zoom:1;}
h1 b {font-size: 16px;color:#E26A6A ;}
h1 span {color:#ccc;font-size:10px;margin-left:10px; font-weight: normal;}
.mainBox{padding: 20px 10px;}
.listBox{height:400px;padding:12px 20px 15px 20px; margin-bottom: 25px; border-radius: 3px; overflow: hidden; box-shadow:0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.22);width:40%;margin:15px;float:left;}
.listBox ul li {width: 50%; float: left; margin-bottom: 15px;}
.listBox ul li span{ display:block; float:left; color:#777;width:100px;}
.listItem{padding: 10px 15px; margin-right: 20px; border: 1px solid #ddd; border-radius: 4px;}

#tabs {margin:0px auto;overflow:hidden;border:1px solid #ccc; height:214px;}
#tabs .title {overflow:hidden;background:url(./Public/Images/tab_bottom_line_1.jpg) repeat-x 0 26px;height:27px;}
#tabs .title ul li {float:left;margin-left:-1px;height:26px;line-height:26px;background:#EAEEF4;padding:0px 10px;border:1px solid #ccc;border-top:0;border-bottom:0;}
#tabs .title ul li.on {background:#FFF;height:27px;}
#tabs .content_1 { overflow:hidden;border-top:none;}
#tabs .tabbox {display:none;padding:10px;}

#tabs .tabbox ul li {background:url(./Public/Images/ico_1.gif) no-repeat 4px 11px;padding-left:13px;border-bottom:1px #ddd dashed; height:27px;  line-height:26px;color:#333 }
#tabs .tabbox ul li a {color:#333}
#tabs .tabbox ul li a:hover {color:#FB0000;}
#tabs .tabbox ul li span.date {float:right;color:#777}
.linkBtn{margin: 15px 0 5px 0;}
.linkBtn ul li{width: 20%; float: left; text-align: center;}
.linkBtn ul li a{display: block; margin: 0 10px; padding: 20px 0; border-radius: 2px; overflow: hidden; font-size: 14px; color: #fff;}
.linkBtn ul li.li1 a{background-color: #89C4F4;}
.linkBtn ul li.li2 a{background-color: #E35B5A;}
.linkBtn ul li.li3 a{background-color: #44B6AE;}
.linkBtn ul li.li4 a{background-color: #8775A7;}
.linkBtn ul li.li5 a{background-color: #578ebe;}
.linkBtn ul li a:hover{opacity: .9;}
</style>


<div class="linkBtn">
    <ul class="clearfix">
        <li class="li1"><a href="?g=Admin&m=Config&a=index&menuid=84" onclick="menutype('84');">站点配置</a></li>
        <li class="li2"><a href="?g=Admin&m=Category&a=index&menuid=17" onclick="menutype('17');">栏目管理</a></li>
        <li class="li3"><a href="?g=Admin&m=Block&a=index&menuid=74" onclick="menutype('74');">碎片管理</a></li>
        <li class="li4"><a href="?g=Admin&m=Slide&a=index&menuid=77" onclick="menutype('77');">幻灯片管理</a></li>
        <li class="li5"><a href="?g=Admin&m=Link&a=index&menuid=53" onclick="menutype('53');">友情链接</a></li>
    </ul>
</div>
<div class="mainBox">
	<div id="Profile" class="listBox">
		<h1><b>展示中的产品</b></h1>
		<ul>
		<?php if(is_array($productinfo)): $i = 0; $__LIST__ = $productinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><div class="listItem"><?php echo ($v[title]); ?></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>

    <div id="sitestats" class="listBox">
        <h1><b>新闻</b></h1>
		<ul>
		<?php if(is_array($articleinfo)): $i = 0; $__LIST__ = $articleinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><div class="listItem"><?php echo ($v[title]); ?></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>

    <div id="sitestats" class="listBox">
		<h1><b>待处理留言</b></h1>
		<ul>
		<?php if(is_array($messageinfo)): $i = 0; $__LIST__ = $messageinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><div class="listItem"><?php echo ($v[com]); ?></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>

    <div id="sitestats" class="listBox">
		<h1><b>banner</b></h1>
		<ul>
		<?php if(is_array($slideinfo)): $i = 0; $__LIST__ = $slideinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
            <img src="<?php echo ($v[pic]); ?>" alt="" width="100%"/>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>





</body>
</html>