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
            <a href="javascript:;" onclick='portexcel();'>??????excel</a>|
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
            <a href="javascript:;" onclick='showinput();'>????????????</a>|
<div id="showinput" class="d-bg">
    <div class="close-btn" onclick="hideinput();">X</div>
    <div><a href="__PUBLIC__/www/images/product.xls" download>????????????</a></div>
        <form id="showinput" enctype="multipart/form-data" method="post" action="/index.php?g=Home&a=inputexcel">
        <div class="upload"><input type="file" name="fileToUpload" id="fileToUpload" /></div>
        <div style="text-align: center;"><input class="sbumit-btn" type="submit" value="??????" /></div>
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
           ??????  
        <?php if($_SESSION['YP_lang']) : ?>
                          ??????
                          <select id='cLang'>
               <option value="">????????????</option>
                <?php if(is_array($Lang)): $n = 0; $__LIST__ = $Lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>"><?php echo ($r["name"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select> 
                   ??????
            <select id='catid'>
               <option value="" rel=''>????????????</option>  
            </select> 
        <?php else :?>
            ??????
            <select id='catid'>
               <option value="" rel=''>????????????</option>
                <?php if(is_array($enprocates)): $n = 0; $__LIST__ = $enprocates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>" rel='<?php echo ($r["module"]); ?>'><?php echo ($r["catname"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>  
            </select>
        <?php endif;?>
           ?????????
        <?php if($_SESSION['YP_lang']) : ?>
                    ??????
                          <select id='cLang2'>
               <option value="">????????????</option>
                <?php if(is_array($Lang)): $n = 0; $__LIST__ = $Lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>"><?php echo ($r["name"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>      
            </select>
                   ??????
            <select id='catid2'>
               <option value="" rel=''>????????????</option>     
            </select>  
        <?php else :?>
            ??????
            <select id='catid2'>
               <option value="" rel=''>????????????</option>
                <?php if(is_array($enprocates)): $n = 0; $__LIST__ = $enprocates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($n % 2 );++$n;?><option value="<?php echo ($r["id"]); ?>" rel='<?php echo ($r["module"]); ?>'><?php echo ($r["catname"]); ?>(<?php echo ($r["id"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>  
            </select>
        <?php endif;?>
            <span onclick="copypro();" style='padding:4px 13px;background: #1caf9a;color: #fff;cursor: pointer;'>????????????</span>
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
       alert('?????????????????????');
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

  

<script type="text/javascript" src="__ROOT__/Public/Js/jQuery.Hz2Py-min.min.js"></script>
<form name="myform"  id="myform"  action="<?php if($action_name=='add'): echo U('Category/insert'); else: echo U('Category/update'); endif; ?>&iscreatehtml=1" method="post">


<div id="tabs" style="margin-top:10px;">
	<div class="title"><ul class="clearfix" style="margin-left:30px;"><li class="on"><a href="javascript:void(0);"><?php echo L(base_setup);?></a></li>
	<li style="margin-left:10px;"><a href="javascript:void(0);"><?php echo L(seo_setup);?></a></li>
</ul></div>

<div class="content_2">
	<div class="tabbox" style="display:block;">
		<table cellpadding=0 cellspacing=0 class="table_form"width="100%"><tr>
		<td width="15%"><?php echo L('chose_module');?></td>
        <td width="85%" class="box_thumb">

		<script type="text/javascript" src="./Public/Js/swfupload.js"></script>
		<div class="thumb_box" style ="margin-top:-7px;left:340px;"><div id="image_aid_box"></div>
		<a href="javascript:swfupload('image_uploadfile','image','<?php echo L(uploadfiles);?>',1,1,0,1,'jpeg,jpg,png,gif',3,0,'<?php echo ($yourphp_auth); ?>',yesdo,nodo)"><img src="<?php if(!empty($vo['image'])): echo ($vo['image']); else: ?>./Public/Images/admin_upload_thumb.png<?php endif; ?>"  id="image_pic" ></a><br> <input type="button" value="<?php echo L('clean_thumb');?>" onclick="javascript:clean_thumb('image');" class="button" /><input type="hidden"  id="image" name="image"  value="<?php echo ($vo['image']); ?>" /><span class="thumb_tips"></span></div>
		<?php echo Form::select(array('field'=>'moduleid','options'=>$module+array('0'=>array('id'=>0,'title'=>L('Module_url'))),'options_key'=>'id,title','setup'=>array('onchange'=>'changetemplate(this.value)')),$vo['moduleid']);?>
		</td>
      </tr>
      <tr>
        <td><?php echo L('chose_parentid');?></td>
        <td>

		<select name="parentid">
		<option value=""><?php echo L('select_parentid');?></option>
		<?php echo ($select_categorys); ?>
		</select>
		</td>
      </tr>

      	<tr>
		<td>* <?php echo L('catname');?></td>
		<td><input type="text" name="catname" class="input-text  required"  id="catname" value="<?php echo ($vo['catname']); ?>"  minlength="1"  maxlength="100"  /></td>
		</tr>

	    <tr>
		<td>* <?php echo L('catdir');?></td>
		<td><input type="text" id="catdir" name="catdir" class="input-text  required" value="<?php echo ($vo['catdir']); ?>" validate="required:true, english:true,minlength:1, maxlength:100"/><span class="catdirBtn" onclick="catdir.value=($('#catname').toPinyin());"><?php echo L('pinyin');?></span></td>
		</tr>




		<tr id="module_url" style="display:none;">
		<td><?php echo L('cat_link_url');?></td>
		<td><input type="text" name="url" class="input-text"  value="<?php if($vo['type']==1): echo ($vo['url']); endif; ?>" size='50'  /><input type="hidden" id="type" name="type" value="0" /></td>
		</tr>


<!--
		<tr style="background:#EFEFEF;">
		<td><?php echo L('chage_is');?>: </td>
		<td><input type="checkbox"  class="input_checkbox "  id="chage_all" name="chage_all" value="1" /><font color="red"> <?php echo L('chage_all');?></font>
		</td>
		</tr>
-->
<tr>
<td>??????????????????: </td>
<td>
    <label for="ismenu0">???<input type="radio" id="ismenu0" name="ismenu" value="0"   <?php if(!$vo['ismenu']): ?>checked<?php endif; ?>/></label>&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="ismenu1">???<input type="radio" id="ismenu1" name="ismenu" value="1" <?php if($vo['ismenu']==1): ?>checked<?php endif; ?> /></label>
    
</td>
</tr>
<tr>
<td>??????????????????: </td>
<td>
    <label for="isfooter0">???<input type="radio" id="isfooter0" name="isfooter" value="0"   <?php if(!$vo['isfooter']): ?>checked<?php endif; ?>/></label>&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="isfooter1">???<input type="radio" id="isfooter1" name="isfooter" value="1" <?php if($vo['isfooter']==1): ?>checked<?php endif; ?> /></label>
    
</td>
</tr>

		<tr id="urlrule">
		<td><?php echo L('urlrule');?></td>
		<td><?php echo Form::select(array('field'=>'urlruleid','options'=>$Urlrule,'options_key'=>'key,listexample'),$vo['urlruleid']);?></td>
		</tr>


		<tr>
		<td><?php echo L('pagesize');?></td>
		<td><input type="text" name="pagesize" class="input-text" value="<?php if(!empty($vo['pagesize'])): echo ($vo['pagesize']); endif; ?>" size="3" /> <font color="red"><?php echo L('pagesize_desc');?></font></td>
		</tr>

		<tr>
		<td><?php echo L('template_list');?></td>
		<td>
		<select id="template_list" name="template_list"></select>
			</td>
		</tr>

		<tr>
		<td><?php echo L('template_show');?></td>
		<td><select id="template_show" name="template_show"></select>
		</td>
		</tr>
		</table>



	</div>

	<div class="tabbox" style="display:none;">
		<table cellpadding=0 cellspacing=0 class="table_form"width="100%">
		 <tr>
		  <td><?php echo L('seo_title');?></td>
		  <td><input name='title' type='text' id='meta_title' value="<?php echo ($vo['title']); ?>" class="input-text"  size='60' maxlength='150'></td>
		</tr>
		<tr>
		  <td><?php echo L('seo_keywords');?></td>
		  <td><input name='keywords' type='text' id='meta_keywords' value="<?php echo ($vo['keywords']); ?>" class="input-text"  size='60' maxlength='150'></td>
		</tr>
		<tr>
		  <td><?php echo L('seo_description');?></td>
		  <td><textarea name='description' id='meta_description'  rows="5" cols="60" ><?php echo ($vo['description']); ?></textarea></td>
		</tr>
                <tr>
		  <td>??????????????????</td>
		  <td>
                  <?php echo Form::editor(array('field'=>'catcont'),$vo['catcont']);?>
                  </td>
		</tr>
                <tr>
		  <td>??????????????????</td>
		  <td>
                  <?php echo Form::editor(array('field'=>'catcont2'),$vo['catcont2']);?>
                  </td>
		</tr>
		</table>
	</div>
</div>



		<div class="btn">
		<?php if($vo['id']!=''): ?><input TYPE="hidden" name="id" value="<?php echo ($vo["id"]); ?>"><?php endif; ?>
		<INPUT TYPE="submit"  value="<?php echo L('dosubmit');?>" class="button buttonBtn" >
		<input TYPE="reset"  value="<?php echo L('cancel');?>" class="button">
		</div>

</form></div>

<script>

var modulearr = new Array();
<?php if(is_array($module)): $i = 0; $__LIST__ = $module;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mdate): $mod = ($i % 2 );++$i;?>modulearr[<?php echo ($mdate['id']); ?>] = "<?php echo ($mdate['name']); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
var templatearr = new Array();
<?php if(is_array($templates)): $i = 0; $__LIST__ = $templates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tem): $mod = ($i % 2 );++$i;?>templatearr[<?php echo ($i); ?>] = "<?php echo ($tem['name']); ?>,<?php echo ($tem['value']); ?>,<?php echo ($tem['filename']); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>


var datas = "<option value=''><?php echo L('please_chose');?></option>";
var moduleid =  $('#moduleid').val();


showtemplist(moduleid,<?php if(empty($vo[listtype])): ?>0<?php else: echo ($vo["listtype"]); endif; ?>);
function showtemplist(m,t){
	var type='_list';
	if(t){type='_index';}
	var mtlist = modulearr[m]+type;
	var mtshow = modulearr[m]+'_show';
	if(modulearr[m]=='Page') mtlist=mtshow ='Page';
	$('#template_list').html(datas);
	$('#template_show').html(datas);
	listdatas = showdatas ='';
	for(i=1;i<templatearr.length;i++){
		data = templatearr[i].split(',');
		if(data[0].indexOf(mtlist)  >= 0){
			listdatas  ="<option value='"+data[1]+"'>"+data[2]+"</option>";
			$('#template_list').append(listdatas);
		}
		if(data[0].indexOf(mtshow)  >= 0){
			showdatas ="<option value='"+data[1]+"'>"+data[2]+"</option>";
			$('#template_show').append(showdatas);
		}
	}
	$("#template_list").attr("value",'<?php echo ($vo["template_list"]); ?>');
	$("#template_show").attr("value",'<?php echo ($vo["template_show"]); ?>');
}
function changetemplate(m){
	if(m==0){
		$('#module_url').show();
		$('#type').val('1');
		$('#catdir').removeClass('required');
	}else{
		$('#module_url').hide();
		$('#type').val('0');
		$('#catdir').addClass('required');
	}
	showtemplist(m,0);
	$("#listtype").removeAttr("checked");
}
function templatetype(){
	var moduleid = $('#moduleid').val();
	if($("#listtype").attr('checked')=='checked'){
		showtemplist(moduleid,1);
	}else{
		showtemplist(moduleid,0);
	}
}
new Tabs("#tabs",".title ul li",".content_2",".tabbox","on",1);


function urlrule(m){

	if(m==1){
		$('#urlrule').show();
	}else{
		$('#urlrule').hide();
	}
}
urlrule(<?php echo ($vo['ishtml']); ?>);


<?php if(!empty($_GET['type'])): ?>$('#moduleid').val(0);
changetemplate(0);<?php endif; ?>


</script>

</body>
</html>