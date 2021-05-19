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
            <a href="javascript:;" onclick='showinput();'>批量上传</a>|
<div id="showinput" style="    position: absolute;
    background: #fff;
    padding: 20px;
    border: 1px solid black;display: none;">
    <div onclick="hideinput();">X</div>
    <div><a href="__PUBLIC__/www/images/product.xls" download>下载模板</a></div>
        <form id="showinput" enctype="multipart/form-data" method="post" action="/index.php?g=Home&a=inputexcel">
        <div><input type="file" name="fileToUpload" id="fileToUpload" /></div>
        <div><input type="submit" value="Submit" /></div>
        </form>
</div>
                
                <script>
function hideinput(){
$('#showinput').hide();
}
                            function showinput(){
                            $('#showinput').show();
                            }

                          
                </script>
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
$('#nav ul a ').removeClass('on');
$('#nav ul').append('<a href="<?php echo U("Field/index",array(moduleid=>$_GET[moduleid]));?>" class="edit"><?php echo L(field_manage);?></a> | <a href="<?php echo U("Field/add",array(moduleid=>$_GET[moduleid]));?>" class="add"><?php echo L(field_add);?></a> |');
<?php if($action_name=='add'): ?>$('#nav ul a.add ').addClass('on');<?php endif; ?>
<?php if($action_name=='edit'): ?>$('#nav ul a.edit ').addClass('on');<?php endif; ?>



$.ajaxSetup ({ cache: false });
function field_setting(type)
{

	if(type=='verify'){
		$('#field_tr').hide();
		$('#field').val('verifyCode');
		$('#name').val('验证码');
		$('#pattern').val('en_num');
		$('#minlength').val('4');
		$('#maxlength').val('4');

		$('#required').attr("checked",true);
		$('#ispost_1').attr("checked",true);

	}else{
		$('#field_tr').show();
	}
    var data =  <?php echo (json_encode($vo["setup"])); ?>;
    var url =  "<?php echo U('Field/add');?>&isajax=1&moduleid=<?php echo ($moduleid); ?>&type="+type;
    $.ajax({
         type: "POST",
         url: url,
         data: data,
		 beforeSend:function(){
			$('#field_setup').html('<img src="./Public/Images/msg_loading.gif">');
		 },
         success: function(msg){
			$('#field_setup').html(msg);
         },
		 complete:function(){
		 },
		 error:function(){
		 }
    });
}
</script>



<form name="myform" id="myform" action="<?php if($action_name=='add'): echo U($module_name.'/insert'); else: echo U($module_name.'/update'); endif; ?>" method="post">
<input type="hidden" id="moduleid" name="moduleid" value="<?php echo ($moduleid); ?>"/>
<table cellpadding=0 cellspacing=0 class="table_form" width="100%">

	<tr>
		  <td width="140"><font color="red">*</font><?php echo L(field_type);?></td>
		  <td>
		  <select id="type" name="type" class="required" id="type" minlength="1" onchange="javascript:field_setting(this.value);" <?php if($action_name=='edit'): ?>disabled<?php endif; ?>>
		  <option value='' >请选择字段类型</option>
		  <option value="catid">栏目</option>
		  <option value="title">标题</option>
		  <option value="typeid">类别</option>
		  <option value="text" >单行文本</option>
		  <option value="textarea" >多行文本</option>
		  <option value="editor" >编辑器</option>
		  <option value="select" >下拉列表</option>
		  <option value="radio" >单选按钮</option>
		  <option value="checkbox" >复选框</option>
		  <option value="image" >单张图片</option>
		  <option value="images" >多张图片</option>
		  <option value="file" >单文件上传</option>
		  <option value="files" >多文件上传</option>
		  <option value="number" >数字</option>
		  <option value="datetime" >日期和时间</option>
		  <option value="posid" >推荐位</option>
		  <option value="groupid" >会员组</option>
		  <option value="linkage" >联动菜单</option>
          <option value="template" >模板选择</option>
		  <option value="verify" >验证码</option>
		  </select>
		  </td>
	</tr>

	<tr id="field_tr">
		  <td width="140"><font color="red">*</font><?php echo L(field_field);?></td>
		  <td><input type="text" id="field" name="field" value="<?php echo ($vo["field"]); ?>" class="input-text"
		  <?php if($action_name=='add'): ?>validate="required:true, english:true,remote: '<?php echo U($module_name.'/insert?isajax=1&moduleid='.$_GET['moduleid']);?>' ,minlength:2, maxlength:20"<?php endif; ?>  /> </td>
	</tr>
	<tr>
		  <td width="140"><font color="red">*</font><?php echo L(field_name);?> </td>
		<td><input type="text" id="name" name="name" value="<?php echo ($vo["name"]); ?>" class="input-text required" minlength="2"    maxlength="30" /> </td>
	</tr>

	<tr>
		  <td width="140"><?php echo L(field_setup);?></td>
		  <td id="field_setup">

		  </td>
	</tr>

	<tr>
		  <td width="140"><?php echo L(field_class);?></td>
		  <td><input type="text" id="class" name="class" value="<?php echo ($vo["class"]); ?>" size="10" class="input-text" /></td>
	</tr>
	<tr>
		  <td width="140"><?php echo L(field_required);?></td>
		  <td><input type="radio" id="required" name="required" value="1"<?php if($vo[required]==1): ?>checked<?php endif; ?>>是  <input type="radio" name="required" value="0" <?php if($vo[required]==0): ?>checked<?php endif; ?>> 否

		  </td>
	</tr>
	<tr>
		  <td width="140"><?php echo L(field_pattern);?>
		  </td>
		  <td><?php echo Form::select(array('field'=>'pattern','options'=>$field_pattern),$vo[pattern]);?>

		 </td>
	</tr>
	<tr>
		  <td width="140"><?php echo L(field_lange);?></td>
		  <td>
			最小 <input type="text" id="minlength" name="minlength" value="<?php echo ($vo["minlength"]); ?>" size="2" class="input-text" /> 最大 <input type="text" id="maxlength" name="maxlength" value="<?php echo ($vo["maxlength"]); ?>" class="input-text" size="2" />个字符
		  </td>
	</tr>
	<tr>
		  <td width="140"><?php echo L(field_errormsg);?></td>
		  <td>
			<input type="text" id="errormsg" name="errormsg" value="<?php echo ($vo["errormsg"]); ?>" class="input-text"  size="50" />
		  </td>
	</tr>
	<tr>
		  <td width="140"><?php echo L(field_post);?></td>
		  <td>
		  <?php echo Form::radio(array('field'=>'ispost','options'=>$options),$vo[ispost]);?>
		  </td>
	</tr>

		<tr>
		  <td width="140"><?php echo L(field_unpost_group);?></td>
		  <td>
		  <?php echo Form::checkbox(array('field'=>'unpostgroup','options'=>$usergroup,'setup'=>array('labelwidth'=>'90')),$vo[unpostgroup]);?>
		  </td>
	</tr>



</table>
<div  class="btn">
<?php if($vo['id']!=''): ?><input type="hidden" name="type" value="<?php echo ($vo["type"]); ?>" />
<input type="hidden" name="oldfield" value="<?php echo ($vo["field"]); ?>" />
<input TYPE="hidden" name="id" value="<?php echo ($vo["id"]); ?>"><?php endif; ?>
<INPUT TYPE="submit"  value="<?php echo L('dosubmit');?>" class="button buttonBtn" >
<input TYPE="reset"  value="<?php echo L('cancel');?>" class="button">
</div>
</form>

</div>


<script>
$('#type').val('<?php echo ($vo[type]); ?>');
field_setting('<?php echo ($vo[type]); ?>');

</script>
</body></html>

</body>
</html>