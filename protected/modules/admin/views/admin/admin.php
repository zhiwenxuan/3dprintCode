<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs = array(
    '管理员管理',
);
?>

<a class="add_info" target="_blank" href="<?=$this->createUrl('admin/create')?>">新增管理</a>




<table class="adminTable" cellpadding="0" cellspacing="0">
    <tr id="adminTableHeard">
        <td width="100">ID</td>
        <td width="320">姓名</td>
        <td width="320">邮箱</td>
        <td>操作</td>
    </tr>
    <?php
    foreach ($model as $r) {
        ?>
        <tr id="admin_<?= $r['id']; ?>">
            <td><?= $r->id; ?></td>
            <td><?= $r->name; ?></td>
            <td><?= $r->email; ?></td>
            <td style="line-height:20px;">
                <a id="font_blue" target="_blank"  href="<?=$this->createUrl('admin/view',array('id'=>$r->id)) ?>">查看</a>
                <br/>
                <a id="font_blue" target="_blank"  href="<?=$this->createUrl('admin/update',array('id'=>$r->id)) ?>">修改</a>&nbsp;&nbsp;<?php echo CHtml::link(Yii::t('cmp', '删除'), 'javascript:', array('id' => 'font_blue', 'onclick' => 'return art_del_confirm("' . $r['id'] . '")')) ?> 
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<ul class="pageList">
        <?php
        //$pageALL ----总页数
        //$onpage ----当前页数
        if ($onpage > 0) {
            ?>
            <a href="<?php
                echo $this->createUrl('customer/admin', array('page' => $onpage - 1));
            ?>"><li>上一页</li></a>
               <?php
           }
           ?>

        <?php
        for ($i = 1; $i <= $pageALL; $i++) {
            ?>
            <a  href="<?php
        
       
            echo $this->createUrl('customer/admin', array('page' => $i - 1));

            ?>"><li 
            <?php
            if ($onpage == $i - 1) {
                echo 'id="pageListSel"';
            }
            ?>
                    ><?= $i; ?></li></a>   

                    <?php
                }
                ?>		 

        <?php
        if ($pageALL > $onpage + 1) {
            ?>
            <a href="<?php
                echo $this->createUrl('customer/admin', array('page' => $onpage + 1));
            ?>"><li>下一页</li></a> 
            <?php
        }
        ?> 
    </ul>

    <div style="clear: both"></div>
    
    
    
    <script>
    //删除确认框  
    function art_del_confirm(id) {
        cm = confirm("确定删除吗？       ");
        if (cm) {
            $.post("index.php?r=admin/admin/delete&id=" + id, null, function(msg) {

                if (msg == 200) {
                    $('#admin_' + id).remove();
                } else {
                    alert('删除失败！')
                }
            });
        } else {

        }
    }
</script>