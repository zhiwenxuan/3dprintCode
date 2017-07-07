<div class="nav_left">
    <div class="nav_lfet_top">&nbsp;&nbsp;&nbsp;会员中心</div>
    <ul>
        <li class="top">订单中心</li>
        <li><a href="<?=$this->createUrl('/order/index')?>">我的订单</a></li>
        <li><a href="<?=$this->createUrl('/order/needpay')?>">待付款订单</a></li>
        <li><a href="<?=$this->createUrl('/order/overpay')?>">已付款订单</a></li>
        
        <li><a href="<?=$this->createUrl('/order/overorder')?>">已完成订单</a></li>
        <li><a href="<?=$this->createUrl('/order/cancelorder')?>">已取消订单</a></li>
        <li class="bottom"></li>
    </ul>
    <ul>
        <li class="top">模型中心</li>
        <li><a href="<?=$this->createUrl('/product/create')?>">上传模型</a></li>
        <li><a href="<?=$this->createUrl('/product/manage')?>">我的模型</a></li>
        <li><a href="<?=$this->createUrl('/product/verify')?>">待审核的模型</a></li>
        <li><a href="<?=$this->createUrl('/download/index')?>">下载记录</a></li>
        <li class="bottom"></li>
    </ul>
    <ul>
        <li class="top">卖家中心</li>
        <li><a href="<?=$this->createUrl('/product/pUp')?>">已上架模型</a></li>
        <li><a href="<?=$this->createUrl('/product/pDown')?>">未上架模型</a></li>
        <li><a href="<?=$this->createUrl('/product/pBuys')?>">购买记录</a></li>
        <li class="bottom"></li>
    </ul>
    <ul>
        <li class="top">我的博客</li>
        <li><a href="<?=$this->createUrl('/blogLog/create')?>">发布博客</a></li>
        <li class="bottom"></li>
    </ul>
    <ul>
        <li class="top">帐户中心</li>
        <li><a href="<?php echo $this->createUrl('customer/edit', array('id'=>Yii::app()->user->id)) ?>">账户信息</a></li>
        <li><a href="<?php echo $this->createUrl('customer/pwd', array('id'=>Yii::app()->user->id)) ?>">密码修改</a></li>
        <li><a href="<?php echo $this->createUrl('address/index') ?>">我的收货地址</a></li>
        <li class="bottom"></li>
    </ul>
</div>