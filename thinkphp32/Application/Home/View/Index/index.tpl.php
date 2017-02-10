<?php include 'Public/View/header.tpl.php'; ?>

<form action="" class="form-horizontal"  role="form">
    <fieldset>
        <legend>Test</legend>
        <div class="form-group">
            <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
            <div class="input-group date form_datetime col-md-5" data-date="<?php echo date('Y-m-d H:i:s'); ?>" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                <input class="form-control" size="16" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
            <input type="hidden" id="dtp_input1" value="" /><br/>
        </div>
        <div class="form-group">
            <label for="dtp_input2" class="col-md-2 control-label">Date Picking</label>
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:ii:ss">
                <input class="form-control" size="16" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
        </div>
        <div class="form-group">
            <label for="dtp_input3" class="col-md-2 control-label">Time Picking</label>
            <div class="input-group date form_time col-md-5" data-date="" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd hh:ii:ss">
                <input class="form-control" size="16" type="text" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
            </div>
            <input type="hidden" id="dtp_input3" value="" /><br/>
        </div>
    </fieldset>
</form>

<script type="text/javascript">
$(function(){
    $('.form_datetime').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
});
</script>

<?php include 'Public/View/footer.tpl.php'; ?>