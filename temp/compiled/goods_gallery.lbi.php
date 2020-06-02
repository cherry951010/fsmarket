<div class="detail_img" id="detail_img">
  <div class="pic_view" id="li_<?php echo $this->_var['goods']['goods_id']; ?>"> <a href="<?php echo $this->_var['pictures']['0']['img_url']; ?>" class="MagicZoomPlus" id="Zoomer" rel="hint-text: ; selectors-effect: false; selectors-class: current; zoom-distance: 10;zoom-width: 400; zoom-height: 400;"> <img id="J_prodImg"  alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" data-original="<?php if ($this->_var['pictures']['0']['img_url']): ?><?php echo $this->_var['pictures']['0']['img_url']; ?><?php else: ?><?php echo $this->_var['goods']['goods_img']; ?><?php endif; ?>" src="themes/shengxian/images/spacer.gif" class="loading pic_img_<?php echo $this->_var['goods']['goods_id']; ?>"> </a> </div>
  <div class="item-thumbs" id="item-thumbs">
  <a class="prev" href="javascript:void(0);"></a>
  <a class="next" href="javascript:void(0);"></a>
    <div class="bd">
    <ul class="cle">
      <?php if ($this->_var['pictures']): ?> 
      <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['foo']['iteration']++;
?>
      <li <?php if (($this->_foreach['foo']['iteration'] <= 1)): ?>class="current"<?php endif; ?>> <a href="<?php if ($this->_var['picture']['img_url']): ?><?php echo $this->_var['picture']['img_url']; ?><?php else: ?><?php echo $this->_var['picture']['thumb_url']; ?><?php endif; ?>" rel="zoom-id: Zoomer" rev="<?php if ($this->_var['picture']['img_url']): ?><?php echo $this->_var['picture']['img_url']; ?><?php else: ?><?php echo $this->_var['picture']['thumb_url']; ?><?php endif; ?>"> <img data-original="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" src="themes/shengxian/images/spacer.gif" class="loading" alt="<?php echo $this->_var['goods']['goods_name']; ?>"> </a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
      <?php endif; ?>
    </ul>
    </div>
  </div>
  <div class="baidu_share">
<div class="bdsharebuttonbox"><p style="float:left;">分享商品：</p><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_fbook" data-cmd="fbook" title="分享到Facebook"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>  
  </div>
</div>
