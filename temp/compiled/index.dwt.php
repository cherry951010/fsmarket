<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="baidu-site-verification" content="ZDhT9AzCSE" />
<meta name="360-site-verification" content="b3ec2eb637fb409d5e19c32e51f8f1f8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/shengxian/index.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />

<script type="text/javascript" src="themes/shengxian/js/common.js"></script>
<script type="text/javascript" src="themes/shengxian/js/index.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'easydialog.min.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<script type="text/javascript" src="themes/shengxian/js/lizi_index.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".j-hotTab").find("li:first").addClass('on');
	$(".index-promotion-up").click(function(){
		var num=$(this).parent().parent().find(".textgt").val();
		var num_p=parseInt(num);
		num_p=num_p+1;
		$(this).parent().parent().find(".textgt").val(num_p);
		});
});
</script>
<div class="index-banner">
    <div class="index-slide" id="index-slide">
	
	<?php echo $this->fetch('library/index_ad.lbi'); ?> 
	 
    </div>
</div>

<script type="text/javascript">
   var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
   var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
   var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>


<?php echo $this->fetch('library/recommend_promotion.lbi'); ?>


   <div class="recommendmainInfo">
		<script>
		<!--
		/*第一种形式 第二种形式 更换显示样式*/
		function setTabCatrecommend(index){
			var brand_cat_list = document.getElementById("probar");
			var branddiv = brand_cat_list.getElementsByTagName('li');
			//*
			for(i=1;i<=branddiv.length;i++){
				var con = document.getElementById("porcom_"+i);
				con.style.display = index==i ? "block":"none";
				
				var a_brand=document.getElementById("pcur_"+i);
				a_brand.className = index==i ? " pcur":" ";

			}
		}
		//-->
		</script> 
			<div class="pro">
                <div class="probar">
                    <ul id="probar">    
                        <li id="pcur_1" class="pcur1 pcur" onMouseOver="setTabCatrecommend(1)"><a>新品上市</a></li>
						<li id="pcur_2" class="pcur2" onMouseOver="setTabCatrecommend(2)"><a>精品推荐</a></li>
						<li id="pcur_3" class="pcur3" onMouseOver="setTabCatrecommend(3)"><a>热销排行</a></li>
                    </ul>
                </div>
			</div>
                <div style="display: block;" id="porcom_1" class="pro_con">
					<?php echo $this->fetch('library/recommend_new.lbi'); ?>
                </div>
				<div style="display: none;" id="porcom_2" class="pro_con">
					<?php echo $this->fetch('library/recommend_best.lbi'); ?>
                </div>
				<div style="display: none;" id="porcom_3" class="pro_con">
					<?php echo $this->fetch('library/recommend_hot.lbi'); ?>
                </div>
   </div>




<div class="series_list"> 

<?php $this->assign('cat_goods',$this->_var['cat_goods_1']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_1']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_2']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_2']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_3']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_3']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_4']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_4']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_5']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_5']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_6']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_6']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 
</div>
	


<div class="w-main panel-wrapper">

<?php $this->assign('articles',$this->_var['articles_16']); ?><?php $this->assign('articles_cat',$this->_var['articles_cat_16']); ?><?php echo $this->fetch('library/cat_articles.lbi'); ?>

</div>
	

<?php echo $this->fetch('library/page_footer.lbi'); ?>
<div class="add_ok" id="cart_show">
    <div class="tip">
        <i class="iconfont"></i>商品已成功加入购物车
    </div>
    <div class="go">
        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
        <a href="flow.php" class="btn">去结算</a>
    </div>
</div>
</body>
</html>
