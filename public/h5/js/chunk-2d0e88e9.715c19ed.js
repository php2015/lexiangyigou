(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0e88e9"],{"8a7a":function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"apply-return"},[e._l(e.orderInfo.cartInfo,function(t){return a("div",{key:t.id,staticClass:"goodsStyle acea-row row-between"},[a("div",{staticClass:"pictrue"},[a("img",{staticClass:"image",attrs:{src:t.productInfo.image}})]),a("div",{staticClass:"text acea-row row-between"},[a("div",{staticClass:"name line2"},[e._v(e._s(t.productInfo.store_name))]),a("div",{staticClass:"money"},[a("div",[e._v("\n          ￥"+e._s(t.productInfo.attrInfo?t.productInfo.attrInfo.price:t.productInfo.price)+"\n        ")]),a("div",{staticClass:"num"},[e._v("x"+e._s(t.cart_num))])])])])}),a("div",{staticClass:"list"},[a("div",{staticClass:"item acea-row row-between-wrapper"},[a("div",[e._v("退货件数")]),a("div",{staticClass:"num"},[e._v(e._s(e.orderInfo.total_num))])]),a("div",{staticClass:"item acea-row row-between-wrapper"},[a("div",[e._v("退款金额")]),a("div",{staticClass:"num"},[e._v("￥"+e._s(e.orderInfo.pay_price))])]),a("div",{staticClass:"item acea-row row-between-wrapper"},[a("div",[e._v("退款原因")]),a("div",{staticClass:"num acea-row row-left"},[a("select",{directives:[{name:"model",rawName:"v-model",value:e.reason,expression:"reason"}],on:{change:function(t){var a=Array.prototype.filter.call(t.target.options,function(e){return e.selected}).map(function(e){var t="_value"in e?e._value:e.value;return t});e.reason=t.target.multiple?a:a[0]}}},[a("option",{attrs:{value:""}},[e._v("选择退款原因")]),e._l(e.reasonList,function(t,r){return a("option",{key:r,domProps:{value:t}},[e._v("\n            "+e._s(t)+"\n          ")])})],2),a("span",{staticClass:"iconfont icon-jiantou"})])]),a("div",{staticClass:"item textarea acea-row row-between"},[a("div",[e._v("备注说明")]),a("textarea",{directives:[{name:"model",rawName:"v-model",value:e.refund_reason_wap_explain,expression:"refund_reason_wap_explain"}],staticClass:"num",attrs:{placeholder:"填写备注信息，100字以内"},domProps:{value:e.refund_reason_wap_explain},on:{input:function(t){t.target.composing||(e.refund_reason_wap_explain=t.target.value)}}})]),a("div",{staticClass:"item acea-row row-between"},[e._m(0),a("div",{staticClass:"upload acea-row row-middle"},[e._l(e.refund_reason_wap_img,function(t,r){return a("div",{key:t,staticClass:"pictrue"},[a("img",{attrs:{src:t}}),a("div",{staticClass:"iconfont icon-guanbi1 font-color-red",on:{click:function(t){return e.refund_reason_wap_img.splice(r,1)}}})])}),e.refund_reason_wap_img.length<3?a("VueCoreImageUpload",{staticClass:"btn btn-primary",attrs:{crop:!1,compress:"80",headers:e.headers,"max-file-size":5242880,credentials:!1,inputAccept:"image/*",inputOfFile:"file",url:e.url},on:{imageuploaded:e.imageuploaded}},[a("div",{staticClass:"pictrue acea-row row-center-wrapper row-column"},[a("span",{staticClass:"iconfont icon-icon25201"}),a("div",[e._v("上传凭证")])])]):e._e()],2)])]),a("div",{staticClass:"returnBnt bg-color-red",on:{click:e.submit}},[e._v("申请退款")])],2)},n=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"title acea-row row-between-wrapper"},[a("div",[e._v("上传凭证")]),a("div",{staticClass:"tip"},[e._v("( 最多可上传3张 )")])])}],i=a("f8b7"),s=a("ed08"),o=a("f603"),c={name:"goodsReturn",components:{VueCoreImageUpload:o["a"]},data:function(){return{url:"".concat(s["a"],"/upload/image"),headers:{"Authori-zation":"Bearer "+this.$store.state.app.token},id:this.$route.params.id||0,orderInfo:{},reasonList:[],reason:"",refund_reason_wap_explain:"",refund_reason_wap_img:[]}},methods:{imageuploaded:function(e){if(200!==e.status)return this.$dialog.error(e.msg||"上传图片失败");this.refund_reason_wap_img.push(e.data.url)},getOrderDetail:function(){var e=this;Object(i["j"])(this.id).then(function(t){e.orderInfo=t.data}).catch(function(t){e.$dialog.error(t.msg||"获取订单失败")})},getRefundReason:function(){var e=this;Object(i["h"])().then(function(t){e.reasonList=t.data})},submit:function(){var e=this,t=Object(s["f"])(this.refund_reason_wap_explain),a=this.reason;if(!a)return this.$dialog.toast({mes:"请选择退款原因"});Object(i["o"])({text:a,uni:this.orderInfo.order_id,refund_reason_wap_img:this.refund_reason_wap_img.join(","),refund_reason_wap_explain:t}).then(function(t){e.$dialog.success(t.msg),e.$router.go(-1)}).catch(function(t){e.$dialog.error(t.msg)})}},mounted:function(){this.getOrderDetail(),this.getRefundReason()}},d=c,u=a("2877"),l=Object(u["a"])(d,r,n,!1,null,null,null);t["default"]=l.exports}}]);
//# sourceMappingURL=chunk-2d0e88e9.715c19ed.js.map