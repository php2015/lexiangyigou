(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0b9196"],{3201:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{ref:"container",staticClass:"bargain-record"},[t._l(t.bargain,function(a,s){return i("div",{key:s,staticClass:"item"},[i("div",{staticClass:"picTxt acea-row row-between-wrapper"},[i("div",{staticClass:"pictrue"},[i("img",{attrs:{src:a.image}})]),i("div",{staticClass:"text acea-row row-column-around"},[i("div",{staticClass:"line1"},[t._v(t._s(a.title))]),i("count-down",{attrs:{"is-day":!0,"tip-text":"倒计时 ","day-text":" 天 ","hour-text":" 时 ","minute-text":" 分 ","second-text":" 秒",datatime:a.datatime}}),i("div",{staticClass:"money font-color-red"},[t._v("\n          已砍至"),i("span",{staticClass:"symbol"},[t._v("￥")]),i("span",{staticClass:"num"},[t._v(t._s(a.residue_price))])])],1)]),i("div",{staticClass:"bottom acea-row row-between-wrapper"},[1===a.status?i("div",{staticClass:"purple"},[t._v("活动进行中")]):3===a.status?i("div",{staticClass:"success"},[t._v("砍价成功")]):i("div",{staticClass:"end"},[t._v("活动已结束")]),i("div",{staticClass:"acea-row row-middle row-right"},[1===a.status?i("div",{staticClass:"bnt cancel",on:{click:function(i){return t.getBargainUserCancel(a.bargain_id)}}},[t._v("\n          取消活动\n        ")]):t._e(),1===a.status?i("div",{staticClass:"bnt bg-color-red",on:{click:function(i){return t.goDetail(a.bargain_id)}}},[t._v("\n          继续砍价\n        ")]):i("div",{staticClass:"bnt bg-color-red",on:{click:t.goList}},[t._v("重开一个")])])])])}),i("Loading",{attrs:{loaded:t.status,loading:t.loadingList}})],2)},n=[],e=i("5608"),r=i("ca41"),c=i("3a5e"),o={name:"BargainRecord",components:{CountDown:e["a"],Loading:c["a"]},props:{},data:function(){return{bargain:[],status:!1,loadingList:!1,page:1,limit:20}},mounted:function(){var t=this;this.getBargainUserList(),this.$scroll(this.$refs.container,function(){!t.loadingList&&t.getBargainUserList()})},methods:{goDetail:function(t){this.$router.push({path:"/activity/dargain_detail/"+t+"/0"})},goList:function(){this.$router.push({path:"/activity/bargain"})},getBargainUserList:function(){var t=this;t.loadingList||t.status||Object(r["l"])({page:t.page,limit:t.limit}).then(function(a){t.status=a.data.length<t.limit,t.bargain.push.apply(t.bargain,a.data),t.page++,t.loadingList=!1}).catch(function(a){t.$dialog.error(a.msg)})},getBargainUserCancel:function(t){var a=this;Object(r["k"])({bargainId:t}).then(function(t){a.$dialog.success(t.msg).then(function(){a.status=!1,a.loadingList=!1,a.page=1,a.bargain=[],a.getBargainUserList()})}).catch(function(t){a.$dialog.error(t.msg)})}}},l=o,d=i("2877"),u=Object(d["a"])(l,s,n,!1,null,null,null);a["default"]=u.exports}}]);
//# sourceMappingURL=chunk-2d0b9196.fec4b12b.js.map