<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
    <meta name="description" content="<?php echo ($seo_description); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <!-- wap -->
    <meta name="wap-font-scale" content="no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=yes" />
    <meta name="Robots" content="all">
    <link rel="alternate" href="https://www.yige-tech.com/" hreflang="en" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title><?php if(MODULE_NAME != 'Index') : if($seotitle) : echo ($seotitle); else : echo ($seo_title); endif; else : echo ($site_name); endif;?></title>
    <!-- css -->
    <link rel="stylesheet" href="__PUBLIC__/www/css/iconfont-yizumi.css">
    <link rel="stylesheet" href="__PUBLIC__/www/css/bootstrap.min.css">
    <link rel="stylesheet" href="__PUBLIC__/www/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="__PUBLIC__/www/css/main.css">
    <script src="__PUBLIC__/www/js/jquery.min.js"></script>
</head>

<body>
    <!-- header start -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-full">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"><?php echo L(Toggle_navigation);?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/index.php"><img alt="logo" src="__PUBLIC__/www/images/logo.png"></a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="<?php if(MODULE_NAME == 'Index') : ?>active<?php endif;?>"><a href="/index.php"><?php echo L(HOME_FONT);?></a></li>
                        <!--                        <li>
                            <a href="product-list.html">Company </a>
                        </li>
                        <li>
                            <a href="">Technology </a>
                        </li>-->
                        <?php $n=0;foreach($Categorys as $key=>$r):if($n<100) :if( intval(0)==$r["parentid"] ) :++$n; if($r[ismenu]==1): ?><li class="<?php if($bcid==$r[id]) : ?>active<?php endif;?>">
                                    <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["catname"]); ?>"><?php echo ($r["catname"]); ?>
                                        <?php if(in_array($r[id],array(114,121))) : ?><i
                                            class="iconfont icon-angle-down"></i><?php endif;?>
                                    </a>
                                    <?php if(in_array($r[id],array(114,121))) : ?>
                                    <?php if($r[child] == 1) : ?>
                                    <ul class="second-nav">
                                        <?php $n=0;foreach($Categorys as $key=>$rs):if($n<99) :if( intval($r[id])==$rs["parentid"] ) :++$n; if($rs[ismenu]==1): ?><li><a href="<?php echo ($rs["url"]); ?>" title="<?php echo ($rs["catname"]); ?>"><?php echo ($rs["catname"]); ?></a></li>
                                                <?php if($rs[child]==1){?>
                              <span class="arrow-three"><i></i></span>
                              <ul class="three">
                                  <?php $n=0;foreach($Categorys as $key=>$rss):if($n<99) :if( intval($rs[id])==$rss["parentid"] ) :++$n; if($rss[ismenu]==1){?>
                                <li><a href="{$rss.url}" title="<?php echo ($rss["catname"]); ?>"><?php echo ($rss["catname"]); ?></a></li>
                                    <?php } endif; endif; endforeach;?>
                              </ul>
                              <?php } endif; endif; endif; endforeach;?>
                                    </ul>
                                    <?php endif;?>
                                    <?php endif; endif; endif; endif; endforeach;?>
                    </ul>
                    <div class="share navbar-left">
                        <ul class="clearfix">
                            <li><a class="facebook" href="https://www.facebook.com/YizumiRubberMachinery"
                                    target="_blank">
                                    <i class="iconfont icon-facebook"></i>
                                </a></li>
                            <li><a class="youtube"
                                    href="https://www.youtube.com/channel/UC6BVdP-i_cS5IpRdr6HPiBg?view_as=subscriber"
                                    target="_blank">
                                    <i class="iconfont icon-youtube"></i>
                                </a></li>
                            <li class="language">
                                <i class="iconfont icon-diqiu"></i>
                                <div class="language-box">
                                    <a href="/en">English</a>
                                    <a href="/it">Italiano</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </nav>

        <!-- wap-nav -->
        <div class="wap-nav">
            <div class="bg">
                <div class="bg_l">
                </div>
                <div class="nav_right">
                    <div class="nav_rin">
                        <ul class="menu_ul">
                            <li><a href="/index.php" title=""><?php echo L(HOME_FONT);?></a></li>
                            <?php $n=0;foreach($Categorys as $key=>$r):if($n<100) :if( intval(0)==$r["parentid"] ) :++$n; if($r[ismenu]==1): ?><li class="<?php if($bcid==$r[id]) : ?>active<?php endif;?> menu_li">
                                        <a href="<?php echo ($r["url"]); ?>" class="menu_a"><?php echo ($r["catname"]); ?></a>
                                        <?php if(in_array($r[id],array(114,121))) : ?>
                                        <span class="arrow"><i></i></span>
                                        <ul class="mt_ul">
                                            <?php $n=0;foreach($Categorys as $key=>$rs):if($n<99) :if( intval($r[id])==$rs["parentid"] ) :++$n; if($rs[ismenu]==1): ?><li><a href="<?php echo ($rs["url"]); ?>"><?php echo ($rs["catname"]); ?></a></li><?php endif; endif; endif; endforeach;?>
                                        </ul>
                                        <?php endif;?>
                                    </li><?php endif; endif; endif; endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="h_in">
                    <div class="h_left">
                        <a href="/index.php" class="h_logo"><img src="__PUBLIC__/www/images/logo.png"></a>
                    </div>
                    <div class="wap-language">
                        <i class="iconfont icon-diqiu"></i>
                        <div class="wap-language-box">
                            <a href="/en">English</a>
                            <a href="/it">Italiano</a>
                        </div>
                    </div>
                    <div class="h_right">
                        <i class="iconfont icon-FontAwesomelistul" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="banner clearfix">

    <!-- pc -->
    <div class="camera_wrap" id="camera_demo">

        <?php  $_result=M("slide_data")->field("*")->where("fid = 1 AND status=1 ")->order("id desc")->limit("6")->select();; if ($_result): $n=0;foreach($_result as $key=>$r):++$n;$mod = ($n % 2 );?><div data-src="<?php echo ($r["pic"]); ?>" data-target="_blank" data-link="<?php echo ($r["link"]); ?>"></div><?php endforeach; endif;?>

    </div>

    <!-- wap -->
    <div class="wap-banner">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php  $_result=M("slide_data")->field("*")->where("fid = 2 AND status=1 ")->order("id desc")->limit("6")->select();; if ($_result): $n=0;foreach($_result as $key=>$r):++$n;$mod = ($n % 2 );?><div class="swiper-slide">
                        <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>">
                            <img src="<?php echo ($r["pic"]); ?>" alt="<?php echo ($r["title"]); ?>">
                        </a>
                    </div><?php endforeach; endif;?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>


<div class="index">
    <!-- section-spacing -->
    <div class="section-spacing">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php  $_result=M("slide_data")->field("*")->where("fid = 3 AND status=1 ")->order("id desc")->limit("4")->select();; if ($_result): $n=0;foreach($_result as $key=>$r):++$n;$mod = ($n % 2 );?><!-- start -->
                    <div class="swiper-slide">
                        <div class="box">
                            <img src="<?php echo ($r["pic"]); ?>" alt="">
                            <h4><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>"><?php echo ($r["title"]); ?></a></h4>
                            <p><?php echo ($r["description"]); ?></p>
                        </div>
                    </div>
                    <!-- end --><?php endforeach; endif;?>
            </div>

        </div>

    </div>

    <!-- ABOUT OUR COMPANY -->
    <div class="index-about">
        <?php if($Think.LANG_SET==en) : ?>
        <?php getcatvar('page','id = 74','sycont');?>
        <?php else :?>
        <?php getcatvar('page','id = 150','sycont');?>
        <?php endif;?>
    </div>


    <!-- OUR PRODUCTS -->
    <div class="index-product">
        <div class="container">
            <div class="row">
                <h3><?php echo L(OUR_PRODUCTS);?></h3>

                <div class="content clearfix">

                    <?php if($Think.LANG_SET==en) : ?>
                    <?php  $_result=M("Product")->field("*")->where("lang=1 AND status=1   AND posid =1")->order("listorder desc")->limit("6")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><!-- statr -->
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="box">
                                <div class="box-img"><img src="<?php echo ($r["thumb"]); ?>" alt="<?php echo ($r["title"]); ?>"></div>
                                <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>" class="hover-content">
                                    <div class="text clearfix">
                                        <div class="name"><?php echo ($r["title"]); ?></div>
                                        <!-- <p><?php echo ($r["jianjie"]); ?></p> -->
                                        <span class="details">
                                            <i class="iconfont icon-long-arrow-right"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- end --><?php endforeach; endif;?>
                    <?php else :?>
                    <?php  $_result=M("Product")->field("*")->where("lang=2 AND status=1   AND posid =1")->order("listorder desc")->limit("6")->select();; if ($_result): $i=0;foreach($_result as $key=>$r):++$i;$mod = ($i % 2 );?><!-- statr -->
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="box">
                                <div class="box-img"><img src="<?php echo ($r["thumb"]); ?>" alt="<?php echo ($r["title"]); ?>"></div>
                                <a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["title"]); ?>" class="hover-content">
                                    <div class="text clearfix">
                                        <div class="name"><?php echo ($r["title"]); ?></div>
                                        <!-- <p><?php echo ($r["jianjie"]); ?></p> -->
                                        <span class="details"><i class="iconfont icon-long-arrow-right"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- end --><?php endforeach; endif;?>
                    <?php endif;?>

                </div>
                <div class="view-all">
                    <!--<a href="/product.html" class="v-more"><?php echo L(VIEW_ALL);?></a>-->
                    <?php if($Think.LANG_SET==en) : ?>
                    <a href="/index.php?m=Product&a=index&id=73&l=en" class="v-more"><?php echo L(VIEW_ALL);?></a>
                    <?php else :?>
                    <a href="/index.php?m=Product&a=index&id=151&l=es" class="v-more"><?php echo L(VIEW_ALL);?></a>
                    <?php endif;?>
                </div>

            </div>

        </div>

    </div>

    <!-- SERVICES -->
    <div class="index-services">
        <div class="container">
            <div class="row">
                <?php if($Think.LANG_SET==en) : ?>
                <?php getcatvar('page','id = 111','sycont');?>
                <?php else :?>
                <?php getcatvar('page','id = 187','sycont');?>
                <?php endif;?>
            </div>

        </div>

    </div>


    <!-- OUR TEAM -->
    <div class="index-team">
        <div class="container">
            <div class="row">
                <h3><?php echo L(OUR_TEAM);?></h3>
                <p>
                    <?php if($Think.LANG_SET==en) : ?>
                    <?php echo ($Categorys[112]['description']); ?>
                    <?php else :?>
                    <?php echo ($Categorys[189]['description']); ?>
                    <?php endif;?>
                </p>
                <div class="content clearfix">
                    <div class="about">
                        <div class="about-why">

                            <div class="list clearfix">
                                <?php if($Think.LANG_SET==en) : ?>
                                
                                <?php else :?>
                                
                                <?php endif;?>


                            </div>

                        </div>
                    </div>

                </div>




            </div>

        </div>

    </div>

    <!-- FREE CONSULTATION -->
    <div class="consulation">
        <div class="container">
            <div class="row">
                <h3><?php echo L(FREE_CONSULTATION);?></h3>
                <p>

                    <?php if($Think.LANG_SET==en) : ?>
                    <?php echo ($Categorys[78]['description']); ?>
                    <?php else :?>
                    <?php echo ($Categorys[186]['description']); ?>
                    <?php endif;?>
                </p>
                <div class="content clearfix">
                    <div class="img col-lg-5 col-md-5 col-sm-5">
                        <div class="box-img"><img src="/Public/www/images/consulation.jpg" alt=""></div>
                    </div>
                    <div class="txt col-lg-7 col-md-7 col-sm-7">
                        <form class="clearfix" method="post" action="index.php?g=Home&amp;a=message"
                            onsubmit="return beforeSubmit2(this);">
                            <input name="forward" type="hidden"
                                value="<?php echo ($_SERVER['SERVER_NAME']); if($catid) : ?>/index.php?m=<?php echo ($Categorys[$catid]['module']); ?>&a=index&id=<?php echo ($catid); else :?>/index.php<?php endif;?>" />
                            <input type="hidden" name="lang" value="<?php echo (LANG_SET); ?>">
                            <div class="clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input placeholder="<?php echo L(Namea);?> *" type="text" name="name">
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-6">
                                    <input placeholder="<?php echo L(Emaila);?> *" type="text" name="email">
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input placeholder="<?php echo L(Phonea);?> *" type="text" name="phone">
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-6">
                                    <textarea class="" name="<?php echo L(messagea);?>" placeholder="Message ..."></textarea>
                                </div>

                            </div>
                            <button type="submit" class="btns"><?php echo L(GETAQUOTES);?></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LATEST NEWS -->
    <div class="index-news">
        <div class="container">
            <div class="row">
                <h3><?php echo L(LATESTNEWS);?></h3>
                <p>

                    <?php if($Think.LANG_SET==en) : ?>
                    <?php echo ($Categorys[110]['description']); ?>
                    <?php else :?>
                    <?php echo ($Categorys[185]['description']); ?>
                    <?php endif;?>
                </p>
                <div class="content">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <?php if($Think.LANG_SET==en) : ?>
                            
                            <?php else :?>
                            
                            <?php endif;?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- OUR PARTNERS -->
    <div class="partners">
        <div class="container">
            <div class="row">
                <div class="txt col-lg-3 col-md-3 col-sm-3"><?php echo L(OURPARTNERS);?></div>
                <div class="partners-sw col-lg-9 col-md-9 col-sm-9">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <?php if($Think.LANG_SET==en) : ?>
                            
                            <?php else :?>
                            
                            <?php endif;?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer  -->
<footer>
    <div class="container">
        <div class="row">
            <div class="content clearfix">
                <div class="left col-lg-8 col-md-8 col-sm-8">
                    <div class="clearfix">
                        <?php $n=0;foreach($Categorys as $key=>$r):if($n<150) :if( intval(0)==$r["parentid"] ) :++$n; if($r[isfooter]==1 && in_array($r[id],array(110,73,119))): ?><div class="col-lg-4 col-md-4 col-sm-6">
                                    <dl>
                                        <dt><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["catname"]); ?>"><?php echo ($r["catname"]); ?></a></dt>
                                        <?php if($r[child] == 1) : ?>
                                        <?php $n=0;foreach($Categorys as $key=>$rs):if($n<99) :if( intval($r[id])==$rs["parentid"] ) :++$n;?><dd><a href="<?php echo ($rs["url"]); ?>" title="<?php echo ($rs["catname"]); ?>"><?php echo ($rs["catname"]); ?> </a></dd><?php endif; endif; endforeach;?>
                                        <?php endif;?>
                                    </dl>
                                </div><?php endif; endif; endif; endforeach;?>
                    </div>
                    <div class="clearfix">
                        <?php $n=0;foreach($Categorys as $key=>$r):if($n<150) :if( intval(0)==$r["parentid"] ) :++$n; if($r[isfooter]==1 && in_array($r[id],array(116,77,78))): ?><div class="col-lg-4 col-md-4 col-sm-6">
                                    <dl>
                                        <dt><a href="<?php echo ($r["url"]); ?>" title="<?php echo ($r["catname"]); ?>"><?php echo ($r["catname"]); ?></a></dt>
                                        <?php if($r[child] == 1) : ?>
                                        <?php $n=0;foreach($Categorys as $key=>$rs):if($n<99) :if( intval($r[id])==$rs["parentid"] ) :++$n;?><dd><a href="<?php echo ($rs["url"]); ?>" title="<?php echo ($rs["catname"]); ?>"><?php echo ($rs["catname"]); ?> </a></dd><?php endif; endif; endforeach;?>
                                        <?php endif;?>
                                    </dl>
                                </div><?php endif; endif; endif; endforeach;?>
                    </div>
                </div>
                <div class="info col-lg-4 col-md-4 col-sm-4">
                    <div class="share">
                        <ul class="clearfix">
                            <li><a href="<?php echo ($youtube); ?>" title="" target="_blank"><img src="/Public/www/images/youtube.png"
                                        alt=""></a></li>
                            <li><a href="<?php echo ($facebook); ?>" title="" target="_blank"><img
                                        src="/Public/www/images/facebook.png" alt=""></a></li>
                            <li><a href="<?php echo ($twitter); ?>" title="" target="_blank"><img src="/Public/www/images/twttier.png"
                                        alt=""></a></li>
                            <li><a href="<?php echo ($ins); ?>" title="" target="_blank"><img src="/Public/www/images/linkedin.png"
                                        alt=""></a></li>
                        </ul>
                    </div>
                    <div class="select-box">
                        <p>test</p>
                        <ul>
                            <li><a href="">test</a></li>
                        </ul>
                    </div>
                    <div class="select-box">
                        <p>test</p>
                        <ul>
                            <li><a href="">test</a></li>
                        </ul>
                    </div>
                    <div class="copy"><?php echo ($cop); ?></div>
                </div>
            </div>
            <!--                <div class="cookie">
                    <h5>COOKIE NOTICE</h5>
                    <p><?php echo ($cop); ?></p>
                </div>-->
        </div>
    </div>

    <!-- gotop -->
    <div class="gotop"> </div>
</footer>

</body>
<!-- js -->
<script src="/Public/www/js/bootstrap.min.js"></script>
<script src="/Public/www/js/jquery.waypoints.min.js"></script>
<script src="/Public/www/js/jquery.countup.min.js"></script>
<script src="/Public/www/js/swiper.min.js"></script>
<script src="/Public/www/js/jquery.fancybox.min.js"></script>
<script src="/Public/www/js/wow.min.js"></script>
<script src="/Public/www/js/main.js"></script>

</html>