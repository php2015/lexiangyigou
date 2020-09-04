{extend name="public/container"}
{block name="head_top"}
<!-- 全局js -->
<script src="{__PLUG_PATH}echarts/echarts.common.min.js"></script>
<script src="{__PLUG_PATH}echarts/theme/macarons.js"></script>
<script src="{__PLUG_PATH}echarts/theme/westeros.js"></script>
{/block}
{block name="content"}

<div id="app">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>订单</h5>
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'thirtyday'}" v-on:click="getlist('thirtyday')">30天</button>
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'week'}" v-on:click="getlist('week')">周</button>
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'month'}" v-on:click="getlist('month')">月</button>
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'year'}" v-on:click="getlist('year')">年</button>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="flot-chart-content echarts" ref="order_echart" id="flot-dashboard-chart1"></div>
                        </div>
                        <div class="col-lg-3">
                            <ul class="stat-list">
                                <li>
                                    <h2 class="no-margins ">{{pre_cycleprice}}</h2>
                                    <small>{{precyclename}}销售额</small>
                                </li>
                                <li>
                                    <h2 class="no-margins ">{{cycleprice}}</h2>
                                    <small>{{cyclename}}销售额</small>
                                    <div class="stat-percent text-navy" v-if='cycleprice_is_plus ===1'>
                                        {{cycleprice_percent}}%
                                        <i  class="fa fa-level-up"></i>
                                    </div>
                                    <div class="stat-percent text-danger" v-else-if='cycleprice_is_plus === -1'>
                                        {{cycleprice_percent}}%
                                        <i class="fa fa-level-down"></i>
                                    </div>
                                    <div class="stat-percent" v-else>
                                        {{cycleprice_percent}}%
                                    </div>
                                    <div class="progress progress-mini">
                                        <div :style="{width:cycleprice_percent+'%'}" class="progress-bar box"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">{{pre_cyclecount}}</h2>
                                    <small>{{precyclename}}订单总数</small>
                                </li>
                                <li>
                                    <h2 class="no-margins">{{cyclecount}}</h2>
                                    <small>{{cyclename}}订单总数</small>
                                    <div class="stat-percent text-navy" v-if='cyclecount_is_plus ===1'>
                                        {{cyclecount_percent}}%
                                        <i class="fa fa-level-up"></i>
                                    </div>
                                    <div class="stat-percent text-danger" v-else-if='cyclecount_is_plus === -1'>
                                        {{cyclecount_percent}}%
                                        <i  class="fa fa-level-down"></i>
                                    </div>
                                    <div class="stat-percent " v-else>
                                        {{cyclecount_percent}}%
                                    </div>
                                    <div class="progress progress-mini">
                                        <div :style="{width:cyclecount_percent+'%'}" class="progress-bar box"></div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="flot-chart">
                                <div class="flot-chart-content" ref="user_echart" id="flot-dashboard-chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{/block}
{block name="script"}
<style scoped>
    .box{width:0px;}
</style>
<script>
     require(['vue','axios','layer'],function(Vue,axios,layer){
        new Vue({
            el:"#app",
            data:{
                option:{},
                myChart:{},
                active:'thirtyday',
                cyclename:'最近30天',
                precyclename:'上个30天',
                cyclecount:0,
                cycleprice:0,
                cyclecount_percent:0,
                cycleprice_percent:0,
                cyclecount_is_plus:0,
                cycleprice_is_plus:0,
                pre_cyclecount:0,
                pre_cycleprice:0
            },
            methods:{
                info:function () {
                    var that=this;
                    axios.get("{:Url('userchart')}").then((res)=>{
                        that.myChart.user_echart.setOption(that.userchartsetoption(res.data.data));
                    });
                },
                getlist:function (e) {
                    var that=this;
                    var cycle = e!=null ? e :'thirtyday';
                    axios.get("{:Url('orderchart')}?cycle="+cycle).then((res)=>{
                            that.myChart.order_echart.clear();
                            that.myChart.order_echart.setOption(that.orderchartsetoption(res.data.data));
                            that.active = cycle;
                            switch (cycle){
                                case 'thirtyday':
                                    that.cyclename = '最近30天';
                                    that.precyclename = '上个30天';
                                    break;
                                case 'week':
                                    that.precyclename = '上周';
                                    that.cyclename = '本周';
                                    break;
                                case 'month':
                                    that.precyclename = '上月';
                                    that.cyclename = '本月';
                                    break;
                                case 'year':
                                    that.cyclename = '去年';
                                    that.precyclename = '今年';
                                    break;
                                default:
                                    break;
                            }
                            var data=res.data.data;
                            if(data) {
                                that.cyclecount = data.cycle.count.data;
                                that.cyclecount_percent = data.cycle.count.percent;
                                that.cyclecount_is_plus = data.cycle.count.is_plus;
                                that.cycleprice = data.cycle.price.data;
                                that.cycleprice_percent = data.cycle.price.percent;
                                that.cycleprice_is_plus = data.cycle.price.is_plus;
                                that.pre_cyclecount = data.pre_cycle.count.data;
                                that.pre_cycleprice = data.pre_cycle.price.data;
                            }
                    });
                },
                orderchartsetoption:function(data){
                    data = data == undefined ? {} : data;
                        this.option = {
                            tooltip: {
                                trigger: 'axis',
                                axisPointer: {
                                    type: 'cross',
                                    crossStyle: {
                                        color: '#999'
                                    }
                                }
                            },
                            toolbox: {
                                feature: {
                                    dataView: {show: true, readOnly: false},
                                    magicType: {show: true, type: ['line', 'bar']},
                                    restore: {show: false},
                                    saveAsImage: {show: true}
                                }
                            },
                            legend: {
                                data: data.legend || []
                            },
                            grid: {
                                x: 70,
                                x2: 50,
                                y: 60,
                                y2: 50
                            },
                            xAxis: [
                                {
                                    type: 'category',
                                    data: data.xAxis,
                                    axisPointer: {
                                        type: 'shadow'
                                    },
                                    axisLabel:{
                                        interval: 0,
                                        rotate:40
                                    }


                                }
                            ],
                            yAxis:[{type : 'value'}],
//                            yAxis: [
//                                {
//                                    type: 'value',
//                                    name: '',
//                                    min: 0,
//                                    max: data.yAxis.maxprice,
////                                    interval: 0,
//                                    axisLabel: {
//                                        formatter: '{value} 元'
//                                    }
//                                },
//                                {
//                                    type: 'value',
//                                    name: '',
//                                    min: 0,
//                                    max: data.yAxis.maxnum,
//                                    interval: 5,
//                                    axisLabel: {
//                                        formatter: '{value} 个'
//                                    }
//                                }
//                            ],
                            series: data.series
                        };
                    return  this.option;
                },
                userchartsetoption:function(data){
                    this.option = {
                        tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                                type: 'cross',
                                crossStyle: {
                                    color: '#999'
                                }
                            }
                        },
                        toolbox: {
                            feature: {
                                dataView: {show: false, readOnly: false},
                                magicType: {show: true, type: ['line', 'bar']},
                                restore: {show: false},
                                saveAsImage: {show: false}
                            }
                        },
                        legend: {
                            data:data.legend
                        },
                        grid: {
                            x: 70,
                            x2: 50,
                            y: 60,
                            y2: 50
                        },
                        xAxis: [
                            {
                                type: 'category',
                                data: data.xAxis,
                                axisPointer: {
                                    type: 'shadow'
                                }
                            }
                        ],
                        yAxis: [
                            {
                                type: 'value',
                                name: '人数',
                                min: 0,
                                max: data.yAxis.maxnum,
                                interval: 5,
                                axisLabel: {
                                    formatter: '{value} 人'
                                }
                            }
                        ],
//                        series: data.series
                        series : [ {
                            name : '人数',
                            type : 'bar',
                            barWidth : '50%',
                            itemStyle: {
                                normal: {
                                    label: {
                                        show: true, //开启显示
                                        position: 'top', //在上方显示
                                        textStyle: { //数值样式
                                            color: '#666',
                                            fontSize: 12
                                        }
                                    }
                                }
                            },
                            data : data.series
                        } ]

                    };
                    return  this.option;
                },
                setChart:function(name,myChartname){
                    this.myChart[myChartname] = echarts.init(name,'macarons');//初始化echart
                }
            },
            mounted:function () {
                const self = this;
                this.setChart(self.$refs.order_echart,'order_echart');//订单图表
                this.setChart(self.$refs.user_echart,'user_echart');//用户图表
                this.info();
                this.getlist();
                $('.opFrames').on('click',function () {
                    parent.addframes($(this).data('href'),'',$(this).data('name'));
                });
            }
        });
    });
</script>
{/block}
