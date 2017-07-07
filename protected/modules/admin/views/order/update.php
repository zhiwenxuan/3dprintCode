<div class="container-fluid"> 
  
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
    <div class="span12"> 
      
      <!-- BEGIN STYLE CUSTOMIZER -->
      <!-- END BEGIN STYLE CUSTOMIZER --> 
      
      
      
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      
      <h3 class="page-title"> 订单中心 <small></small> </h3>
      <ul class="breadcrumb">
        <li> <i class="icon-home"></i> 首页 <i class="icon-angle-right"></i> </li>
        <li>订单中心 <i class="icon-angle-right"></i></li>
        <li>订单管理 <i class="icon-angle-right"></i></li>
        <li>编辑订单</li>
      </ul>
      
      <!-- END PAGE TITLE & BREADCRUMB--> 
      
    </div>
  </div>
  <!-- END PAGE HEADER-->
  
  
  <!-- BEGIN PAGE CONTENT-->
  <div class="row-fluid">
      <div class="span12">
      
          <!-- BEGIN SAMPLE FORM PORTLET-->   
          <div class="portlet box grey">
          
          
              <div class="portlet-title">
                  <div class="caption"><i class="icon-reorder"></i>编辑订单</div>
                  <div class="tools">
                      <a href="javascript:;" class="collapse"></a>
                  </div>
              </div>

              <div class="portlet-body form form-horizontal">
              <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'order-form',
					'enableAjaxValidation'=>false,
					 'htmlOptions' => array('enctype' => 'multipart/form-data'),
					));
			  ?>
              
              <div class="control-group">
                  <label class="control-label">订单编号：</label>
                  <div class="controls">
                      <span class="help-inline"><?=$dataProvider->id?></span>
                  </div>
              </div>
              
              <div class="control-group">
                  <label class="control-label">状态：</label>
                  <div class="controls">
                     <select id="order_stat" class="small m-wrap" tabindex="1" name="stat">
                        <option value="1"  <?php if($dataProvider->order_stat == 1) echo 'selected="selected"'; ?>>&nbsp;待付款&nbsp;</option>
                        <option value="2" <?php if($dataProvider->order_stat == 2) echo 'selected="selected"'; ?>>&nbsp;已付款&nbsp;</option>
                        <option value="4" <?php if($dataProvider->order_stat == 4) echo 'selected="selected"'; ?>>&nbsp;交易成功&nbsp;</option>
                        <option value="5" <?php if($dataProvider->order_stat == 5) echo 'selected="selected"'; ?>>&nbsp;已取消&nbsp;</option>
                    </select>
                  </div>
              </div>

              <!--收货人地址-->
			  <?php
                  foreach ($address as $a){
                      if($a->id == $dataProvider->address){
              ?>
              <div class="control-group">
                  <label class="control-label">收件人：</label>
                  <div class="controls">
                      <input  class="span2 m-wrap" type="text"  value="<?=$a->name;?>" disabled/>
                      <span class="help-inline"></span>
                  </div>
              </div>
              
              <div class="control-group">
                  <label class="control-label">手机号码：</label>
                  <div class="controls">
                      <input class="span3 m-wrap" type="text"  value="<?=$a->mobile;?>" disabled/>
                      <span class="help-inline"></span>
                  </div>
              </div>
              
              <div class="control-group">
                  <label class="control-label">固定电话：</label>
                  <div class="controls">
                      <input class="span3 m-wrap" type="text"  value="<?=$a->telephone;?>" disabled/>
                      <span class="help-inline"></span>
                  </div>
              </div>
              
              <div class="control-group">
                  <label class="control-label">邮编：</label>
                  <div class="controls">
                      <input class="span2 m-wrap" type="text"  value="<?=$a->areacode;?>" disabled/>
                      <span class="help-inline"></span>
                  </div>
              </div>
              
              <div class="control-group">
                  <label class="control-label">所在地区：</label>
                  <div class="controls">
                      <input class="span5 m-wrap" type="text"  value="<?=$a->area;?><?=$a->address;?>" disabled/>
                      <span class="help-inline"></span>
                  </div>
              </div>
              <?php
                      }
                  }
              ?>
              <!--收货人地址-->
    
              <!--支付方式-->
              <div class="control-group">
                  <label class="control-label">支付方式：</label>
                  <div class="controls">
                      <label class="radio">
                      <input type="radio" disabled name="payment"
                      <?php 
                         if ($dataProvider->payment == 1) {
                              echo 'checked';
                         } 
                      ?>
                      />
                      支付宝支付
                      </label>
                      <label class="radio">
                      <input type="radio" disabled name="payment"
                      <?php 
                         if ($dataProvider->payment == 2) {
                              echo 'checked';
                         } 
                      ?>
                      />
                      网银支付
                      </label>  
                      <label class="radio">
                      <input type="radio" disabled name="payment"
                      <?php 
                         if ($dataProvider->payment == 3) {
                              echo 'checked';
                         } 
                      ?>
                      />
                      余额支付
                      </label>  
                  </div>
              </div>
              <!--支付方式-->
    
    
              <!--备注-->
              <div class="control-group">
                  <label class="control-label">备注：</label>
                  <div class="controls">
                     <textarea class="medium m-wrap" disabled rows="3"><?=$dataProvider->remarks?></textarea>
                  </div>
              </div>
              <!--备注-->
              
              
              <div class="control-group">
                  <label class="control-label">商品信息：</label>
                  <div class="controls">
					  <?php
                          foreach($productInfo as $r){
                          $url=$this->createUrl('product/view',array('id'=>$r->p_id));
                      ?>
                      <div style="width:200px; height:80px; border:1px solid #efefef; float:left; margin-right:10px;">
                        <div style="width:180px; margin-top:5px; margin-right:5px; margin-left:5px;">
                            <div>名称：<a href="<?=$url;?>"><?=$r['name']?></a></div>	
                            <div>总价：&yen;<?=$r['price']*$r['number']?></div>
                            <div>数量：<?=$r['number']?></div>
                        </div>		
                      </div>
                      <?php
                          }
                      ?>
                      <div class="clear"></div>
                  </div>
              </div>
             
              <div class="control-group">
                  <label class="control-label">总金额：</label>
                  <div class="controls">
                      <input class="span3 m-wrap" type="text"  value="<?=$dataProvider->allPrice;?>" disabled/>
                      <span class="help-inline"></span>
                  </div>
              </div>
              
 

              <div class="form-actions">
                  <input type="submit" class="btn black" value="&nbsp;&nbsp;提&nbsp;交&nbsp;&nbsp;"/> 
                  <a class="btn" href="javascript:history.go(-1);">&nbsp;&nbsp;返&nbsp;回&nbsp;&nbsp;</a>                            
              </div>
              <?php $this->endWidget(); ?>
              </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->

      </div>
  </div>
  <!-- END PAGE CONTENT--> 
  
  
  
  

</div>

<script>
	jQuery(document).ready(function(){
		$('#order_center_page').addClass('active');	
		$('#order_page').addClass('active');
	});
</script>