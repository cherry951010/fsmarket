<?php if ($this->_var['goods_article_list']): ?>
	  	<div class="tabs_bar_right">
			<div class="tabs_bar2">资讯信息</div>
		</div>
	  	<div class="hot_box">
			<ul>
				<?php $_from = $this->_var['goods_article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['article'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['article']['iteration']++;
?>
				<?php if ($this->_foreach['article']['iteration'] < 10): ?>
				<li>
					<a href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" target="blank">
						<p><?php echo htmlspecialchars($this->_var['article']['short_title']); ?></p>
					</a>
				</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
		<div class="h15"></div>
<?php endif; ?>