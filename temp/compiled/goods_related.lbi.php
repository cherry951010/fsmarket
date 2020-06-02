<?php if ($this->_var['related_goods']): ?>
	  	<div class="tabs_bar_right">
			<div class="tabs_bar2">你可能还喜欢</div>
		</div>
	  	<div class="hot_box">
			<ul>
				<?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_21565900_1541926329');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_21565900_1541926329']):
?>
				<li>
					<a href="<?php echo $this->_var['goods_0_21565900_1541926329']['url']; ?>" target="_self">
						<img width="194px" height="194px" data-original="<?php echo $this->_var['goods_0_21565900_1541926329']['goods_thumb']; ?>" src="themes/shengxian/images/spacer.gif" class="loading" />
						<p><?php echo $this->_var['goods_0_21565900_1541926329']['goods_name']; ?></p>
						<p class="hot_price">
							<?php if ($this->_var['goods_0_21565900_1541926329']['promote_price'] != ""): ?>
          					<?php echo $this->_var['goods_0_21565900_1541926329']['promote_price']; ?>
          					<?php else: ?>
          					<?php echo $this->_var['goods_0_21565900_1541926329']['shop_price']; ?>
          					<?php endif; ?>
						</p>
					</a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
		<div class="h15"></div>
<?php endif; ?>
