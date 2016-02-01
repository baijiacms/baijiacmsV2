<?php defined('SYSTEM_IN') or exit('Access Denied');?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $cfg['shop_title']; ?></title>
<meta charset="utf-8">
 <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">



<style type="text/css">
@charset "utf-8";
body,article,section,h1,h2,hgroup,p,a,ul,ol,li,em,div,small,span,footer,canvas,figure,figcaption,input{margin:0;padding:0;}
body{padding:0;margin:0;font:14px/1.5 'Microsoft Yahei','Simsun';color: #333;background-color:white;-webkit-tap-highlight-color:rgba(0,0,0,0);-webkit-user-select:none;-webkit-text-size-adjust:none;position:relative; width:100%;}
img{border:none;}
input:focus{outline:0 none;
	-webkit-user-modify:read-write-plaintext-only;-webkit-tap-highlight-color:rgba(0,0,0,0);}
input[type=search]{-webkit-appearance:none;}
*[hidden]{display:none !important;}
a{text-decoration:none;cursor:pointer;}
a.autotel{text-decoration:none;color:inherit;}
ul{list-style-type:none;}
small,small em{font-size:15px;}
figure[hidden]{display:none;}
.scroll{overflow:scroll;overflow-x:hidden;-webkit-overflow-scrolling:touch;}
.main{max-width:700px; margin:0 auto; position:relative;}
/*.ui-body-d .ui-link{font-weight:normal;}
.index_head{}
.index_head img{width:100%;}
.index_description{padding:10px;font-size: 14px;color: #555;max-height:100px;text-overflow: ellipsis;overflow: hidden;border-bottom:1px #CCC solid;}
#nav{width:auto;height:29px;overflow:hidden;padding:5px 0 5px 5px;background:#E9E9E9;border:1px #ccc solid;border-right:0;border-left:0;}
#nav a{display:block;position: relative;overflow:hidden;float:left;padding:5px 0;width:19.3%;text-align:center;text-decoration:none; font-weight:normal;border:1px #E9E9E9 solid;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;color:#666;font-size:14px;}
#nav a:hover,#nav a.current{background:#C9C9C9;border:1px #999 solid;color:#333;}
#nav .icon_more{display:block;position:absolute;right: 10px;width: 0;border-width: 4px;border-style: solid;}
#nav .icon_more_down{top: 11px;border-color: #575757 transparent transparent transparent;}
#nav .icon_more_up{top: 6px;border-color: transparent transparent #575757 transparent;}
.list{overflow:hidden;}
.list a{text-decoration:none;padding:10px 30px 10px 10px;overflow:hidden;display:block;border-bottom:1px #CCC dashed;position: relative;}
.list a:hover{background:#F7F7F7;}
.list img{float:left;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;overflow:hidden;margin-right:20px;width:110px;}
.list span{display:block;overflow:hidden;}
.list .item{border-bottom:2px #666 solid; color:#666; height:35px; line-height:35px; padding:0 10px; font-weight:600; font-size:16px;}
.list .title{color:#333;margin-bottom:10px;font-weight:600;}
.list .description{color:#666; font-size:14px; font-weight:normal;line-height:18px;}
.list .icon_more{display: block;position: absolute;top: 30px;right: 10px;width: 0;border-color: transparent transparent transparent #575757;border-width: 7px;border-style: solid;}
.list .list_img{width:50px;}
.list .list_title{margin-bottom:10px;}
.category{padding:10px 0 0 10px;overflow:hidden;border-bottom:1px #CCC dashed;}
.category a{position:relative;float:left;overflow:hidden;display:inline-block;font-weight:normal;text-decoration:none;font-size:14px;padding:0;margin:0 3% 10px 0;width:30%;}
.category a img{width:100%;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;}
.category a .name{width:100%;height:25px;line-height:25px;display:block;font-weight:normal;font-size:16px;overflow:hidden;position:absolute;bottom:5px;z-index:10;color:#FFF;text-align:center;}
.category a .name_bg{filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity: 0.5;opacity: 0.5;background:#000;width:100%;height:25px;position:absolute;bottom:5px;z-index:9;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;-moz-border-radius-topleft:0;-moz-border-radius-topright:0;-webkit-border-top-left-radius:0;-webkit-border-top-right-radius:0;border-top-left-radius:0;border-top-right-radius:0;}
.top{overflow:hidden;margin-bottom:15px;}
.top span{display:block; width:100%;}
.top .title{font-size:20px; font-weight:600; height:30px; line-height:30px;}
.top .date{font-size:12px; color:#666;}
.content{padding:10px; border-bottom:1px #CCC dashed;}
.content .media{margin-bottom:18px;}
.content .media img{width:100%;}
.content .text{color:#3e3e3e;font-size:1.5;line-height:1.5;width: 100%;overflow: hidden;zoom:1;}
.content .text p{min-height:1.5em;min-height: 1.5em;word-wrap: break-word;word-break:break-all;}*/
#footer{padding:0; width:100%; height:40px; line-height:40px; text-align:center; color:#666; position:absolute; bottom: auto;}
/*幻灯片*/
#focus{margin:0 auto; overflow:hidden;position:relative;}
#focus img{border:0;overflow:hidden;}
#focus ul{list-style:none;position:absolute; margin:0; padding:0;}
#focus ul li{list-style:none;float:left;overflow:hidden;position:relative;background:#000;}
#focus ul li div{position:absolute;overflow:hidden;}
#focus .btnBg{position:absolute;width:100%;height:20px;right:0;bottom:0;background:#000;overflow:hidden;}
#focus .btn{position:absolute;height:20px;line-height:20px;right:0;bottom:0;text-align:right;z-index:9999;}
#focus .btn span{display:inline-block;_display:inline;_zoom:1;width:25px;height:10px;_font-size:0;margin-left:5px;cursor:pointer;background:#fff;}
#focus .btn span.on{background:#fff;}
#focus .preNext{width:45px;height:100px;position:absolute;top:100px;background:url('../images/sprite.png') no-repeat 0 0;cursor:pointer;}
#focus .pre{left:0;}
#focus .next{right:0;background-position:right top;}
/*tab菜单*/
.nav-tabs{background:#EEE; margin-bottom:0;}
.nav-tabs a{color:#333;}
.nav-tabs .active{border-top:2px #ed2f2f solid;position:relative;margin-top:-2px;}
.nav-tabs .active a{webkit-border-radius:0;-moz-border-radius:0;border-radius:0;margin-right:0;border-right:0;border-left:0;border-top:1px #FFF solid;}
.tab-content{padding:0;}
/*表单样式*/
.form-table{width:100%;}
.form-table th{width:20%; text-align:left; color:#666; vertical-align:top; padding-top:5px;}
.form-table td{width:80%; padding-bottom:10px;}
.form-table .submit{width:100%; margin-top:10px;}
/*适应手机端的div样式*/
.mobile-div{border:1px #CCC solid; margin:10px 5px; background:#FFF; overflow:hidden;}
.mobile-hd{height:35px;line-height:35px;padding:0 10px;color: #666;text-shadow: 0 1px #FFF;border-bottom:1px solid #C6C6C6;background-color:#E1E1E1;background-image: linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);background-image: -o-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);background-image: -moz-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);background-image: -webkit-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);background-image: -ms-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);background-image: -webkit-gradient(linear,left bottom,left top,color-stop(0, #E7E7E7),color-stop(1, #f9f9f9));-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;-webkit-border-radius: 5px 5px 0 0;-moz-border-radius: 5px 5px 0 0;-o-border-radius: 5px 5px 0 0;border-radius: 5px 5px 0 0;}
.mobile-hd i{line-height:35px;}
.mobile-content{margin:10px; overflow:hidden;}
.mobile-content .help-block{margin-bottom:0; margin-top:3px; color:#AAA;}
.mobile-div .collapse .mobile-content{margin-top:0; padding:0 5px; color:#666; border-left:3px #EEE solid; background:#F9F9F9;}
.mobile-img img{width:100%;}
.mobile-submit{margin:0 5px;}
.mobile-li{display:block; text-decoration:none; color:#666; height:35px; line-height:35px; font-size:14px; padding:0 10px; border-top:1px #CCC solid;}
.mobile-li:first-child{border-top:0;}
.mobile-li i{line-height:35px;}
.mobile-li:hover{text-decoration:none; color:#333;}
.mobile-li .btn.pull-right,.mobile-li .btn.pull-left{margin-top:6px;}
.alert.mobile-alert{overflow:hidden; margin:10px 5px 0 5px;}
.alert.mobile-alert h4{line-height:25px; text-align:center;}
/*手机端导航*/
.navbar .nav > li > a{padding:10px 10px 10px;}
/*手机端分页*/
.pagination ul > li > a, .pagination ul > li > span{padding:10px 5px;}

html{background:#FFF;color:#000;}
body, div, dl, dt, dd, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td{margin:0;padding:0;}
table{border-collapse:collapse;border-spacing:0;}
fieldset, img{border:0;}
address, caption, cite, code, dfn,  th, var{font-style:normal;font-weight:normal;}
ol, ul{list-style:none;}
caption, th{text-align:left;}
h1, h2, h3, h4, h5, h6{font-size:100%;font-weight:normal;}
q:before, q:after{content:'';}
abbr, acronym{border:0;font-variant:normal;}
sup{vertical-align:text-top;}
sub{vertical-align:text-bottom;}
input, textarea, select{font-family:inherit;font-size:inherit;font-weight:inherit;}
input, textarea, select{font-size:100%;}
legend{color:#000;}
body{color:#222;font-family:Helvetica, STHeiti STXihei, Microsoft JhengHei, Microsoft YaHei, Tohoma, Arial;height:100%;position:relative;}
body > .tips{display:none;left:50%;padding:20px;position:fixed;text-align:center;top:50%;width:200px;z-index:100;}
.page{padding:15px;}
.page .page-error, .page .page-loading{line-height:30px;position:relative;text-align:center;}
#activity-detail .page-bizinfo{border-bottom:1px dotted #CCC;}
#activity-detail .page-bizinfo .header{padding:10px 10px 10px;}
#activity-detail .page-bizinfo .header #activity-name{color:#000;font-size:20px;font-weight:bold;word-break:normal;word-wrap:break-word;}
#activity-detail .page-bizinfo .header #post-date{color:#8c8c8c;font-size:11px;margin:0;}
#activity-detail .page-content{padding:10px;}
#activity-detail .page-content .media{margin-bottom:18px;}
#activity-detail .page-content .media img{width:100%;}
#activity-detail .page-content .text{color:#3e3e3e;font-size:1.5;line-height:1.5;width: 100%;overflow: hidden;zoom:1;}
#activity-detail .page-content .text p{min-height:1.5em;min-height: 1.5em;word-wrap: break-word;word-break:break-all;}
#activity-list .header{font-size:20px;}
#activity-list .page-list{border:1px solid #ccc;border-radius:5px;margin:18px 0;overflow:hidden;}
#activity-list .page-list .line.btn{border-radius:0;margin:0;text-align:left;}
#activity-list .page-list .line.btn .checkbox{height:25px;line-height:25px;padding-left:35px;position:relative;}
#activity-list .page-list .line.btn .checkbox .icons{background-color:#ccc;left:0;position:absolute;top:0;}
#activity-list .page-list .line.btn.off .icons{background-image:none;}
#activity-list #save.btn{background-image:linear-gradient(#22dd22, #009900);background-image:-moz-linear-gradient(#22dd22, #009900);background-image:-ms-linear-gradient(#22dd22, #009900);background-image:-o-linear-gradient(#22dd22, #009900);background-image:-webkit-gradient(linear, left top, left bottom, from(#22dd22), to(#009900));background-image:-webkit-linear-gradient(#22dd22, #009900);}
.vm{vertical-align:middle;}
.tc{text-align:center;}
.db{display:block;}
.dib{display:inline-block;}
.b{font-weight:700;}
.clr{clear:both;}
.text img{max-width:100%;}
.page-url{padding-top:18px;}
.page-url-link{color:#607FA6;font-size:14px;text-decoration:none;text-shadow:0 1px #ffffff;-webkit-text-shadow:0 1px #ffffff;-moz-text-shadow:0 1px #ffffff;}
#mbutton{padding:15px 10px 15px 10px; overflow:hidden; border-bottom:1px #DDD solid;}
#mbutton > span{float:right; display:inline-block; background:#58a3ff; border:1px #63a0eb solid; color:#FFF; height:30px; line-height:30px; padding:0 10px; margin-left:10px;}
#mcover{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0, 0, 0, 0.7);display:none;z-index:20000;}
#mcover img{position:fixed;right: 18px;top:5px;width:260px;height:180px;z-index:20001;}
.head{height:40px; line-height:40px; background:#2786fb; margin-bottom:5px; padding:0 5px; color:#FFF;}
.head .bn{display:inline-block; height:30px; line-height:30px; padding:0 10px; margin-top:4px; font-size:20px; border:1px #1176f2 solid; background:#3f95ff; color:#FFF; text-decoration:none;}
.head .bn.pull-right{position:absolute; right:5px; top:0;}
.head .title{font-size:14pt;display:block;padding-left:10px;font-weight:bolder;margin-right:49px;text-align:center;height:40px;line-height:40px;text-overflow:ellipsis;white-space:nowrap;overflow: hidden;}
.head .order{background:#F9F9F9; position:absolute; z-index:9999; right:0;}
.head .order li > a{display:block; padding:0 10px; min-width:100px; height:35px; line-height:35px; font-size:16px; color:#333; text-decoration:none; border-top:1px #EEE solid;}
.head .order li.icon-caret-up{font-size:20px;color:#F9F9F9;position:absolute;top:-11px;right:16px;}
</style>
</head>
<body>
<div class="main"><div id="activity-detail">

<div class="page-bizinfo">
	<div class="header">
		<h1 id="activity-name"><?php echo $article['title'];?></h1>
		<span id="post-date">时间：<?php echo date("Y-m-d", $article['createtime']);?>&nbsp;&nbsp;&nbsp;<a href="#" class="contacts"> <?php echo $cfg['shop_title']; ?></a></span>
	</div>
</div>
<div class="page-content">
	<div class="text">
	
	
<?php echo $article['content'];?>
	</div>
</div>
</div>
</div></div>
</body>
</html>
