<?php
$sortnum=$GLOBALS['smarty']->_var['sortnum'];
if($sortnum=='')
{
 $sortnum==0;
}
$sortnum=$sortnum+1;
$GLOBALS['smarty']->assign('sortnum',$sortnum);
$catid=$GLOBALS['smarty']->_var['goods_cat']['id'];
$catname=$GLOBALS['smarty']->_var['goods_cat']['name'];
?>
<div class="cn-laytit">
	<div class="title">
		<h3 class="floor_h<?php echo $this->_var['sortnum']; ?>"><?php echo $this->_var['sortnum']; ?>F <?php echo $this->_var['goods_cat']['name']; ?></h3>
	</div>
	<a class="cat_goods_more cat_goods_more_<?php echo $this->_var['sortnum']; ?>" href="<?php echo $this->_var['goods_cat']['url']; ?>">更多</a>
	<div class="link link<?php echo $this->_var['sortnum']; ?>">
		<?php $_from = get_child_tree($catid); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_tree');$this->_foreach['child_tree'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_tree']['total'] > 0):
    foreach ($_from AS $this->_var['child_tree']):
        $this->_foreach['child_tree']['iteration']++;
?>
			<?php if (($this->_foreach['child_tree']['iteration'] - 1) < 12): ?> 
				<a href="<?php echo $this->_var['child_tree']['url']; ?>" title="<?php echo $this->_var['child_tree']['name']; ?>" target="_blank" <?php if ($this->_var['child_tree']['is_show_hot'] == 1): ?>class="hot"<?php endif; ?>><?php echo $this->_var['child_tree']['name']; ?></a>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>
<div class="cn-fruit cn-fruit-<?php echo $this->_var['sortnum']; ?>">

  <div class="banner">
    <?php
	$GLOBALS['smarty']->assign('index_image1',get_advlist('首页'.$sortnum.'F分类商品左侧广告', 1));
    ?>
    <?php $_from = $this->_var['index_image1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image1']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image1']['iteration']++;
?>
		<div class="ban">
		  <a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank"><img data-original="<?php echo $this->_var['ad']['image']; ?>" src="themes/shengxian/images/spacer.gif" class="loading" height="450" width="200"></a>
		</div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  <div class="goods">
    <ul>
    <?php $_from = $this->_var['cat_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_79133800_1541601989');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_79133800_1541601989']):
        $this->_foreach['goods']['iteration']++;
?>
      <li id="li_<?php echo $this->_var['goods_0_79133800_1541601989']['id']; ?>">
        <div class="item">
          <div class="img">
            <a href="<?php echo $this->_var['goods_0_79133800_1541601989']['url']; ?>">
              <img data-original="<?php echo $this->_var['goods_0_79133800_1541601989']['thumb']; ?>" src="themes/shengxian/images/spacer.gif" class="loading pic_img_<?php echo $this->_var['goods_0_79133800_1541601989']['id']; ?>" height="150" width="150"></a>
          </div>
          <div class="tit">
            <a href="<?php echo $this->_var['goods_0_79133800_1541601989']['url']; ?>"><?php echo sub_str($this->_var['goods_0_79133800_1541601989']['name'],12); ?></a></div>
          <div class="btns">
            <div class="pri j_comPrice">
              <b class="j_sellPrice"><?php if ($this->_var['goods_0_79133800_1541601989']['promote_price'] != ""): ?><?php echo $this->_var['goods_0_79133800_1541601989']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_79133800_1541601989']['shop_price']; ?><?php endif; ?></b></div>
            <a class="addtocart j_addToCartAysn" href="javascript:addToCart(<?php echo $this->_var['goods_0_79133800_1541601989']['id']; ?>)">加入购物车</a></div>
        </div>
      </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
  </div>
  <div class="banner">
    <?php
	$GLOBALS['smarty']->assign('index_image2',get_advlist('首页'.$sortnum.'F分类商品右侧广告', 1));
    ?>
    <?php $_from = $this->_var['index_image2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image2']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image2']['iteration']++;
?>
		<div class="ban">
		  <a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank"><img data-original="<?php echo $this->_var['ad']['image']; ?>" src="themes/shengxian/images/spacer.gif" class="loading" height="450" width="200"></a>
		</div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
</div>

    <?php
	$GLOBALS['smarty']->assign('index_image1',get_advlist('首页'.$sortnum.'F分类商品底部广告', 1));
    ?>
    <?php $_from = $this->_var['index_image1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image1']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image1']['iteration']++;
?>
		<div class="cat_bottom_ad">
		  <a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank"><img data-original="<?php echo $this->_var['ad']['image']; ?>" src="themes/shengxian/images/spacer.gif" class="loading"></a>
		</div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
