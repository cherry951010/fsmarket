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
<link href="themes/shengxian/common.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,global.js,compare.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="brandbody">
  <header id="recomHeader" class="m-header m-recomHeader">
    <h3>品牌逛不停</h3>
  </header>
  <article class="m-recomBrand">
    <section class="rowOfFour clearfix">
    <?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand_data');$this->_foreach['brand_list_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_list_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['brand_data']):
        $this->_foreach['brand_list_foreach']['iteration']++;
?>
        <div class="brandWrap clearfix">
	  <a class="brandDesc fl" href="<?php echo $this->_var['brand_data']['url']; ?>" style="top: 0px;"><img class="brandLogo loading" data-original="data/brandlogo/<?php echo $this->_var['brand_data']['brand_logo']; ?>" src="themes/shengxian/images/spacer.gif" title="<?php echo htmlspecialchars($this->_var['brand_data']['brand_name']); ?>" alt="<?php echo htmlspecialchars($this->_var['brand_data']['brand_name']); ?>" style="display: block;">
          <p class="brandName" title="<?php echo htmlspecialchars($this->_var['brand_data']['brand_name']); ?>"><?php echo $this->_var['brand_data']['brand_name']; ?></p>
          <span class="brandBtn">进入品牌</span>
	  </a>
	</div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </section>
  </article>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</div>
</body>
</html>
