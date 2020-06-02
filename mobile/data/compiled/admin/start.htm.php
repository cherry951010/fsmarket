<!-- $Id: start.htm 17216 2011-01-19 06:03:12Z liubo $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php if ($this->_var['admin_msg']): ?>
<div class="list-div" style="border: 1px solid #CC0000">
  <table cellspacing='1' cellpadding='3'>
    <tr>
      <th><?php echo $this->_var['lang']['pm_title']; ?></th>
      <th><?php echo $this->_var['lang']['pm_username']; ?></th>
      <th><?php echo $this->_var['lang']['pm_time']; ?></th>
    </tr>
    <?php $_from = $this->_var['admin_msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'msg');if (count($_from)):
    foreach ($_from AS $this->_var['msg']):
?>
      <tr align="center">
        <td align="left"><a href="message.php?act=view&id=<?php echo $this->_var['msg']['message_id']; ?>"><?php echo sub_str($this->_var['msg']['title'],60); ?></a></td>
        <td><?php echo $this->_var['msg']['user_name']; ?></td>
        <td><?php echo $this->_var['msg']['send_date']; ?></td>
      </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  </div>
<br />
<?php endif; ?>
<!-- end personal message -->

<div class="list-div">
	<div class="important">
    	<ul>
        	<li class="item01">
            	<div class="con_box">
                	<img src="images/icon01.png" />
                	<h2>今日销售总额</h2>
                    <p><!--<?php if ($this->_var['today']['formatted_money']): ?>--><?php echo $this->_var['today']['formatted_money']; ?><!--<?php else: ?>-->0.00<!--<?php endif; ?>--></p>
                </div>
            </li>
            <li class="item02">
            	<div class="con_box">
                	<img src="images/icon02.png" />
                	<h2>今日订单总数</h2>
                    <p><?php echo $this->_var['today']['order']; ?></p>
                </div>
            </li>
            <li class="item03">
            	<div class="con_box">
                	<img src="images/icon03.png" />
                	<h2>今日注册会员</h2>
                    <p><?php echo $this->_var['today']['user']; ?></p>
                </div>
            </li>
        </ul>
    </div>
	<div class="console_detaile">
    	<ul>
        	<li class="item01">
            	<div class="con_box clearfix">
                    <div class="img"><img src="images/iconfont-weiqueren.png" width="30" height="30" /></div>
                    <div class="text"><h2><?php echo $this->_var['lang']['unconfirmed']; ?></h2><p><a href="javascript:void(0);"><?php echo $this->_var['order']['unconfirmed']; ?></a></p></div>
                </div>
            </li><li class="item02">
            	<div class="con_box clearfix">
                    <div class="img"><img src="images/iconfont-daizhifu.png" width="30" height="30" /></div>
                	<div class="text"><h2><?php echo $this->_var['lang']['await_pay']; ?></h2><p><a href="javascript:void(0);"><?php echo $this->_var['order']['await_pay']; ?></a></p></div>
                </div>
            </li><li class="item03">
            	<div class="con_box clearfix">
                    <div class="img"><img src="images/iconfont-daifahuo.png" width="30" height="30" /></div>
                	<div class="text"><h2><?php echo $this->_var['lang']['await_ship']; ?></h2><p><a href="javascript:void(0);"><?php echo $this->_var['order']['await_ship']; ?></a></p></div>
                </div>
            </li><li class="item04">
            	<div class="con_box clearfix">
                    <div class="img"><img src="images/iconfont-iconsvggyiwancheng18.png" width="30" height="30" /></div>
                	<div class="text"><h2><?php echo $this->_var['lang']['finished']; ?></h2><p><a href="javascript:void(0);"><?php echo $this->_var['order']['finished']; ?></a></p></div>
                </div>
            </li><li class="item05">
            	<div class="con_box clearfix">
                    <div class="img"><img src="images/iconfont-dengji.png" width="30" height="30" /></div>
                	<div class="text clearfix"><h2><?php echo $this->_var['lang']['new_booking']; ?></h2><p><a href="javascript:void(0);"><?php echo $this->_var['booking_goods']; ?></a></p></div>
                </div>
            </li><li class="item07">
            	<div class="con_box clearfix">
                    <div class="img"><img src="images/iconfont-iconfeature.png" width="30" height="30" /></div>
                	<div class="text"><h2><?php echo $this->_var['lang']['new_reimburse']; ?></h2><p><a href="javascript:void(0);"><?php echo $this->_var['new_repay']; ?></a></p></div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="list-div">
	<div class="order_count">
        <p style="position:absolute; margin:-1px 0 0 0;"><span class="tab_front" style="font-size:20px;"><strong><?php echo $this->_var['thismonth']; ?>月订单统计</strong></span></p>
        <div style='height:400px;' id='order_chart_div'></div>
    </div>
</div>
<br />
<div class="list-div">
	<div class="order_count">
        <p style="position:absolute; margin:-1px 0 0 0;"><span class="tab_front" style="font-size:20px;"><strong><?php echo $this->_var['thismonth']; ?>月销售额统计</strong></span></p>
        <div style='height:400px;' id='sales_chart_div'></div>
    </div>
</div>
</div>
<br />
<!-- start system information -->
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title"><?php echo $this->_var['lang']['system_info']; ?></th>
  </tr>
  <tr>
    <td width="20%"><?php echo $this->_var['lang']['os']; ?></td>
    <td width="30%"><?php echo $this->_var['sys_info']['os']; ?> (<?php echo $this->_var['sys_info']['ip']; ?>)</td>
    <td width="20%"><?php echo $this->_var['lang']['web_server']; ?></td>
    <td width="30%"><?php echo $this->_var['sys_info']['web_server']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['php_version']; ?></td>
    <td><?php echo $this->_var['sys_info']['php_ver']; ?></td>
    <td><?php echo $this->_var['lang']['mysql_version']; ?></td>
    <td><?php echo $this->_var['sys_info']['mysql_ver']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['safe_mode']; ?></td>
    <td><?php echo $this->_var['sys_info']['safe_mode']; ?></td>
    <td><?php echo $this->_var['lang']['safe_mode_gid']; ?></td>
    <td><?php echo $this->_var['sys_info']['safe_mode_gid']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['socket']; ?></td>
    <td><?php echo $this->_var['sys_info']['socket']; ?></td>
    <td><?php echo $this->_var['lang']['timezone']; ?></td>
    <td><?php echo $this->_var['sys_info']['timezone']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['gd_version']; ?></td>
    <td><?php echo $this->_var['sys_info']['gd']; ?></td>
    <td><?php echo $this->_var['lang']['zlib']; ?></td>
    <td><?php echo $this->_var['sys_info']['zlib']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['ip_version']; ?></td>
    <td><?php echo $this->_var['sys_info']['ip_version']; ?></td>
    <td><?php echo $this->_var['lang']['max_filesize']; ?></td>
    <td><?php echo $this->_var['sys_info']['max_filesize']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['ecs_version']; ?></td>
    <td><?php echo $this->_var['ecs_version']; ?> RELEASE <?php echo $this->_var['ecs_release']; ?></td>
    <td><?php echo $this->_var['lang']['install_date']; ?></td>
    <td><?php echo $this->_var['install_date']; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->_var['lang']['ec_charset']; ?></td>
    <td><?php echo $this->_var['ecs_charset']; ?></td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>

<?php echo $this->smarty_insert_scripts(array('files'=>'./js/echarts-all.js')); ?>
<script type="Text/Javascript" language="JavaScript">
    var order_chart = echarts.init(document.getElementById('order_chart_div'));
    order_chart.setOption(<?php echo $this->_var['orders_option']; ?>);
    var sales_chart = echarts.init(document.getElementById('sales_chart_div'));
    sales_chart.setOption(<?php echo $this->_var['sales_option']; ?>);
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'../data/static/js/utils.js')); ?>
<script type="Text/Javascript" language="JavaScript">
onload = function()
{
  /* 检查订单 */
  startCheckOrder();
}
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>