<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/shengxian/goods.css" rel="stylesheet" type="text/css" />
<link href="themes/shengxian/magiczoomplus.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="themes/shengxian/js/magiczoom_plus.js"></script>
<script type="text/javascript" src="themes/shengxian/js/common.js"></script>
<script language="javascript">
function shows_number(result)
{
     if(result.product_number !=undefined){
         document.getElementById('shows_number').innerHTML = result.product_number+'<?php if ($this->_var['goods']['measure_unit']): ?><?php echo $this->_var['goods']['measure_unit']; ?><?php else: ?>件<?php endif; ?>';
     }else{
         document.getElementById('shows_number').innerHTML = '无库存';
     }
}
//默认就显示第一个属性库存
function changeKucun()
{
var frm=document.forms['ECS_FORMBUY'];
spec_arr = getSelectedAttributes(frm);
    if(spec_arr==''){
         document.getElementById('shows_number').innerHTML = '<?php echo $this->_var['goods']['goods_number']; ?><?php if ($this->_var['goods']['measure_unit']): ?><?php echo $this->_var['goods']['measure_unit']; ?><?php else: ?>件<?php endif; ?>';
    }else{
         Ajax.call('goods.php?act=get_products_info', 'id=' + spec_arr+ '&goods_id=' + goods_id, shows_number, 'GET', 'JSON');
    }
}
</script>
<script type="text/javascript">
function $id(element) {
  return document.getElementById(element);
}
</script>
<script type="text/javascript" src="themes/shengxian/js/quick_buy1.js"></script>
</head>
<body style="background:#f5f5f5;">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<script type="text/javascript" src="themes/shengxian/js/magiczoomplus.js"></script>
<script type="text/javascript" src="themes/shengxian/js/easydialog.min.js"></script>
<script type="text/javascript" src="themes/shengxian/js/lizi_goods.js"></script>
<div id="wrapper">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
  <div class="detail cle"> 
     
    <?php echo $this->fetch('library/goods_gallery.lbi'); ?>
    <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
      
      
      <div class="item-info" id="item-info">
        <dl class="loaded">
          
          <dt class="product_name">
            <h1><?php echo $this->_var['goods']['goods_style_name']; ?></h1>
            <p class="desc"> <span class="gray"><?php echo $this->_var['goods']['goods_brief']; ?></span> </p>
          </dt>
          
          
          <dd class="property">
            <?php if ($this->_var['volume_price_list']): ?>
		  <div id="mod-detail-price" class="mod-detail-price">
		    <div class="d-content">
		      <table class="  ">
			<tbody>
			  <tr class="price">
			    <td class="price-title ladder-3"><?php echo $this->_var['lang']['preferences_price']; ?></td>
			    <?php $_from = $this->_var['volume_price_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('price_key', 'price_list');if (count($_from)):
    foreach ($_from AS $this->_var['price_key'] => $this->_var['price_list']):
?>
				<td class="ladder-3-1"><span class="value price-length-5"><?php echo $this->_var['price_list']['format_price']; ?></span></td>
			    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						
			  </tr>
			  <tr class="amount">
			    <td class="amount-title ladder-3"><?php echo $this->_var['lang']['number_to']; ?></td>
			    <?php $_from = $this->_var['volume_price_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('price_key', 'price_list');if (count($_from)):
    foreach ($_from AS $this->_var['price_key'] => $this->_var['price_list']):
?>
				<td class="ladder-3-1"><span class="value"><?php echo $this->_var['price_list']['number_format']; ?></span> <span class="unit"><?php if ($this->_var['goods']['measure_unit']): ?><?php echo $this->_var['goods']['measure_unit']; ?><?php else: ?>件<?php endif; ?></span></td>
			    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			  </tr>
			</tbody>
		      </table>
		    </div>
		  </div>
            <?php endif; ?>
              
	    <div class="itemPanel">
                <?php if ($this->_var['goods']['is_sale'] && $this->_var['goods']['sale_end_time']): ?> 
		<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.countdown-2.5.3.min.js')); ?>
                <h2>秒杀价：<i id="ECS_SHOPPRICE"><?php echo $this->_var['goods']['sale_price_formated']; ?></i></h2>
		<div class="market_price"><span class="timedown" id="timedown"><i class="iconfont">&#xe607;</i><font id="ps_labels_<?php echo $this->_var['goods']['goods_id']; ?>" over="false"></font><strong id="ps_cd_<?php echo $this->_var['goods']['goods_id']; ?>" class="font_w"><?php echo $this->_var['lang']['please_waiting']; ?></strong><font id="ps_labele_<?php echo $this->_var['goods']['goods_id']; ?>" over="false"></font></span></div>
		<script type="text/javascript">
				            $().ready(function(){
				            	countdown.setLabels(
				   	   				 '毫秒|秒|分|小时|天| 周| 月| 年| 十年| 世纪| 千年',
				   	   				 '毫秒|秒|分|小时|天| 周| 月| 年| 十年| 世纪| 千年',
				   	   				 '',//秒连接符
				   	   				 '',//其他时间连接符
				   	   				 'End',
				   	   				 function(n){ return n.toString()
				   	   			});
				            	<?php if ($this->_var['goods']['sale_start_time'] > $this->_var['goods']['gmtime'] && $this->_var['goods']['sale_end_time'] > $this->_var['goods']['gmtime']): ?>
				   	           	var endDate = new Date(<?php echo $this->_var['goods']['sale_start_time']; ?>);
				   	           	var status = "0";
							$("#ps_labels_<?php echo $this->_var['goods']['goods_id']; ?>").html("还有");
							$("#ps_labele_<?php echo $this->_var['goods']['goods_id']; ?>").html("开始");
				            	<?php else: ?>
				   	           	var endDate = new Date(<?php echo $this->_var['goods']['sale_end_time']; ?>);
				   	           	var status = "1";
							$("#ps_labels_<?php echo $this->_var['goods']['goods_id']; ?>").html("还剩");
							$("#ps_labele_<?php echo $this->_var['goods']['goods_id']; ?>").html("结束");
				            	<?php endif; ?>
				            					   	           	//if(<?php echo $this->_var['goods']['goods_id']; ?> == 62){
				   	           	//	endDate = new Date(2015, 6, 29, 12, 09);
				   	           	//}
				   	           	
				   	           	
				   	         	var timerId = null;
				   	           	
				   	           	function countdown_callback(ts){
							//alert(ts);
					   	           	$("#ps_cd_<?php echo $this->_var['goods']['goods_id']; ?>").html(ts.toString());
				   	    			//alert($("#ps_cd_<?php echo $this->_var['goods']['goods_id']; ?>").html());
				   	    			
				   	    			if(status == 0){
				   	    				//预热中-&gt;秒杀中
				   	    				if(ts == "End"){
			Ajax.call('index.php?act=clear_cache', 'POST', 'JSON');
					   	    				window.clearInterval(timerId);
					   	    				$("#ps_cd_<?php echo $this->_var['goods']['goods_id']; ?>").html("");
					   	    				//$("#ps_label_<?php echo $this->_var['goods']['goods_id']; ?>").html("销售中");
					   	    				$("#zhuangtai<?php echo $this->_var['goods']['goods_id']; ?>").removeClass("weikaishi");
					   	    				$("#zhuangtai<?php echo $this->_var['goods']['goods_id']; ?>").addClass("jinxinzhong");
					   	    				$("#ps_labels_<?php echo $this->_var['goods']['goods_id']; ?>").attr("over", true);
					   	    				$("#ps_labele_<?php echo $this->_var['goods']['goods_id']; ?>").attr("over", true);
							$("#ps_labels_<?php echo $this->_var['goods']['goods_id']; ?>").html("还剩");
							$("#ps_labele_<?php echo $this->_var['goods']['goods_id']; ?>").html("结束");
					   	    				status = 1;
					   	    				endDate = new Date(<?php echo $this->_var['goods']['sale_end_time']; ?>);
					   	    				timerId = countdown(countdown_callback, endDate, countdown.DAYS | countdown.HOURS | countdown.MINUTES | countdown.SECONDS);
					   	    			}
				   	    			}else{
				   	    				//秒杀中-&gt;活动已结束
				   	    				if(ts == "End" || new Date().getTime() > endDate.getTime()){
					   	    				window.clearInterval(timerId);
					   	    				$("#ps_cd_<?php echo $this->_var['goods']['goods_id']; ?>").html("");
					   	    				$("#ps_labels_<?php echo $this->_var['goods']['goods_id']; ?>").html("活动已结束");
										Ajax.call('index.php?act=clear_cache', 'POST', 'JSON');
					   	    				$("#nowbuy").html("活动已结束");
										$('#buy_btn').attr('href','javascript:void(0);');
					   	    				$("#ps_labele_<?php echo $this->_var['goods']['goods_id']; ?>").html("");
					   	    				$("#ps_labels_<?php echo $this->_var['goods']['goods_id']; ?>").attr("over", true);
					   	    				$("#ps_labele_<?php echo $this->_var['goods']['goods_id']; ?>").attr("over", true);
					   	    			}
				   	    			}
				   	           	}
				   	           	
				   	            timerId = countdown(countdown_callback, endDate, countdown.DAYS | countdown.HOURS | countdown.MINUTES | countdown.SECONDS);
				            });
		</script>		
                <?php elseif ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?> 
		<script type="text/javascript" src="themes/shengxian/js/lefttime.js"></script>
		<h2><?php echo $this->_var['lang']['promote_price']; ?>：<i id="ECS_SHOPPRICE"><?php echo $this->_var['goods']['promote_price']; ?></i></h2>
                <div class="market_price"><span class="timedown" id="timedown"><i class="iconfont">&#xe607;</i>剩余时间：<strong id="leftTime" class="font_w"><?php echo $this->_var['lang']['please_waiting']; ?></strong></span></div>
                <?php else: ?>
		   <h2><?php echo $this->_var['lang']['shop_price']; ?>：<i id="ECS_SHOPPRICE"><?php echo $this->_var['goods']['shop_price_formated']; ?></i></h2>
	           <?php if ($this->_var['cfg']['show_marketprice']): ?>
	              <div class="market_price"><?php echo $this->_var['lang']['market_price']; ?>：<em><?php echo $this->_var['goods']['market_price']; ?></em></div>
	           <?php endif; ?>
                <?php endif; ?> 

	      <div class="itemStore">
                <?php if ($this->_var['rank_prices']): ?> 
                <a href="javascript:;" id="membership" data-type="normal" class="membership">高级会员购买享有折扣<i class="iconfont">&#xe60b;</i></a>
                <div class="membership_con">
                  <div class="how-bd">
                    <h3>会员价格</h3>
                    <table width="100%">
                      <tbody>
                        <tr>
                          <td width="50%">会员等级</td>
                          <td width="50%">会员价格</td>
                        </tr>
                        <?php $_from = $this->_var['rank_prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'rank_price');$this->_foreach['rank_price'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rank_price']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['rank_price']):
        $this->_foreach['rank_price']['iteration']++;
?>
                        <tr id="ECS_RANKPRICE_<?php echo $this->_var['key']; ?>">
                          <td><?php echo $this->_var['rank_price']['rank_name']; ?></td>
                          <td><?php echo $this->_var['rank_price']['price']; ?></td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php endif; ?> 	      
	      </div>
              <?php if ($this->_var['goods']['is_shipping']): ?>
              <span class="mianyou">免邮</span>
              <?php endif; ?> 
	      <span class="itemMoreInfo"><a href="javascript:;" rel="nofollow">已售出 <span class="sales"><?php echo $this->_var['sales_count']; ?></span></a>|<a href="javascript:;" rel="nofollow"><?php echo $this->_var['goods']['comments_number']; ?> 人评价</a></span>
	    </div>

            <ul>
              <?php if ($this->_var['cfg']['show_goodssn']): ?>
              <li> <span class="lbl"><?php echo $this->_var['lang']['goods_sn']; ?></span> <em><?php echo $this->_var['goods']['goods_sn']; ?></em> </li>
              
              <?php endif; ?> 
              
              <?php if ($this->_var['cfg']['show_addtime']): ?>
              <li> <span class="lbl"><?php echo $this->_var['lang']['add_time']; ?></span> <em><?php echo $this->_var['goods']['add_time']; ?></em> </li>
              
              <?php endif; ?> 
              <?php if ($this->_var['cfg']['show_goodsweight']): ?>
              <li> <span class="lbl"><?php echo $this->_var['lang']['goods_weight']; ?></span> <em><?php echo $this->_var['goods']['goods_weight']; ?></em> </li>
              <?php endif; ?> 
              
              <?php if ($this->_var['goods']['goods_brand'] != "" && $this->_var['cfg']['show_brand']): ?>
              <li><span class="lbl">品&nbsp;&nbsp;&nbsp;牌</span><a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>" target="_blank">进入&nbsp;<font style="color:#1ac14b;"><?php echo $this->_var['goods']['goods_brand']; ?></font>&nbsp;品牌馆</a></li>
              <?php endif; ?> 
              
              <?php if ($this->_var['goods']['give_integral'] > 0): ?>
              <li><span><?php echo $this->_var['lang']['goods_give_integral']; ?>可获<em class="red"><?php echo $this->_var['goods']['give_integral']; ?></em><?php echo $this->_var['points_name']; ?></span></li>
              <?php endif; ?> 
              
              <?php if ($this->_var['cfg']['use_integral']): ?>
              <li><span><?php echo $this->_var['lang']['goods_integral']; ?><em class="red"><?php echo $this->_var['goods']['integral']; ?></em><?php echo $this->_var['points_name']; ?></span></li>
              <?php endif; ?>
              
    
              <?php if ($this->_var['promotion']): ?>
              <li style="color:#666;"> 
                <?php $_from = $this->_var['promotion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?> 
                <span class="lbl"><?php echo $this->_var['lang']['activity']; ?></span>
                <?php if ($this->_var['item']['type'] == "snatch"): ?> 
                <a href="snatch.php" title="<?php echo $this->_var['lang']['snatch']; ?>" style="font-weight:100; color:#1ac14b; text-decoration:none;">[<?php echo $this->_var['lang']['snatch']; ?>]</a> 
                <?php elseif ($this->_var['item']['type'] == "group_buy"): ?> 
                <a href="group_buy.php" title="<?php echo $this->_var['lang']['group_buy']; ?>" style="font-weight:100; color:#1ac14b; text-decoration:none;">[<?php echo $this->_var['lang']['group_buy']; ?>]</a> 
                <?php elseif ($this->_var['item']['type'] == "auction"): ?> 
                <a href="auction.php" title="<?php echo $this->_var['lang']['auction']; ?>" style="font-weight:100; color:#1ac14b; text-decoration:none;">[<?php echo $this->_var['lang']['auction']; ?>]</a> 
                <?php elseif ($this->_var['item']['type'] == "favourable"): ?> 
                <a href="activity.php" title="<?php echo $this->_var['lang']['favourable']; ?>" style="font-weight:100; color:#1ac14b; text-decoration:none;">[<?php echo $this->_var['lang']['favourable']; ?>]</a> 
                <?php endif; ?> 
                <a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo $this->_var['lang'][$this->_var['item']['type']]; ?> <?php echo $this->_var['item']['act_name']; ?><?php echo $this->_var['item']['time']; ?>" style="font-weight:100; color:#1ac14b;"><?php echo $this->_var['item']['act_name']; ?></a><br />
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              </li>
              <?php endif; ?>
              
            </ul>
          </dd>
          
           
          
          
          
          <dd class="tobuy-box cle">
            <ul class="sku">
              
               
              <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
                <div> 
                 <span class="lbl2"><?php echo $this->_var['spec']['name']; ?></span>
                   
                  <?php if ($this->_var['spec']['attr_type'] == 1): ?> 
                  <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?> 
                  
                  <input type="hidden" name="spec_attr_type" value="<?php echo $this->_var['spec_key']; ?>">
                  <div class="ys_xuan" id="xuan_<?php echo $this->_var['spec_key']; ?>">
                    <div class="catt" id="catt_<?php echo $this->_var['spec_key']; ?>"> 
                      <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?> 
                      <a<?php if ($this->_var['value']['img_url']): ?> rev=<?php echo $this->_var['value']['img_url']; ?> rel="zoom-id: Zoomer" href="<?php echo $this->_var['value']['img_original']; ?>"<?php endif; ?> <?php if ($this->_var['value']['disabled']): ?>class="wuxiao"<?php else: ?><?php if ($this->_var['value']['selected_key_mb5'] == '1'): ?>class="cattsel"<?php endif; ?><?php endif; ?> onclick="<?php if ($this->_var['value']['disabled']): ?><?php else: ?>show_attr_status(this,<?php echo $this->_var['goods']['goods_id']; ?><?php if ($this->_var['attr_id']): ?>,<?php echo $this->_var['attr_id']; ?><?php endif; ?>);<?php if ($this->_var['spec_key'] == $this->_var['attr_id']): ?>get_gallery_attr(<?php echo $this->_var['id']; ?>, <?php echo $this->_var['value']['id']; ?>);<?php endif; ?><?php endif; ?>" name="<?php echo $this->_var['value']['id']; ?>" id="xuan_a_<?php echo $this->_var['value']['id']; ?>">
		      <p <?php if ($this->_var['value']['thumb_url']): ?>class="padd" style="background:url(<?php echo $this->_var['value']['thumb_url']; ?>) no-repeat transparent;"<?php elseif ($this->_var['value']['hex_color'] != ''): ?>style="background:#<?php echo $this->_var['value']['hex_color']; ?>; height:40px; width:40px"<?php else: ?>style="padding:6px 10px;"<?php endif; ?> title="<?php echo $this->_var['value']['label']; ?>">
		      <?php if ($this->_var['value']['thumb_url']): ?>
		      <img src="<?php echo $this->_var['value']['thumb_url']; ?>" width="40" height="40" alt="<?php echo $this->_var['value']['label']; ?>">
		      <?php elseif ($this->_var['value']['hex_color']): ?>
		      <?php else: ?>
                      <em><?php echo $this->_var['value']['label']; ?></em>
                      <?php endif; ?>
                      <i></i>
                      </p>
                      <input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['value']['selected_key_mb5'] == '1'): ?>checked<?php endif; ?> />
                      </a> 
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                    </div>
                  </div>
                  <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                   
                  <?php else: ?>
                  <select name="spec_<?php echo $this->_var['spec_key']; ?>">
                    <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                    <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </select>
                  <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                  <?php endif; ?> 
                  <?php else: ?> 
                  <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                  <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
                    <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                    <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label>
                  <br />
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                  <?php endif; ?> 
                </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              
              <script type="text/javascript">
var myString=new Array();

<?php $_from = $this->_var['prod_exist_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('pkey', 'prod');if (count($_from)):
    foreach ($_from AS $this->_var['pkey'] => $this->_var['prod']):
?>
myString[<?php echo $this->_var['pkey']; ?>]="<?php echo $this->_var['prod']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</script> 
               
              
              
              <li class="skunum_li cle"> <span class="lbl">数&nbsp;&nbsp;&nbsp;量</span>
                <div class="skunum" id="skunum"> <span class="minus" title="减少1个数量"><i>-</i></span>
                  <input id="number" name="number" type="text" min="1" value="1" onchange="countNum(0)">
                  <span class="add" title="增加1个数量"><i>+</i></span> <cite class="storage"> <?php if ($this->_var['goods']['measure_unit']): ?><?php echo $this->_var['goods']['measure_unit']; ?><?php else: ?>件<?php endif; ?> </cite> 
		</div>
		<div class="skunum" id="skunum">
              <?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber']): ?> 
             <cite class="storage">(<font id="shows_number">载入中···</font>)</cite>
              <?php endif; ?> 
		</div>
              </li>
              
              
              <li class="add_cart_li"> <a href="javascript:addToCart_quick(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn-buy" id="buy_btn"><font id="nowbuy">立即购买</font></a> <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn" id="buy_btn"><font id="nowbuy">加入购物车</font></a> <a id="fav-btn" class="graybtn" href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)"><i class="iconfont">&#xe606;</i>收藏</a> 
	      <a href="javascript:;" class="btn_wap" id="phone">去手机购买
		<div style="display: none;" id="phone_tan"> <span class="arr"></span>
                  <div class="m-qrcode-wrap"> <img width="100" height="100" src="erweima_png.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"> </div>
                </div>
	      </a>
              <script type="text/javascript">
		$("#phone").mouseover( function(){	
			$( "#phone_tan" ).show();
		});
		$("#phone").mouseleave( function(){
			$( "#phone_tan" ).hide();
		});
              </script> 
	      </li>
	    </ul>
          </dd>
        </dl>
      </div>
    </form>
    </div>
  <div class="detail_bgcolor">
    <div class="z-detail-box cle">
      <div class="z-detail-left">
      
      <?php echo $this->fetch('library/goods_fittings.lbi'); ?> 
      
        <div class="itemContent">
		<ul class="itemContentHead" id="D1">
			<li data-position="D1" class="itemContentHeadFocus"><a href="javascript:void(0);">产品介绍</a></li>
			<li data-position="D2"><a href="javascript:void(0);">规格参数</a></li>
			<li data-position="D3"><a href="javascript:void(0);">评价 <em>(<?php echo $this->_var['goods']['comments_number']; ?>)</em></a></li>
		</ul>
	</div>
        <div class="product_tabs">
          <div class="sectionbox z-box">
            <div class="spxq_main">
              <div class="spxq_dec"><?php echo $this->_var['goods']['goods_desc']; ?></div>
            </div>
          </div>
          <div id="D2" class="z-box sectionbox itemSpan">
	      <h4>规格参数</h4>
	      <div class="spxq_main">
                  <table>
                    <tbody>
                      <tr>
                        <td width="20%" class="th"> 产品名称 :</td>
                        <td width="80%"> <?php echo $this->_var['goods']['goods_name']; ?></td>
                      </tr>
                      <?php if ($this->_var['goods']['goods_brand'] != "" && $this->_var['cfg']['show_brand']): ?>
                      <tr>
                        <td width="20%" class="th"> 产品品牌 :</td>
                        <td width="80%"> <?php echo $this->_var['goods']['goods_brand']; ?></td>
                      </tr>
                      <?php endif; ?> 
                      <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?> 
                      <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
                      <tr>
                        <td width="64" class="th"> <?php echo htmlspecialchars($this->_var['property']['name']); ?>:</td>
                        <td> <?php echo $this->_var['property']['value']; ?></td>
                      </tr>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                  </table>
	      </div>
          </div>
          <div id="D3" class="z-box sectionbox itemSpan">
	      <h4>用户评价</h4>
              <?php echo $this->fetch('library/comments.lbi'); ?>
          </div>
        </div>
      </div>
	  
	  <div class="z-detail-right">
	  
<?php echo $this->fetch('library/goods_related.lbi'); ?>

		<?php if ($this->_var['best_goods']): ?>
	  	<div class="tabs_bar_right">
			<div class="tabs_bar2">精品推荐</div>
		</div>
	  	<div class="hot_box">
			<ul>
				<?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_08844400_1541602044');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_08844400_1541602044']):
        $this->_foreach['goods']['iteration']++;
?>
				<?php if ($this->_foreach['goods']['iteration'] < 6): ?>
				<li>
					<a href="<?php echo $this->_var['goods_0_08844400_1541602044']['url']; ?>" target="_self">
						<img width="194px" height="194px" data-original="<?php echo $this->_var['goods_0_08844400_1541602044']['thumb']; ?>" src="themes/shengxian/images/spacer.gif" class="loading" />
						<p><?php echo $this->_var['goods_0_08844400_1541602044']['short_style_name']; ?></p>
						<p class="hot_price">
							<?php if ($this->_var['goods_0_08844400_1541602044']['promote_price'] != ""): ?>
          					<?php echo $this->_var['goods_0_08844400_1541602044']['promote_price']; ?>
          					<?php else: ?>
          					<?php echo $this->_var['goods_0_08844400_1541602044']['shop_price']; ?>
          					<?php endif; ?>
						</p>
					</a>
				</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
		<div class="h15"></div>
		<?php endif; ?>
	  
<?php echo $this->fetch('library/goods_article.lbi'); ?>

	  </div>
	  
	  
    </div>
  </div>
</div>

<div class="itemBar" style="">
	<div class="wrapper">
		<div class="itemBuy"><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="itemAddCart">加入购物车</a></div>
		<div class="itemMin" title="<?php echo $this->_var['goods']['goods_style_name']; ?>">
			<span><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></span>
			<p><?php echo $this->_var['goods']['goods_style_name']; ?></p>
		</div>
		<ul class="itemContentHead" id="iteamBarHead">
			<li id="H1" data-position="D1" class="itemContentHeadFocus"><a href="javascript:void(0);">产品介绍</a></li>
			<li id="H2" data-position="D2"><a href="javascript:void(0);">规格参数</a></li>
			<li id="H3" data-position="D3"><a href="javascript:void(0);">评价 <em>(<?php echo $this->_var['goods']['comments_number']; ?>)</em></a></li>
		</ul>
	</div>
</div>

<div class="add_ok" id="cart_show">
    <div class="tip">
        <i class="iconfont">&#xe60c;</i>商品已成功加入购物车
    </div>
    <div class="go">
        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
        <a href="flow.php" class="btn">去结算</a>
    </div>
</div>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  changeKucun();//这里是添加的
  fixpng();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);

  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    
    if (document.getElementById('ECS_SHOPPRICE'))
      document.getElementById('ECS_SHOPPRICE').innerHTML = res.shop_price;
    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
	
  }
}

</script>
</html>
