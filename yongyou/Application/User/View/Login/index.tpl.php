<?php include 'Public/View/header.tpl.php'; ?>

<div class="container-fluid">
    <h3>登录</h3>
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="domain" class="col-sm-2 control-label">登录到</label>
            <div class="col-sm-10">
                <select class="selectpicker" id="domain">
                    <option><?php echo I('server.SERVER_NAME'); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="user" class="col-sm-2 control-label">操作员</label>
            <div class="col-sm-10">
                <input value="<?php echo C('DEFAULT_USER'); ?>" type="text" class="form-control" id="user" placeholder="操作员">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pass" placeholder="密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="change_pass"> 修改密码
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="book" class="col-sm-2 control-label">账套</label>
            <div class="col-sm-10">
                <select class="selectpicker" id="book">
                    <option><?php echo C('DEFAULT_BOOK'); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="lang" class="col-sm-2 control-label">语言区域</label>
            <div class="col-sm-10">
                <select class="selectpicker" id="lang">
                    <?php foreach($langs as $k => $v): ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">确定</button>
                <button type="submit" class="btn btn-default">取消</button>
                <button type="submit" class="btn btn-default">帮助</button>
            </div>
        </div>
    </form>
</div>

<?php include 'Public/View/footer.tpl.php'; ?>