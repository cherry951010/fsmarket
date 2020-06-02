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
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div id="wrapper">
	<div class="BonuspageTitle"><?php 
$k = array (
  'name' => 'ads',
  'id' => '33',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
	<div class="BonusList">
		<?php $_from = $this->_var['bonus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');$this->_foreach['bonus'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bonus']['total'] > 0):
    foreach ($_from AS $this->_var['bonus']):
        $this->_foreach['bonus']['iteration']++;
?>
		<?php if ($this->_var['bonus']['type_id']): ?>
		<dl>
			<dt>
				<div class="jine"><?php echo $this->_var['bonus']['type_money']; ?></div>
				<a href="bonus.php?act=getBonus&type_id=<?php echo $this->_var['bonus']['type_id']; ?>" class="getBonus">点击领取</a>
			</dt>
			<dd>
				<div class="tiaojian">订单满<font class="j"><?php echo $this->_var['bonus']['min_goods_amount']; ?></font>可用</div>
				<div class="time"><font class="tt"><?php echo $this->_var['bonus']['use_start_date']; ?></font>到<font class="tt"><?php echo $this->_var['bonus']['use_end_date']; ?></font>使用</div>
			</dd>
			<div class="blank1"></div>
		</dl>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		<div class="clear"></div> 
	</div>
</div>









</div>
<div class="blank"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>

