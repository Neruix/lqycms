<!DOCTYPE html><html><head><title>角色修改_后台管理</title>@include('admin.common.header')
<div class="container-fluid">
<div class="row">
<!-- 左边开始 --><div class="col-sm-3 col-md-2 sidebar">@include('admin.common.leftmenu')</div><!-- 左边结束 -->

<!-- 右边开始 --><div class="col-sm-9 col-md-10 rightbox"><div id="mainbox">
<h5 class="sub-header"><a href="/fladmin/userrole">角色列表</a> > 角色修改</h5>

<form id="addarc" method="post" action="/fladmin/userrole/doedit" role="form" enctype="multipart/form-data" class="table-responsive">{{ csrf_field() }}
<table class="table table-striped table-bordered">
<tbody>
    <tr>
        <td align="right">角色名称：</td>
        <td><input name="name" type="text" id="name" value="<?php echo $post["name"]; ?>" class="required" style="width:30%" placeholder="在此输入角色名称"><input style="display:none;" name="id" type="text" id="id" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
        <td align="right">角色描述：</td>
        <td><input name="des" type="text" id="des" value="<?php echo $post["des"]; ?>" style="width:60%"></td>
    </tr>
    <tr>
        <td align="right">状态：</td>
        <td>
            <input type="radio" value='0' name="status" <?php if($post['status']==0){echo 'checked';} ?> />&nbsp;启用&nbsp;&nbsp;
            <input type="radio" value='1' name="status" <?php if($post['status']==1){echo 'checked';} ?> />&nbsp;禁用
        </td>
    </tr>
    <tr>
        <td align="right">排序：</td>
        <td><input name="listorder" type="text" id="listorder" value="<?php echo $post["listorder"]; ?>" style="width:60%"></td>
    </tr>
    <tr>
        <td colspan="2"><button type="submit" class="btn btn-success" value="Submit">保存(Submit)</button>&nbsp;&nbsp;<button type="reset" class="btn btn-default" value="Reset">重置(Reset)</button></td>
    </tr>
</tbody></table></form><!-- 表单结束 -->
</div></div><!-- 右边结束 --></div></div>

<script>
$(function(){
    $(".required").blur(function(){
        var $parent = $(this).parent();
        $parent.find(".formtips").remove();
        if(this.value=="")
        {
            $parent.append(' <small class="formtips onError"><font color="red">不能为空！</font></small>');
        }
        else
        {
            $parent.append(' <small class="formtips onSuccess"><font color="green">OK</font></small>');
        }
    });

    //重置
    $('#addarc input[type="reset"]').click(function(){
            $(".formtips").remove(); 
    });

    $("#addarc").submit(function(){
        $(".required").trigger('blur');
        var numError = $('#addarc .onError').length;
        
        if(numError){return false;}
    });
});
</script>
</body></html>