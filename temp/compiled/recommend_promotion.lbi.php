<?php if ($this->_var['promotion_goods']): ?>
<div class="product-new">
      <div class="fresh-cont">

<div class="madden-today recommend-pro">
	<h2>
		<dl class="clearfix">
			<dt class="fl">每日特价</dt>
			<dd class="fl">
				<a target="_blank">
				<img data-order="100" src="themes/shengxian/images/mrtj.jpg" height="0" width="0" border="0">
				</a>
			</dd>
			<dd class="fr">
			</dd>
		</dl>
	</h2>
	<div class="madden-pro">
		<ul class="clearfix">
		<?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>	
			<li>
				<a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="imgChange" target="_blank">
					<img src="<?php echo $this->_var['goods']['thumb']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>">
				</a>
				<div class="inforBox">
					<p class="txtBt"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['name']); ?></a></p>
					<p class="txtInfor"><a title="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['brief']; ?></a></p>
					<div class="buy-btn ">
						<span>促销价:</span><span class="tj"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></span>
						<a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>"> 去看看</a>
					</div>
				</div>
			</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
</div>

      </div>
</div>
<?php endif; ?>