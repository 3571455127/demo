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


<form method='post'   id="myform"  action="<?php echo U('Config/dosite');?>">
<table cellpadding=0 cellspacing=0 width="100%" class="table_form" >

	<tr>
		<th style="width:120px;"><?php echo L('PAGE_LISTROWS');?>:</th>
		<td><input name="PAGE_LISTROWS" type="text"  class="input-text" size="5" id="PAGE_LISTROWS" value="<?php echo ($PAGE_LISTROWS); ?>"></td>
	</tr>


	<tr>
		<th><?php echo L('URL_MODEL');?>:</th>
		<td><?php echo Form::select(array('field'=>'URL_MODEL','options'=>$urlmodelarr,'setup'=>array('onchange'=>'urlrule(this.value)')),$URL_MODEL);?>
		</td>
	</tr>

	<tr id="urlrule">
		<th><?php echo L('URL_Urlrule');?>:</th>
		<td><?php echo Form::select(array('field'=>'URL_URLRULE','options'=>$Urlrule),$URL_URLRULE);?></td>
	</tr>


	<tr>
	  <th><?php echo L('URL_PATHINFO_DEPR');?>:</th>
	  <td><input name="URL_PATHINFO_DEPR" type="text" class="input-text" id="URL_PATHINFO_DEPR" value="<?php echo ($URL_PATHINFO_DEPR); ?>" size="20" /></td>
	  </tr>
	<tr>
		<th><?php echo L('URL_HTML_SUFFIX');?>:</th>
		<td><input name="URL_HTML_SUFFIX" type="text" class="input-text" id="URL_HTML_SUFFIX" value="<?php echo ($URL_HTML_SUFFIX); ?>"></td>
	</tr>

	<tr>
		<th><?php echo L('LAYOUT_ON');?>:</th>
		<td><?php echo Form::select(array('field'=>'LAYOUT_ON','options'=>$openarr),$LAYOUT_ON);?>
		</td>
	</tr>

	<tr>
		<th><?php echo L('TOKEN_ON');?>:</th>
		<td><?php echo Form::select(array('field'=>'TOKEN_ON','options'=>$openarr),$TOKEN_ON);?>
		</td>
	</tr>
	<tr>
		<th><?php echo L('TOKEN_NAME');?>:</th>
		<td><input name="TOKEN_NAME" type="text" class="input-text"  id="TOKEN_NAME" value="<?php echo ($TOKEN_NAME); ?>">

		</td>
	</tr>
	<tr>
		<th><?php echo L('TMPL_CACHE_ON');?>:</th>
		<td><?php echo Form::select(array('field'=>'TMPL_CACHE_ON','options'=>$openarr),$TMPL_CACHE_ON);?>
		</td>
	</tr>
	<tr>
		<th><?php echo L('TMPL_CACHE_TIME');?>:</th>
		<td><input name="TMPL_CACHE_TIME" type="text" class="input-text" id="TMPL_CACHE_TIME" value="<?php echo ($TMPL_CACHE_TIME); ?>"> </td>
	</tr>
	<tr>
		<th><?php echo L('HTML_CACHE_ON');?>:</th>
		<td><?php echo Form::select(array('field'=>'HTML_CACHE_ON','options'=>$openarr),$HTML_CACHE_ON);?></td>
	</tr>
	<tr>
		<th><?php echo L('HTML_CACHE_TIME');?>:</th>
		<td><input name="HTML_CACHE_TIME" type="text" class="input-text"  id="HTML_CACHE_TIME" value="<?php echo ($HTML_CACHE_TIME); ?>"> </td>
	</tr>
	<tr>
		<th><?php echo L('HTML_READ_TYPE');?>:</th>
		<td><?php echo Form::select(array('field'=>'HTML_READ_TYPE','options'=>$readtypearr),$HTML_READ_TYPE);?>
		</td>
	</tr>
	<tr>
		<th><?php echo L('HTML_FILE_SUFFIX');?>:</th>
		<td><input name="HTML_FILE_SUFFIX" type="text" class="input-text"  id="HTML_FILE_SUFFIX" value="<?php echo ($HTML_FILE_SUFFIX); ?>">

		</td>
	</tr>
	<tr>
		<th>ADMIN_ACCESS:</th>
		<td><input name="ADMIN_ACCESS" type="text"  class="input-text" size="40" id="ADMIN_ACCESS" value="<?php echo ($ADMIN_ACCESS); ?>"> </td>
	</tr>
	<tr>
		<th><?php echo L('HOME_ISHTML');?>:</th>
		<td><?php echo Form::select(array('field'=>'HOME_ISHTML','options'=>$openarr),$HOME_ISHTML);?></td>
	</tr>
	<tr>
		<th><?php echo L('ADMIN_VERIFY');?>:</th>
		<td><?php echo Form::select(array('field'=>'ADMIN_VERIFY','options'=>$openarr),$ADMIN_VERIFY);?></td>
	</tr>

	<tr>
		<th><?php echo L('COOKIE_PATH');?>:</th>
		<td><input name="COOKIE_PATH" type="text" class="input-text" id="COOKIE_PATH" value="<?php echo ($COOKIE_PATH); ?>"> </td>
	</tr>
	<tr>
		<th><?php echo L('COOKIE_DOMAIN');?>:</th>
		<td><input name="COOKIE_DOMAIN" type="text" class="input-text" id="COOKIE_DOMAIN" value="<?php echo ($COOKIE_DOMAIN); ?>"> </td>
	</tr>
	<tr>
		<th><?php echo L('DEFAULT_LANG');?>:</th>
		<td><?php echo Form::select(array('field'=>'DEFAULT_LANG','options'=>$Lang,'options_key'=>'key,name'),$DEFAULT_LANG);?></td>
	</tr>
</table>
<div class="btn">
<INPUT TYPE="submit"  value="<?php echo L('save');?>" class="button buttonBtn" >
<input TYPE="reset"  value="<?php echo L('reset');?>" class="button">
</div>
</form>
</div>
<script>
function urlrule(m){

	if(m==1 || m==2){
	$('#urlrule').show();
	}else{
	$('#urlrule').hide();
	}
}
urlrule(<?php echo ($URL_MODEL); ?>);
</script>

</body>
</html>