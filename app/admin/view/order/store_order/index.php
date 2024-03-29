{extend name="public/container"}
{block name="head_top"}

{/block}
{block name="content"}
<style>
    .btn-outline{
        border:none;
    }
    .btn-outline:hover{
        background-color: #0e9aef;
        color: #fff;
    }
    .layui-form-item .layui-btn {
        margin-top: 5px;
        margin-right: 10px;
    }
    .layui-btn-primary{
        margin-right: 10px;
        margin-left: 0!important;
    }
    label{
        margin-bottom: 0!important;
        margin-top: 4px;
    }
</style>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15" id="app">
        <!--搜索条件-->
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">搜索条件</div>
                <div class="layui-card-body">
                    <div class="layui-carousel layadmin-carousel layadmin-shortcut" lay-anim="" lay-indicator="inside"
                         lay-arrow="none" style="background:none">
                        <div class="layui-card-body">
                            <div class="layui-row layui-col-space10 layui-form-item">
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">订单状态:</label>
                                    <div class="layui-input-block" v-cloak="">
                                        <button class="layui-btn layui-btn-sm"
                                                :class="{'layui-btn-primary':where.status!==item.value}"
                                                @click="where.status = item.value" type="button"
                                                v-for="item in orderStatus">{{item.name}}
                                        </button>
                                    </div>
                                </div>

                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">创建时间:</label>
                                    <div class="layui-input-block" data-type="data" v-cloak="">
                                        <button class="layui-btn layui-btn-sm" type="button" v-for="item in dataList"
                                                @click="setData(item)"
                                                :class="{'layui-btn-primary':where.data!=item.value}">{{item.name}}
                                        </button>
                                        <button class="layui-btn layui-btn-sm" type="button" ref="time"
                                                @click="setData({value:'zd',is_zd:true})"
                                                :class="{'layui-btn-primary':where.data!='zd'}">自定义
                                        </button>
                                        <button type="button" class="layui-btn layui-btn-sm layui-btn-primary"
                                                v-show="showtime==true" ref="date_time">{$year.0} - {$year.1}
                                        </button>
                                    </div>
                                </div>
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">订单号:</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="real_name" style="width: 50%" v-model="where.real_name"
                                               placeholder="请输入姓名、电话、订单编号" class="layui-input">
                                    </div>
                                </div>
                                <?php if($admin_info['power'] >= 9999): ?>
                                <div  class="layui-col-lg12">
                                    <label class="layui-form-label">运营中心id:</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="operation_id" style="width: 50%" v-model="where.operation_id"
                                               placeholder="请输入经纪人id" class="layui-input">
                                    </div>
                                </div>
                                <?php endif;?>
                                <?php if($admin_info['power'] > 9997): ?>
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">经纪人id:</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="manager_id" style="width: 50%" v-model="where.manager_id"
                                               placeholder="请输入经纪人id" class="layui-input">
                                    </div>
                                </div>
                                <?php endif;?>
                                <div class="layui-col-lg12">
                                    <div class="layui-input-block">
                                        <button @click="search" type="button"
                                                class="layui-btn layui-btn-sm layui-btn-normal">
                                            <i class="layui-icon layui-icon-search"></i>搜索
                                        </button>
                                        <button @click="excel" type="button"
                                                class="layui-btn layui-btn-warm layui-btn-sm export" type="button">
                                            <i class="fa fa-floppy-o" style="margin-right: 3px;"></i>导出
                                        </button>
                                        <button @click="refresh" type="reset"
                                                class="layui-btn layui-btn-primary layui-btn-sm">
                                            <i class="layui-icon layui-icon-refresh"></i>刷新
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end-->
        <!-- 中间详细信息-->

        <!--enb-->
    </div>
    <!--列表-->
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">订单列表</div>
                <div class="layui-card-body">
                    <div class="layui-btn-container" id="container-action">
                        <button class="layui-btn layui-btn-sm" data-type="del_order">批量删除订单</button>

                    </div>
                    <table class="layui-hide" id="List" lay-filter="List"></table>
                    <!--订单-->
                    <script type="text/html" id="order_id">
                        {{d.order_id}}<br/>

                        {{#  if(d.is_del == 1){ }}<span style="color: {{d.color}};">用户已删除</span>{{# } }}　
                    </script>
                    <!--用户信息-->
                    <script type="text/html" id="userinfo">
                        {{d.nickname==null ? '暂无信息':d.nickname}}/{{d.uid}}
                    </script>
                     <script type="text/html" id="tuan_number">
                        {{d.tuan_number}}人团
                    </script>
                 
                    <!--分销员信息-->
                    <script type="text/html" id="spread_uid">
                        {{# if(d.pid != 0){ }}
                        <button class="btn-xs btn-outline" type="button"
                                onclick="">
                            {{d.spread_nickname}}
                        </button>
                        {{# }else{ }}无{{# } }}
                    </script>
                    <!--支付状态-->
                    <script type="text/html" id="paid">
                        {{#  if(d.pay_type==1){ }}
                        <p>{{d.pay_type_name}}</p>
                        {{#  }else{ }}
                        {{# if(d.pay_type_info!=undefined){ }}
                        <p><span>线下支付</span></p>
                        {{# }else{ }}
                        <p>{{d.pay_type_name}}</p>
                        {{# } }}
                        {{# }; }}
                    </script>
                    <!--订单状态-->
                    <script type="text/html" id="status">
                        {{d.status_name}}
                    </script>
                    <!--商品信息-->
                    <script type="text/html" id="info">
                        {{#  layui.each(d._info, function(index, item){ }}
                        {{#  if(item.cart_info.productInfo.attrInfo!=undefined){ }}
                        <div>
                            <span>
                                <img style="width: 30px;height: 30px;margin:0;cursor: pointer;"
                                     src="{{item.cart_info.productInfo.attrInfo.image}}">
                            </span>
                            <span>{{item.cart_info.productInfo.store_name}}&nbsp;{{item.cart_info.productInfo.attrInfo.suk}}</span>
                            <span> | ￥{{item.cart_info.truePrice}}×{{item.cart_info.cart_num}}</span>
                        </div>
                        {{#  }else{ }}
                        <div>
                            <span><img style="width: 30px;height: 30px;margin:0;cursor: pointer;"
                                       src="{{item.cart_info.productInfo.image}}"></span>
                            <span>{{item.cart_info.productInfo.store_name}}</span><span> | ￥{{item.cart_info.truePrice}}×{{item.cart_info.cart_num}}</span>
                        </div>
                        {{# } }}
                        {{#  }); }}
                    </script>

                    <script type="text/html" id="act">
                        <?php if($admin_info['power'] >= 9998): ?>
                        {{# if(d._status==1){ }}
                        <button class="layui-btn  layui-btn-xs " style="background-color: red" type="button" lay-event="refuse">
                             拒绝
                        </button>
                        <button class="layui-btn layui-btn-xs" style="background-color: green" type="button" lay-event="pass">
                             通过
                        </button>
                        {{# } ;}}
                    <?php endif;?>


                        {{# if(d._status==2 ){ }}
                        <?php if($admin_info['power'] >= 9999): ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button><?php endif;?>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('修改订单','{:Url('edit')}?id={{d.id}}')">
                                    <i class="fa fa-edit"></i> 修改订单
                                </a>
                            </li>
                            {{# if(d.refund_status ==1){ }}

                            {{# if(parseFloat(d.pay_price) > parseFloat(d.refund_price)){ }}

                            {{# } ;}}

                            {{# } ;}}
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-edit"></i> 订单备注
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>
                        </ul>

                        {{# } ;}}


                        {{# if(d._status==0){ }}
<?php if($admin_info['power'] >= 9999): ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button><?php endif;?>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('修改订单','{:Url('edit')}?id={{d.id}}')">
                                    <i class="fa fa-edit"></i> 修改订单
                                </a>
                            </li>
                            {{# if(d.refund_status ==1){ }}

                            {{# if(parseFloat(d.pay_price) > parseFloat(d.refund_price)){ }}

                            {{# } ;}}

                            {{# } ;}}
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-edit"></i> 订单备注
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==1){ }}
                        {{# if(d.paid == 0 && d.pay_type == 'offline'){ }}
                        <button class="btn btn-danger btn-xs" type="button" lay-event="order_paid">
                            <i class="fa fa-calendar"></i> 立即支付
                        </button>
                        {{# } ;}}
                        <?php if($admin_info['power'] >= 9999): ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button><?php endif;?>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('修改订单','{:Url('edit')}?id={{d.id}}')">
                                    <i class="fa fa-edit"></i> 修改订单
                                </a>
                            </li>
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-edit"></i> 订单备注
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==5){ }}
                        {{# if(d.shipping_type==1){ }}

                        {{# } }}

<?php if($admin_info['power'] >= 9999): ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button><?php endif;?>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">

                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-paste"></i> 订单备注
                                </a>
                            </li>
                            {{# if(parseFloat(d.pay_price) > parseFloat(d.refund_price)){ }}
                            {{# }else if(d.use_integral > 0 && d.use_integral >= d.back_integral){ }}
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('退积分','{:Url('integral_back')}?id={{d.id}}')">
                                    <i class="fa fa-history"></i> 退积分
                                </a>
                            </li>
                            {{# } ;}}
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>
                        </ul>

                        {{#  }else if(d._status==3){ }}
                        <?php if($admin_info['power'] >= 9999): ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button><?php endif;?>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">

                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>

                            {{# if(parseFloat(d.use_integral) > 0 && parseFloat(d.use_integral) >
                            parseFloat(d.back_integral)){ }}
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-paste"></i> 订单备注
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('退积分','{:Url('integral_back')}?id={{d.id}}',{w:400,h:300})">
                                    <i class="fa fa-history"></i> 退积分
                                </a>
                            </li>
                            {{# };}}
                            {{# if(parseFloat(d.pay_price) > parseFloat(d.refund_price)){ }}

                            {{# } ;}}

                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>

                        </ul>
                        {{#  }else if(d._status==4){ }}
<?php if($admin_info['power'] >= 9999): ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button><?php endif;?>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">

                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-paste"></i> 订单备注
                                </a>
                            </li>

                            {{# if(parseFloat(d.pay_price) > parseFloat(d.refund_price)){ }}

                            {{# }else if(parseFloat(d.use_integral) > 0 && parseFloat(d.use_integral) >
                            parseFloat(d.back_integral)){ }}

                            {{# } }}
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==5 || d._status==6){ }}
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">

                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-paste"></i> 订单备注
                                </a>
                            </li>
                            {{# if(parseFloat(d.pay_price) > parseFloat(d.refund_price)){ }}

                            {{# };}}
                            {{# if(parseFloat(d.use_integral) > 0 && parseFloat(d.use_integral) >
                            parseFloat(d.back_integral)){ }}
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('退积分','{:Url('integral_back')}?id={{d.id}}')">
                                    <i class="fa fa-history"></i> 退积分
                                </a>
                            </li>
                            {{# } }}
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>
                        </ul>
                        {{#  }else if(d._status==7){ }}
                        <?php if($admin_info['power'] >= 9999): ?>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span
                                    class="caret"></span></button>
                        <?php endif;?>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">

                            <li>
                                <a href="javascript:void(0);" lay-event='order_info'>
                                    <i class="fa fa-file-text"></i> 订单详情
                                </a>
                            </li>
                            <li>
                                <a lay-event='marke' href="javascript:void(0);">
                                    <i class="fa fa-paste"></i> 订单备注
                                </a>
                            </li>
                            {{# if(parseFloat(d.pay_price) > parseFloat(d.refund_price)){ }}

                            {{# } }}
                            {{# if(parseFloat(d.use_integral) > 0 && parseFloat(d.use_integral) >=
                            parseFloat(d.back_integral)){ }}
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('退积分','{:Url('integral_back')}?id={{d.id}}')">
                                    <i class="fa fa-history"></i> 退积分
                                </a>
                            </li>
                            {{# } }}
                            <li>
                                <a href="javascript:void(0);"
                                   onclick="$eb.createModalFrame('订单记录','{:Url('order_status')}?oid={{d.id}}')">
                                    <i class="fa fa-newspaper-o"></i> 订单记录
                                </a>
                            </li>
                        </ul>
                        {{#  }; }}
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!--end-->
</div>
<script src="{__ADMIN_PATH}js/layuiList.js"></script>
{/block}
{block name="script"}
<script>
    layList.tableList('List', "{:Url('order_list',['real_name'=>$real_name,'operation_id'=>$operation_id,'manager_id'=>$manager_id])}", function () {
        return [
            {type: 'checkbox'},
            {field: 'order_id', title: '订单号', sort: true, event: 'order_id', width: '12%', templet: '#order_id'},
            {field: 'nickname', title: '用户信息', templet: '#userinfo', width: '8%', align: 'center'},
            {field: 'spread_uid', title: '推荐人信息', templet: '#spread_uid', width: '8%', align: 'center'},
            {field: 'info', title: '商品信息', templet: "#info", height: 'full-20'},
            {field: 'pay_price', title: '实际支付', width: '8%', align: 'center'},
            {field: 'paid', title: '支付状态', templet: '#paid', width: '8%', align: 'center'},
            {field: 'status', title: '订单状态', templet: '#status', width: '8%', align: 'center'},
            {field: 'add_time', title: '下单时间', width: '10%', sort: true, align: 'center'},
            {field: 'tuan_number', title: '团购类型', width: '6%', sort: true, align: 'center',templet: '#tuan_number'},
            
            {field: 'right', title: '操作', align: 'center', toolbar: '#act', width: '9%'},
        ];
    });
    layList.tool(function (event, data, obj) {
        switch (event) {
            case 'order_paid':
                var url = layList.U({c: 'order.store_order', a: 'offline', p: {id: data.id}});
                $eb.$swal('delete', function () {
                    $eb.axios.get(url).then(function (res) {
                        if (res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success', res.data.msg);
                        } else
                            return Promise.reject(res.data.msg || '修改失败')
                    }).catch(function (err) {
                        $eb.$swal('error', err);
                    });
                }, {'title': '您确定要修改支付状态吗？', 'text': '修改后将无法恢复,请谨慎操作！', 'confirm': '是的，我要修改'})
                break;
            case 'verify':
                var url = layList.U({c: 'order.store_order', a: 'verify', p: {id: data.id}});
                $eb.$swal('delete', function () {
                    $eb.axios.get(url).then(function (res) {
                        if (res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success', res.data.msg);

                        } else
                            return Promise.reject(res.data.msg || '核销失败')
                    }).catch(function (err) {
                        $eb.$swal('error', err);
                    });
                }, {'title': '您确定核销该订单吗？', 'text': '修改后将无法恢复,请谨慎操作！', 'confirm': '是的，我要核销'})
                break;
            case 'pass':
                var url = layList.U({c: 'order.store_order', a: 'pass', p: {id: data.id}});
                $eb.$swal('delete', function () {
                    $eb.axios.get(url).then(function (res) {
                        if (res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success', res.data.msg);
                            window.location.reload()
                        } else
                            return Promise.reject(res.data.msg || '操作失败')
                    }).catch(function (err) {
                        $eb.$swal('error', err);
                    });
                }, {'title': '您确定要通过此订单吗？', 'text': '请谨慎操作！', 'confirm': '是的，我要确认'})
                break;
            case 'refuse':
                var url = layList.U({c: 'order.store_order', a: 'refuse', p: {id: data.id}});
                $eb.$swal('delete', function () {
                    $eb.axios.get(url).then(function (res) {
                        if (res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success', res.data.msg);
                            window.location.reload()
                        } else
                            return Promise.reject(res.data.msg || '操作失败')
                    }).catch(function (err) {
                        $eb.$swal('error', err);
                    });
                }, {'title': '您确定要拒绝此订单吗？', 'text': '请谨慎操作！', 'confirm': '是的，我要确认'})
                break;
            case 'marke':
                var url = layList.U({c: 'order.store_order', a: 'remark'}),
                    id = data.id,
                    make = data.remark;
                $eb.$alert('textarea', {title: '请修改内容', value: make}, function (result) {
                    if (result) {
                        $.ajax({
                            url: url,
                            data: 'remark=' + result + '&id=' + id,
                            type: 'post',
                            dataType: 'json',
                            success: function (res) {
                                if (res.code == 200) {
                                    $eb.$swal('success', res.msg);
                                } else
                                    $eb.$swal('error', res.msg);
                            }
                        })
                    } else {
                        $eb.$swal('error', '请输入要备注的内容');
                    }
                });
                break;
            case 'danger':
                var url = layList.U({c: 'order.store_order', a: 'take_delivery', p: {id: data.id}});
                $eb.$swal('delete', function () {
                    $eb.axios.get(url).then(function (res) {
                        if (res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success', res.data.msg);
                        } else
                            return Promise.reject(res.data.msg || '收货失败')
                    }).catch(function (err) {
                        $eb.$swal('error', err);
                    });
                }, {'title': '您确定要修改收货状态吗？', 'text': '修改后将无法恢复,请谨慎操作！', 'confirm': '是的，我要修改'})
                break;
            case 'order_info':
                $eb.createModalFrame(data.nickname + '订单详情', layList.U({a: 'order_info', q: {oid: data.id}}));
                break;
            case 'order_print':
                var url = layList.U({c: 'order.store_order', a: 'order_print', p: {id: data.id}});
                $eb.$swal('delete', function () {
                    $eb.axios.get(url).then(function (res) {
                        if (res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success', res.data.msg);
                        } else
                            return Promise.reject(res.data.msg || '核销失败')
                    }).catch(function (err) {
                        $eb.$swal('error', err);
                    });
                }, {'title': '确认打印订单？', 'text': '是否确认打印！', 'confirm': '确定'})
                break;
        }
    })
    var action = {
        del_order: function () {
            var ids = layList.getCheckData().getIds('id');
            if (ids.length) {
                var url = layList.U({c: 'order.store_order', a: 'del_order'});
                $eb.$swal('delete', function () {
                    $eb.axios.post(url, {ids: ids}).then(function (res) {
                        if (res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success', res.data.msg);
                            window.location.reload()
                        } else
                            return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function (err) {
                        $eb.$swal('error', err);
                    });
                }, {'title': '您确定要修删除订单吗？', 'text': '删除后将无法恢复,请谨慎操作！', 'confirm': '是的，我要删除'})
            } else {
                layList.msg('请选择要删除的订单');
            }
        },
        write_order: function () {
            return $eb.createModalFrame('订单核销', layList.U({a: 'write_order'}), {w: 500, h: 400});
        },
    };
    $('#container-action').find('button').each(function () {
        $(this).on('click', function () {
            var act = $(this).data('type');
            action[act] && action[act]();
        });
    })
    //下拉框
    $(document).click(function (e) {
        $('.layui-nav-child').hide();
    })

    function dropdown(that) {
        var oEvent = arguments.callee.caller.arguments[0] || event;
        oEvent.stopPropagation();
        var offset = $(that).offset();
        var top = offset.top - $(window).scrollTop();
        var index = $(that).parents('tr').data('index');
        $('.layui-nav-child').each(function (key) {
            if (key != index) {
                $(this).hide();
            }
        })
        if ($(document).height() < top + $(that).next('ul').height()) {
            $(that).next('ul').css({
                'padding': 10,
                'top': -($(that).parents('td').height() / 2 + $(that).height() + $(that).next('ul').height() / 2),
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        } else {
            $(that).next('ul').css({
                'padding': 10,
                'top': $(that).parents('td').height() / 2 + $(that).height(),
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        }
    }

    var real_name = '<?=$real_name?>';
    var operation_id = '<?=$operation_id?>';
    var manager_id = '<?=$manager_id?>';
    var admin_info = '<?=$admin_info?>';
    var orderCount =<?=json_encode($orderCount)?>, payTypeCount =<?=json_encode($payTypeCount)?>,
        status =<?=$status ? $status : "''"?>;
    require(['vue'], function (Vue) {
        new Vue({
            el: "#app",
            data: {
                badge: [],
                payType: [
                    {name: '全部', value: ''},
                    {name: '微信支付', value: 1, count: payTypeCount.weixin},
                    {name: '余额支付', value: 2, count: payTypeCount.yue},
                    {name: '线下支付', value: 3, count: payTypeCount.offline},
                ],
                orderType: [
                    {name: '全部', value: ''},
                    {name: '普通订单', value: 1, count: orderCount.general},
                    {name: '拼团订单', value: 2, count: orderCount.pink},
                    {name: '秒杀订单', value: 3, count: orderCount.seckill},
                    {name: '砍价订单', value: 4, count: orderCount.bargain},
                ],
                orderStatus: [
                    {name: '全部', value: ''},
                    {name: '拼团中', value: 1, count: orderCount.jy},
                    {name: '未发货', value: 2, count: orderCount.wf, class: true},
                    {name: '未支付', value: 3, count: orderCount.wz},
                    {name: '待收货', value: 4, count: orderCount.ds},
                    {name: '交易完成', value: 5, count: orderCount.jy},

                ],
                dataList: [
                    {name: '全部', value: ''},
                    {name: '今天', value: 'today'},
                    {name: '昨天', value: 'yesterday'},
                    {name: '最近7天', value: 'lately7'},
                    {name: '最近30天', value: 'lately30'},
                    {name: '本月', value: 'month'},
                    {name: '本年', value: 'year'},
                ],
                where: {
                    data: '',
                    status: status,
                    type: '',
                    pay_type: '',
                    real_name: real_name || '',
                    operation_id: operation_id || '',
                    manager_id: manager_id || '',
                    excel: 0,
                },
                showtime: false,
            },
            watch: {
                'where.status': function () {
                    this.where.excel = 0;
                    this.getBadge();
                    layList.reload(this.where, true);
                },
                'where.data': function () {
                    this.where.excel = 0;
                    this.getBadge();
                    layList.reload(this.where, true);
                },
                'where.type': function () {
                    this.where.excel = 0;
                    this.getBadge();
                    layList.reload(this.where, true);
                },
                'where.pay_type': function () {
                    this.where.excel = 0;
                    this.getBadge();
                    layList.reload(this.where, true);
                },
            },
            methods: {
                setData: function (item) {
                    var that = this;
                    if (item.is_zd == true) {
                        that.showtime = true;
                        this.where.data = this.$refs.date_time.innerText;
                    } else {
                        this.showtime = false;
                        this.where.data = item.value;
                    }
                },
                getBadge: function () {
                    var that = this;
                    layList.basePost(layList.Url({c: 'order.store_order', a: 'getBadge'}), this.where, function (rem) {
                        that.badge = rem.data;
                    });
                },
                search: function () {
                    this.where.excel = 0;
                    this.getBadge();
                    layList.reload(this.where, true);
                },
                refresh: function () {
                    layList.reload();
                    this.getBadge();
                },
                excel: function () {
                    this.where.excel = 1;
                    location.href = layList.U({c: 'order.store_order', a: 'order_list', q: this.where});
                    this.where.excel = 0;
                }
            },
            mounted: function () {
                var that = this;
                that.getBadge();
                window.formReload = this.search;
                layList.laydate.render({
                    elem: this.$refs.date_time,
                    trigger: 'click',
                    eventElem: this.$refs.time,
                    range: true,
                    change: function (value) {
                        that.where.data = value;
                    }
                });
            }
        })
    });
</script>
{/block}