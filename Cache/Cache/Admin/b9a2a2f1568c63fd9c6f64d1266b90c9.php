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


<style>
html{_overflow-y:scroll}
.swfupload {position: absolute;z-index: 1;}
.mainnav_title {display:none;}
</style>
<link rel="stylesheet" href="__ROOT__/Public/Js/dropzone/bootstrap.min.css">
  <link rel="stylesheet" href="__ROOT__/Public/Js/dropzone/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="__ROOT__/Public/Js/dropzone/dropzone.css">
  <script type="text/javascript" src="__ROOT__/Public/Js/jquery.min.js"></script>
  <script type="text/javascript" src="__ROOT__/Public/Js/dropzone/dropzone.js"></script>
<!--<script type="text/javascript" src="__ROOT__/Public/Js/swfupload/fileprogress.js"></script>-->
<!--<script type="text/javascript" src="__ROOT__/Public/Js/swfupload/handlers.js"></script>-->
  <style>
    html, body {
      height: 100%;
    }
    #actions {
      /*margin: 2em 0;*/
    }
    div.table {
      display: table;
    }
    div.table .file-row {
      display: table-row;
    }
    div.table .file-row > div {
      display: table-cell;
      vertical-align: top;
      border-top: 1px solid #ddd;
      padding: 8px;
    }
    div.table .file-row:nth-child(odd) {
      background: #f9f9f9;
    }
    #total-progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }
    #previews .file-row.dz-success .progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }
    #previews .file-row .delete {
      display: none;
    }
    #previews .file-row.dz-success .start,
    #previews .file-row.dz-success .cancel {
      display: none;
    }
    #previews .file-row.dz-success .delete {
      display: block;
    }
    .test{
        display:inline-block;
    }
    .dropzone{
            border:3px dashed #ddd;
            /*margin:20px;*/
            min-height: 50px;
            border-radius:5px;
            padding: 25px 25px;
            cursor: pointer;
        }
        .dropzone .dz-message{
            margin:0 auto;
        }
        .dz-filename{
            width: 124px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
        }
  </style>
  <div id="tabs">
  <div class="title"><ul><li class="on"><a href="javascript:void(0);"><?php echo L('upload_file');?></a></li>
	<li><a href="javascript:void(0);"><?php echo L('upload_url');?></a></li>
	<?php if(!empty($more)): ?><li><a href="javascript:void(0);" onclick="ajaxload(1,1,'filelist',<?php echo $isadmin;?>);"><?php echo L('upload_list_file');?></a></li>
	<li><a href="javascript:void(0);"  onclick="ajaxload(0,1,'nouselist',<?php echo $isadmin;?>);"><?php echo L('upload_unuse_file');?></a></li><?php endif; ?>
	<?php if(!empty($no_use_files)): ?><li style="border:0;background:none;"><a href="<?php echo U('Attachment/cleanfile?isadmin='.$isadmin);?>" style="color:#FB0000;"><?php echo L('no_use_files');?></a></li><?php endif; ?>
	</ul></div>
      <div class="content_1">
          <div class="tabbox" style="display:block;">
              
  <div class="container" id="container">
    <div id="actions" class="row">
      <div class="col-lg-7">

        <span class="btn btn-success fileinput-button dz-clickable" id="fileinput">
            <i class="glyphicon glyphicon-plus"></i>
            <span>选择文件</span>
        </span>
        <button type="submit" class="btn btn-primary start">
            <!--<i class="glyphicon glyphicon-upload"></i>-->
            <span>开始上传</span>
        </button>
        <button type="reset" class="btn btn-warning cancel">
            <!--<i class="glyphicon glyphicon-ban-circle"></i>-->
            <span>清除上传</span>
        </button>
<div style="color:#959595;line-height:24px;height:24px;background:url() no-repeat;padding-left:20px;"><input type="checkbox" id="addwater" name="addwater" value="1" onclick="addwater_enable();" <?php if($watermark_enable==1): ?>checked<?php endif; ?>/> <font color="green"><?php echo L('upload_add_water');?></font> , <?php echo L('upload_say4');?> <font color="red"><?php echo ($file_types); ?></font> <?php echo L('upload_say5');?></div><br>
<!--<div style="color:#454545;clear:both;line-height:24px;height:24px;"> <?php echo L('upload_say1');?> <font color="red"><?php echo ($small_upfile_limit); ?></font> <?php echo L('upload_say2');?> <font color="red"><?php echo ($file_size); ?></font>	<?php echo L('upload_say3');?></div>-->			
      </div>
         <div id="dropz" class="dropzone fileinput-button">
        <div id="pro"></div>
        <div id="speed"></div>
        <div id="time"></div>
    </div>
      <div class="col-lg-5">
        <!-- The global file processing state -->
        <span class="fileupload-process">
          <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
          </div>
        </span>
      </div>
    </div>
    <div class="table table-striped files" id="previews">
    </div>
  </div>
  <input type="file" multiple="multiple" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
  
          </div>
            <div class="tabbox">
		 <br>
        	<?php echo L('upload_fileurl');?>: <input type="text" id="fileurl" name="fileurl" class="input-text" value=""  style="width:350px;"  onblur="addfileurl(this)">
			<br><br><br>

		</div>
		<div class="tabbox">
			<div id="filelist"></div>
		</div>
		<div class="tabbox">
			<div id="nouselist"></div>
		</div>
  </div>
  </div>
<div  id="myuploadform" style="display:none;" ></div>
<ul class="attachment-list"  id="thumbnails"></ul>

 <script>
      Dropzone.autoDiscover = false;
      //定制你想要的显示图片的界面
      var previewTemplate1 = '<div class="dz-preview dz-file-preview test"><div class="dz-details"><div class="dz-filename"><span data-dz-name></span></div><div class="dz-size" data-dz-size></div><img data-dz-thumbnail /></div><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div>';
      var fileinput = document.querySelector('#fileinput');
      var myDropzone = new Dropzone("#dropz", {
        //这是负责处理上传的路径
        url:"<?php echo U('Attachment/upload');?>",
        paramName:'filedata',
        params:{"PHPSESSID" : "<?php echo $sessid;?>", "isadmin" : "<?php echo $isadmin;?>","userid":"<?php echo $userid?>","swf_auth_key": "<?php echo $swf_auth_key;?>","isthumb" : "<?php echo $isthumb;?>","moduleid" : "<?php echo $moduleid?>","addwater":"<?php echo intval($watermark_enable);?>","lang":"<?php echo $lang;?>"},
        thumbnailWidth:80,
        thumbnailHeight:80,
        parallelUploads:<?php echo $file_limit;?>,
      maxFilesize:<?php echo $file_size;?>,
      maxFiles: <?php echo $file_limit;?>,
      acceptedFiles: "<?php echo $file_types;?>",
      //acceptedFiles: ".js,.obj,.dae",
        dictDefaultMessage: '拖动文件至此或者点击上传', // 设置默认的提示语句
        dictCancelUpload: '取消上传',
        dictRemoveFile: '移除文件',
        dictMaxFilesExceeded: '文件数量超出限制',
        dictFileTooBig: "文件大小超出限制",
        dictInvalidInputType: '文件类型不符合要求',
        addRemoveLinks:true,
        previewTemplate: previewTemplate1,
        //不自动提交图片，直到手动提交
        autoQueue: false, 
        //预览图片的容器
        previewsContainer: "#previews", 
        clickable: ".fileinput-button" 
      });
      myDropzone.on("addedfile", function(file) {
      });
      myDropzone.on("success", function(file,data) {
//          alert(1);
//          console.log(data);
//          var data = eval('('+data+')');
         add_uploadok(data.data);
      });
      // Update the total progress bar
      myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
      });
      myDropzone.on("sending", function(file) {
//          alert(2);
      });
      // Hide the total progress bar when nothing's uploading anymore
      myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0";
      });
      document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
      };
      document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true);
      };
     myDropzone.on("maxfilesexceeded", function(file) {
//        alert('上传文件数量超出限制');
        this.removeFile(file);
    });
    </script>
<script>
function ajaxload(typeid,page,inputid,isadmin)
{
    var data = '';
    var url =  "<?php echo U('Attachment/filelist');?>&typeid="+typeid+"&p="+page+"&inputid="+inputid+"&isadmin="+isadmin;
    $.ajax({
         type: "POST",
         url: url,
         data: data,
         success: function(msg){
			$('#'+inputid).html(msg);
			for(var i=0;i<ids.length;i++){
				$('#on_'+ids[i]).addClass("on");
			}
         }
    });
}
function addwater_enable(){
	if($('#addwater').attr('checked')) {
		myDropzone.on("sending", function(file, xhr, formData) {
               formData.append("addwater", '1');
                      });
	} else {
		myDropzone.on("sending", function(file, xhr, formData) {
               formData.append("addwater", '0');
                      });
	}
}
var ids =new Array();
function add_uploadok(data)
{
	
//          console.log(data);
	var id = data.aid;
	var src = data.filepath;
	var ext =  data.isimage;
	var name = data.filename;
	var filesize = data.filesize;
//console.log(id+'/'+src+'/'+ext+'/'+name+'/'+filesize);
	if(ext == 1) {
		var img = '<a href="javascript:void(0);" onclick="javascript:add_file(this,'+id+')" id="on_'+id+'" class="on"><div class="icon"></div><img src="'+src+'" width="80" alt="'+name+'" imgid="'+id+'" path="'+src+'"/></a>';
	} else {
		var img = '<a href="javascript:void(0);" onclick="javascript:add_file(this,'+id+')" id="on_'+id+'" class="on"><div class="icon"></div><img src="Public/images/ext/'+ext+'.png" width="80" alt="'+name+'" imgid="'+id+'" path="'+src+'"/></a>';
	}
	$('#thumbnails').append('<li><div id="attachment_'+id+'" class="img"></div></li>');
//	$('#attachment_'+id).html(img);
	var datas='<div id="uplist_'+id+'"><input type="hidden" name="status" id="status" value="0"><input type="hidden"  id="aids" name="aids[]"  value="'+id+'"  /><input type="text"  id="filedata" name="filedata[]" value="'+src+'"  /> <input type="text" id="namedata" name="namedata[]" value="'+name+'"  /> &nbsp;<a href="javascript:remove_this(\'uplist_'+id+'\');">移除</a> </div>';
	$('#myuploadform').append(datas);
	ids.push(id);
}
new Tabs("#tabs",".title ul li",".content_1",".tabbox","on",1);
function addfileurl(obj) {
	var strs = $(obj).val() ?  $(obj).val() : '';

	if(strs){
		var datas='<div id="uplist_1"><input type="hidden" id="aids" name="aids"  value="0"  /><input type="text"  id="filedata" name="filedata" value="'+strs+'"  /><input type="text"  id="namedata" name="namedata" value=""  /> &nbsp;<a href="javascript:remove_this(\'uplist_1\');"><?php echo L('remove');?></a> </div>';
		$('#myuploadform').html(datas);
		$('#thumbnails   a ').removeClass("on");
		$('.img a ').removeClass("on");
	}else{

		$('#myuploadform').html('');
	}
}

var insert2Xheditor =  insert2Xheditor || function(){
		<?php if($_GET[immediate]==1): ?>var immediate='!';<?php endif; ?>
		var arrMsg=[],img = '',data = '',i=0;
		var num = $('#myuploadform > div').length;
		if(num){
				$('#myuploadform   div').each(function(){
					var status =  $(this).find('#status').val();
					var aid = $(this).find('#aids').val();
					var src = $(this).find('#filedata').val();
					var name = $(this).find('#namedata').val();
					if(status!=0) aid=0;
					arrMsg[i]= { "url":immediate+src,"localfile":name,"id":aid,"editorid":"<?php echo ($_GET[editorid]); ?>" };
					i++;
			   });
			  // $('#<?php echo ($_GET[editorid]); ?>_aid_box').append(data);
		}
		//arrMsg.push({"name":"","url":"!200906030521128703.gif","id":});
		callback(arrMsg);
}
</script>
<?php if(!empty($_GET[editorid])): ?><div id="bootline"></div>
<div id="btnbox" class="btn" style="padding-left:450px;">
		<INPUT TYPE="submit" onclick="insert2Xheditor();" value="<?php echo L(dosubmit);?>" class="button " >
<input TYPE="reset" onclick="unloadme();" value="<?php echo L(cancel);?>" class="button">
</div><?php endif; ?>
</body>
</html>