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


<script>
if(self==top){
	window.top.location.href = '<?php echo U("Login/index");?>';
}
function resetVerifyCode(){
	var timenow = new Date().getTime();
	document.getElementById('verifyImage').src= '<?php echo U("Home/Index/verify");?>#'+timenow;
}
</script>
<style>.mainnav_title{display:none;}</style>
<form id="myform" method='post' name="login" action="<?php echo U('Index/password');?>">
<table cellpadding=0 cellspacing=0 class="table_form" width="100%">
<tr><td width="140"><?php echo L('oldpassword');?></td><td><input type="password" class="input-text" name="oldpassword" validate=" required:true, minlength:5, maxlength:20"></td></tr>
<tr><td><?php echo L('newpassword');?></td><td><input type="password" class="input-text"  name="password" id="password" validate=" required:true, minlength:5, maxlength:20"></td></tr>
<tr><td><?php echo L('repassword');?></td><td><input type="password" class="input-text"  name="repassword" validate=" required:true,equalTo: '#password', minlength:5, maxlength:20"></td></tr>
<tr><td><?php echo L('verify');?></td><td><input type="text" class="input-text" size="6" name="verify"> <img SRC="<?php echo U('Home/Index/verify');?>" BORDER="0" ALT="<?php echo L('reverify');?>" id="verifyImage" onClick="resetVerifyCode()" style="cursor:pointer" align="absmiddle"></td></tr>
</table>
<div class="btn">
<INPUT TYPE="submit"  name="dosubmit" value="<?php echo L('dosubmit');?>" class="button buttonBtn" >
<input type="reset"  value="<?php echo L('cancel');?>" class="button">
</div>
</form>


</body>
</html>