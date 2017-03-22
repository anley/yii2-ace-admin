<?php

// 定义标题和面包屑信息
$this->title = '地址信息';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/public/assets/js/colResizable.min.js', ['depends' => 'backend\assets\AppAsset']);
?>
<!--前面导航信息-->
<p>
    <!-- <button class="btn btn-white btn-success btn-bold me-table-insert">
        <i class="ace-icon fa fa-plus bigger-120 blue"></i>
        添加
    </button>
    <button class="btn btn-white btn-danger btn-bold me-table-delete">
        <i class="ace-icon fa fa-trash-o bigger-120 red"></i>
        删除
    </button> -->
    <button class="btn btn-white btn-info btn-bold me-hide">
        <i class="ace-icon fa  fa-external-link bigger-120 orange"></i>
        隐藏
    </button>
    <button class="btn btn-white btn-pink btn-bold  me-table-reload">
        <i class="ace-icon fa fa-refresh bigger-120 pink"></i>
        刷新
    </button>
    <button class="btn btn-white btn-warning btn-bold me-table-export">
        <i class="ace-icon glyphicon glyphicon-export bigger-120 orange2"></i>
        导出Excel
    </button>
</p>
<!--表格数据-->
<table class="table table-striped table-bordered table-hover" id="showTable"></table>
<table class="table table-striped table-bordered table-hover" id="show-table"></table>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
    console.time();
    var myTable = new MeTable({
        sTitle: "地址信息",
        isCheckbox: false,
        oOperation: {
            isOpen: false
        }
        // bColResize: true
    },{
        "aoColumns":[
			{"title": "id", "data": "id", "sName": "id",  "defaultOrder": "desc", "edit": {"type": "text", "options": {"required":true,"number":true,}}},
			{"title": "地址名称", "data": "name", "sName": "name", "edit": {"type": "text", "options": {"rangelength":"[2, 40]"}}, "search": {"type": "text"}, "bSortable": false},
			{"title": "父类ID", "data": "pid", "sName": "pid", "value": <?=json_encode($parent)?>, "edit": {"type": "text", "options": {"number":true}}, "search": {"type":"select"}},
        ]
    });

    console.timeEnd();

    console.time();
    var m = meTables({
        title: "地址信息",
        bCheckbox: false,
        table: {
            "aoColumns":[
                {"title": "id", "data": "id", "sName": "id",  "defaultOrder": "desc", "edit": {"type": "text", "options": {"required":true,"number":true,}}},
                {"title": "地址名称", "data": "name", "sName": "name", "edit": {"type": "text", "options": {"rangelength":"[2, 40]"}}, "search": {"type": "text"}, "bSortable": false},
                {"title": "父类ID", "data": "pid", "sName": "pid", "value": <?=json_encode($parent)?>, "edit": {"type": "text", "options": {"number":true}}, "search": {"type":"select"}},
            ]
        }
    });

    console.timeEnd();

    /**
     * 显示的前置和后置操作
     * myTable.beforeShow(array data, bool isDetail) return true 前置
     * myTable.afterShow(array data, bool isDetail)  return true 后置
     */

     /**
      * 编辑的前置和后置操作
      * myTable.beforeSave(array data) return true 前置
      * myTable.afterSave(array data)  return true 后置
      */

    $(function(){
        console.time();
        myTable.init();
        console.timeEnd();

        console.time();
        m.init();
        console.timeEnd();
    })
</script>
<?php $this->endBlock(); ?>