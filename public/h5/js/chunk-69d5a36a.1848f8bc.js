(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-69d5a36a"],{"0a86":function(t,i,e){"use strict";var s=e("7408"),a=e.n(s);a.a},7408:function(t,i,e){},"9e08":function(t,i,e){"use strict";e.r(i);var s=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{staticClass:"quality-recommend",staticStyle:{background:"#ed7a95"}},[t._m(0),t._m(1),e("div",{staticClass:"commodity"},t._l(t.goodsList,function(i,s){return e("div",{key:s},[e("router-link",{staticStyle:{display:"flex"},attrs:{to:{path:"/detail/"+i.id}}},[e("div",{staticClass:"goodsPic"},[e("img",{attrs:{src:i.image,alt:""}})]),e("div",{staticClass:"baseInfo"},[e("div",{staticClass:"sss"},[t._v(t._s(i.store_name))]),e("div",{staticStyle:{color:"#c70d00",margin:"0.1rem 0"}},[t._v("￥\n            "),e("span",{staticClass:"spjg"},[t._v(t._s(i.price))])]),e("div",{staticClass:"tuanbut"},[e("div",{staticClass:"tuan",staticStyle:{width:"50%",display:"flex","align-items":"center"}},[e("img",{staticStyle:{width:"0.3rem",height:"0.3rem","vertical-align":"middle"},attrs:{src:"http://meida.vwbxyhj.cn//addons/sjlm_tg/template/mobile/images/tuan.png"}}),e("span",{staticStyle:{color:"#6c6c6c","padding-left":"0.08rem"}},[t._v(t._s(i.tuan_number)+"人团")])]),e("div",{staticClass:"spqg",staticStyle:{display:"flex",width:"50%","align-items":"center"}},[e("img",{staticStyle:{width:"0.3rem",height:"0.3rem","vertical-align":"middle"},attrs:{src:"http://meida.vwbxyhj.cn//addons/sjlm_tg/template/mobile/images/gou.png"}}),e("span",{staticStyle:{"margin-left":"0.05rem","padding-left":"0.08rem"}},[t._v("去开团")])])])])])],1)}),0)])},a=[function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",[e("img",{staticStyle:{width:".5rem",height:".5rem","margin-left":"0.3rem","margin-top":"0.2rem","margin-bottom":"0.2rem"},attrs:{onclick:"javascript:history.go(-1)",src:"http://meida.vwbxyhj.cn//addons/sjlm_tg/template/mobile/images/Icon_left_arrow.png"}})])},function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{staticClass:"banner"},[e("img",{attrs:{src:"http://meida.vwbxyhj.cn//addons/sjlm_tg/template/mobile/images/xingp.jpg",alt:""}})])}],n=e("7212"),c=(e("e5d0"),function(){var t=this,i=t.$createElement,s=t._self._c||i;return s("div",{staticClass:"goodList"},t._l(t.goodList,function(i,a){return s("div",{key:a,staticClass:"item acea-row row-between-wrapper",on:{click:function(e){return t.goDetails(i)}}},[s("div",{staticClass:"pictrue"},[s("img",{staticClass:"image",attrs:{src:i.image}}),i.activity&&"1"===i.activity.type?s("span",{staticClass:"pictrue_log pictrue_log_class"},[t._v("秒杀")]):t._e(),i.activity&&"2"===i.activity.type?s("span",{staticClass:"pictrue_log pictrue_log_class"},[t._v("砍价")]):t._e(),i.activity&&"3"===i.activity.type?s("span",{staticClass:"pictrue_log pictrue_log_class"},[t._v("拼团")]):t._e()]),s("div",{staticClass:"underline"},[s("div",{staticClass:"text"},[s("div",{staticClass:"line1"},[t._v(t._s(i.store_name))]),s("div",{staticClass:"money font-color-red"},[t._v("\n          ￥"),s("span",{staticClass:"num"},[t._v(t._s(i.price))])]),s("div",{staticClass:"vip-money acea-row row-middle"},[i.vip_price&&i.vip_price>0?s("div",{staticClass:"vip"},[t._v("\n            ￥"+t._s(i.vip_price||0)),s("img",{staticClass:"image",attrs:{src:e("69ed")}})]):t._e(),s("span",{staticClass:"num"},[t._v("已售"+t._s(i.sales)+t._s(i.unit_name))])])])]),s("div",{staticClass:"iconfont icon-gouwuche cart-color acea-row row-center-wrapper"})])}),0)}),o=[],r=e("00fd"),l={name:"GoodList",props:{goodList:{type:Array,default:function(){return[]}},isSort:{type:Boolean,default:!0}},data:function(){return{}},methods:{goDetails:function(t){var i=this;Object(r["c"])(t).then(function(){i.$router.push({path:"/detail/"+t.id})})}}},d=l,m=e("2877"),p=Object(m["a"])(d,c,o,!1,null,null,null),u=p.exports,g=e("73f5"),v={name:"HotNewGoods",components:{swiper:n["swiper"],swiperSlide:n["swiperSlide"],GoodList:u},props:{},data:function(){return{imgUrls:[],goodsList:[],name:"",icon:"",RecommendSwiper:{pagination:{el:".swiper-pagination",clickable:!0},autoplay:{disableOnInteraction:!1,delay:2e3},loop:!0,speed:1e3,observer:!0,observeParents:!0}}},mounted:function(){this.titleInfo(),this.getIndexGroomList()},methods:{titleInfo:function(){var t=this.$route.params.type;"1"===t?(this.name="精品推荐",this.icon="icon-jingpintuijian",document.title="精品推荐"):"2"===t?(this.name="热门榜单",this.icon="icon-remen",document.title="热门榜单"):"3"===t&&(this.name="首发新品",this.icon="icon-xinpin",document.title="首发新品")},getIndexGroomList:function(){var t=this,i=this.$route.params.type;console.log(i),Object(g["e"])(i).then(function(i){t.imgUrls=i.data.banner,t.goodsList=i.data.list,console.log(i.data.list)}).catch(function(t){this.$dialog.toast({mes:t.msg})})}}},_=v,h=(e("0a86"),Object(m["a"])(_,s,a,!1,null,null,null));i["default"]=h.exports}}]);
//# sourceMappingURL=chunk-69d5a36a.1848f8bc.js.map