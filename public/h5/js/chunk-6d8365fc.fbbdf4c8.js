(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-6d8365fc"],{a162:function(e,t,n){"use strict";n.r(t);var r=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"order-details pos-order-details"},[n("div",{staticClass:"header acea-row row-middle"},[n("div",{staticClass:"state"},[e._v(e._s(e.title))]),n("div",{staticClass:"data"},[n("div",{staticClass:"order-num"},[e._v("订单："+e._s(e.orderInfo.order_id))]),n("div",[n("span",{staticClass:"time"},[e._v(e._s(e.orderInfo.add_time))])])])]),"looks"!=e.$route.params.goname?n("div",{staticClass:"remarks acea-row row-between-wrapper"},[n("span",{staticClass:"iconfont icon-zhinengkefu-"}),n("input",{staticClass:"line1",staticStyle:{"text-align":"left"},attrs:{type:"button",value:e.orderInfo.remark?e.orderInfo.remark:"订单未备注，点击添加备注信息"},on:{click:function(t){return e.modify(1)}}})]):e._e(),n("div",{staticClass:"orderingUser acea-row row-middle"},[n("span",{staticClass:"iconfont icon-yonghu2"}),e._v(e._s(e.orderInfo.nickname)+"\n  ")]),n("div",{staticClass:"address"},[n("div",{staticClass:"name"},[e._v("\n      "+e._s(e.orderInfo.real_name)),n("span",{staticClass:"phone"},[e._v(e._s(e.orderInfo.user_phone))])]),n("div",[e._v(e._s(e.orderInfo.user_address))])]),e._m(0),n("div",{staticClass:"pos-order-goods"},e._l(e.orderInfo._info,function(t,r){return n("div",{key:r,staticClass:"goods acea-row row-between-wrapper"},[n("div",{staticClass:"picTxt acea-row row-between-wrapper"},[n("div",{staticClass:"pictrue"},[n("img",{attrs:{src:t.cart_info.productInfo.image}})]),n("div",{staticClass:"text acea-row row-between row-column"},[n("div",{staticClass:"info line2"},[e._v("\n            "+e._s(t.cart_info.productInfo.store_name)+"\n          ")]),n("div",{staticClass:"attr"},[e._v(e._s(t.cart_info.productInfo.suk))])])]),n("div",{staticClass:"money"},[n("div",{staticClass:"x-money"},[e._v("￥"+e._s(t.cart_info.productInfo.price))]),n("div",{staticClass:"num"},[e._v("x"+e._s(t.cart_info.cart_num))]),n("div",{staticClass:"y-money"},[e._v("￥"+e._s(t.cart_info.productInfo.ot_price))])])])}),0),n("div",{staticClass:"public-total"},[e._v("\n    共"+e._s(e.orderInfo.total_num)+"件商品，应支付\n    "),n("span",{staticClass:"money"},[e._v("￥"+e._s(e.orderInfo.pay_price))]),e._v(" ( 邮费 ¥"+e._s(e.orderInfo.pay_postage)+"\n    )\n  ")]),n("div",{staticClass:"wrapper"},[n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("订单编号：")]),n("div",{staticClass:"conter acea-row row-middle row-right"},[e._v("\n        "+e._s(e.orderInfo.order_id)),n("span",{staticClass:"copy copy-data",attrs:{"data-clipboard-text":e.orderInfo.order_id}},[e._v("复制")])])]),n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("下单时间：")]),n("div",{staticClass:"conter"},[e._v(e._s(e.orderInfo.add_time))])]),n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("支付状态：")]),n("div",{staticClass:"conter"},[e._v("\n        "+e._s(1==e.orderInfo.paid?"已支付":"未支付")+"\n      ")])]),n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("支付方式：")]),n("div",{staticClass:"conter"},[e._v(e._s(e.payType))])]),n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("买家留言：")]),n("div",{staticClass:"conter"},[e._v(e._s(e.orderInfo.mark))])])]),n("div",{staticClass:"wrapper"},[n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("支付金额：")]),n("div",{staticClass:"conter"},[e._v("￥"+e._s(e.orderInfo.total_price))])]),n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("优惠券抵扣：")]),n("div",{staticClass:"conter"},[e._v("-￥"+e._s(e.orderInfo.coupon_price))])]),n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("运费：")]),n("div",{staticClass:"conter"},[e._v("￥"+e._s(e.orderInfo.freight_price))])]),n("div",{staticClass:"actualPay acea-row row-right"},[e._v("\n      实付款："),n("span",{staticClass:"money font-color-red"},[e._v("￥"+e._s(e.orderInfo.pay_price))])])]),"fictitious"!=e.orderInfo.delivery_type&&2===e.orderInfo._status._type?n("div",{staticClass:"wrapper"},[n("div",{staticClass:"item acea-row row-between"},[n("div",[e._v("配送方式：")]),"express"===e.orderInfo.delivery_type?n("div",{staticClass:"conter"},[e._v("\n        快递\n      ")]):e._e(),"send"===e.orderInfo.delivery_type?n("div",{staticClass:"conter"},[e._v("送货")]):e._e()]),n("div",{staticClass:"item acea-row row-between"},["express"===e.orderInfo.delivery_type?n("div",[e._v("快递公司：")]):e._e(),"send"===e.orderInfo.delivery_type?n("div",[e._v("送货人：")]):e._e(),n("div",{staticClass:"conter"},[e._v(e._s(e.orderInfo.delivery_name))])]),n("div",{staticClass:"item acea-row row-between"},["express"===e.orderInfo.delivery_type?n("div",[e._v("快递单号：")]):e._e(),"send"===e.orderInfo.delivery_type?n("div",[e._v("送货人电话：")]):e._e(),n("div",{staticClass:"conter"},[e._v("\n        "+e._s(e.orderInfo.delivery_id)),n("span",{staticClass:"copy copy-data",attrs:{"data-clipboard-text":e.orderInfo.delivery_id}},[e._v("复制")])])])]):e._e(),n("div",{staticStyle:{height:"1.2rem"}}),"looks"!=e.$route.params.goname?n("div",{staticClass:"footer acea-row row-right row-middle"},[n("div",{staticClass:"more"}),0==e.types?n("div",{staticClass:"bnt cancel",on:{click:function(t){return e.modify(0)}}},[e._v("\n      一键改价\n    ")]):e._e(),-1==e.types?n("div",{staticClass:"bnt cancel",on:{click:function(t){return e.modify(0)}}},[e._v("\n      立即退款\n    ")]):e._e(),n("div",{staticClass:"bnt cancel",on:{click:function(t){return e.modify(1)}}},[e._v("订单备注")]),"offline"===e.orderInfo.pay_type&&0===e.orderInfo.paid?n("div",{staticClass:"bnt cancel",on:{click:e.offlinePay}},[e._v("\n      确认付款\n    ")]):e._e(),1==e.types?n("router-link",{staticClass:"bnt delivery",attrs:{to:"/customer/delivery/"+e.orderInfo.order_id}},[e._v("去发货")]):e._e()],1):e._e(),n("PriceChange",{attrs:{change:e.change,orderInfo:e.orderInfo,status:e.status},on:{closechange:function(t){return e.changeclose(t)},savePrice:e.savePrice}})],1)},i=[function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"line"},[r("img",{attrs:{src:n("afa3")}})])}],o=(n("96cf"),n("3b8d")),a=n("de46"),s=n("b311"),c=n.n(s),l=n("50fc"),u=n("61f7"),d=n("cba2"),f={name:"AdminOrder",components:{PriceChange:a["a"]},props:{},data:function(){return{order:!1,change:!1,order_id:"",orderInfo:{_status:{}},status:"",title:"",payType:"",types:""}},watch:{"$route.params.oid":function(e){var t=this;void 0!=e&&(t.order_id=e,t.getIndex())}},mounted:function(){this.order_id=this.$route.params.oid,this.getIndex(),this.$nextTick(function(){var e=this,t=document.getElementsByClassName("copy-data"),n=new c.a(t);n.on("success",function(){e.$dialog.success("复制成功")})})},methods:{more:function(){this.order=!this.order},modify:function(e){this.change=!0,this.status=e},changeclose:function(e){this.change=e},getIndex:function(){var e=this;Object(l["b"])(e.order_id).then(function(t){e.orderInfo=t.data,e.types=t.data._status._type,e.title=t.data._status._title,e.payType=t.data._status._payType},function(t){e.$dialog.error(t.msg)})},savePrice:function(){var e=Object(o["a"])(regeneratorRuntime.mark(function e(t){var n,r,i,o,a;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:if(n=this,r={},i=t.price,o=t.remark,a=t.refund_price,r.order_id=n.orderInfo.order_id,0!=n.status||0!==n.orderInfo.refund_status){e.next=15;break}return e.prev=3,e.next=6,this.$validator({price:[Object(u["e"])(u["e"].message("金额")),Object(u["d"])(u["d"].message("金额"))]}).validate({price:i});case 6:e.next=11;break;case 8:return e.prev=8,e.t0=e["catch"](3),e.abrupt("return",Object(d["b"])(e.t0));case 11:r.price=i,Object(l["h"])(r).then(function(){n.change=!1,n.$dialog.success("改价成功"),n.getIndex()},function(){n.change=!1,n.$dialog.error("改价失败")}),e.next=39;break;case 15:if(0!=n.status||1!==n.orderInfo.refund_status){e.next=29;break}return e.prev=16,e.next=19,this.$validator({refund_price:[Object(u["e"])(u["e"].message("金额")),Object(u["d"])(u["d"].message("金额"))]}).validate({refund_price:a});case 19:e.next=24;break;case 21:return e.prev=21,e.t1=e["catch"](16),e.abrupt("return",Object(d["b"])(e.t1));case 24:r.price=a,r.type=t.type,Object(l["k"])(r).then(function(e){n.change=!1,n.$dialog.success(e.msg),n.getIndex()},function(e){n.change=!1,n.$dialog.error(e.msg),n.getIndex()}),e.next=39;break;case 29:return e.prev=29,e.next=32,this.$validator({remark:[Object(u["e"])(u["e"].message("备注"))]}).validate({remark:o});case 32:e.next=37;break;case 34:return e.prev=34,e.t2=e["catch"](29),e.abrupt("return",Object(d["b"])(e.t2));case 37:r.remark=o,Object(l["i"])(r).then(function(e){n.change=!1,n.$dialog.success(e.msg),n.getIndex()},function(e){n.change=!1,n.$dialog.error(e.msg)});case 39:case"end":return e.stop()}},e,this,[[3,8],[16,21],[29,34]])}));function t(t){return e.apply(this,arguments)}return t}(),offlinePay:function(){var e=this;Object(l["j"])({order_id:this.orderInfo.order_id}).then(function(t){e.$dialog.success(t.msg),e.getIndex()},function(t){e.$dialog.error(t.msg)})}}},p=f,v=n("2877"),h=Object(v["a"])(p,r,i,!1,null,null,null);t["default"]=h.exports},afa3:function(e,t,n){e.exports=n.p+"h5/img/line.05bf1c84.jpg"},b311:function(e,t,n){
/*!
 * clipboard.js v2.0.4
 * https://zenorocha.github.io/clipboard.js
 * 
 * Licensed MIT © Zeno Rocha
 */
(function(t,n){e.exports=n()})(0,function(){return function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";var r="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"===typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},i=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),o=n(1),a=d(o),s=n(3),c=d(s),l=n(4),u=d(l);function d(e){return e&&e.__esModule?e:{default:e}}function f(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function p(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!==typeof t&&"function"!==typeof t?e:t}function v(e,t){if("function"!==typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var h=function(e){function t(e,n){f(this,t);var r=p(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return r.resolveOptions(n),r.listenClick(e),r}return v(t,e),i(t,[{key:"resolveOptions",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action="function"===typeof e.action?e.action:this.defaultAction,this.target="function"===typeof e.target?e.target:this.defaultTarget,this.text="function"===typeof e.text?e.text:this.defaultText,this.container="object"===r(e.container)?e.container:document.body}},{key:"listenClick",value:function(e){var t=this;this.listener=(0,u.default)(e,"click",function(e){return t.onClick(e)})}},{key:"onClick",value:function(e){var t=e.delegateTarget||e.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new a.default({action:this.action(t),target:this.target(t),text:this.text(t),container:this.container,trigger:t,emitter:this})}},{key:"defaultAction",value:function(e){return y("action",e)}},{key:"defaultTarget",value:function(e){var t=y("target",e);if(t)return document.querySelector(t)}},{key:"defaultText",value:function(e){return y("text",e)}},{key:"destroy",value:function(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)}}],[{key:"isSupported",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:["copy","cut"],t="string"===typeof e?[e]:e,n=!!document.queryCommandSupported;return t.forEach(function(e){n=n&&!!document.queryCommandSupported(e)}),n}}]),t}(c.default);function y(e,t){var n="data-clipboard-"+e;if(t.hasAttribute(n))return t.getAttribute(n)}e.exports=h},function(e,t,n){"use strict";var r="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"===typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},i=function(){function e(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(t,n,r){return n&&e(t.prototype,n),r&&e(t,r),t}}(),o=n(2),a=s(o);function s(e){return e&&e.__esModule?e:{default:e}}function c(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var l=function(){function e(t){c(this,e),this.resolveOptions(t),this.initSelection()}return i(e,[{key:"resolveOptions",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action=e.action,this.container=e.container,this.emitter=e.emitter,this.target=e.target,this.text=e.text,this.trigger=e.trigger,this.selectedText=""}},{key:"initSelection",value:function(){this.text?this.selectFake():this.target&&this.selectTarget()}},{key:"selectFake",value:function(){var e=this,t="rtl"==document.documentElement.getAttribute("dir");this.removeFake(),this.fakeHandlerCallback=function(){return e.removeFake()},this.fakeHandler=this.container.addEventListener("click",this.fakeHandlerCallback)||!0,this.fakeElem=document.createElement("textarea"),this.fakeElem.style.fontSize="12pt",this.fakeElem.style.border="0",this.fakeElem.style.padding="0",this.fakeElem.style.margin="0",this.fakeElem.style.position="absolute",this.fakeElem.style[t?"right":"left"]="-9999px";var n=window.pageYOffset||document.documentElement.scrollTop;this.fakeElem.style.top=n+"px",this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,this.container.appendChild(this.fakeElem),this.selectedText=(0,a.default)(this.fakeElem),this.copyText()}},{key:"removeFake",value:function(){this.fakeHandler&&(this.container.removeEventListener("click",this.fakeHandlerCallback),this.fakeHandler=null,this.fakeHandlerCallback=null),this.fakeElem&&(this.container.removeChild(this.fakeElem),this.fakeElem=null)}},{key:"selectTarget",value:function(){this.selectedText=(0,a.default)(this.target),this.copyText()}},{key:"copyText",value:function(){var e=void 0;try{e=document.execCommand(this.action)}catch(t){e=!1}this.handleResult(e)}},{key:"handleResult",value:function(e){this.emitter.emit(e?"success":"error",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})}},{key:"clearSelection",value:function(){this.trigger&&this.trigger.focus(),window.getSelection().removeAllRanges()}},{key:"destroy",value:function(){this.removeFake()}},{key:"action",set:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"copy";if(this._action=e,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function(){return this._action}},{key:"target",set:function(e){if(void 0!==e){if(!e||"object"!==("undefined"===typeof e?"undefined":r(e))||1!==e.nodeType)throw new Error('Invalid "target" value, use a valid Element');if("copy"===this.action&&e.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if("cut"===this.action&&(e.hasAttribute("readonly")||e.hasAttribute("disabled")))throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes');this._target=e}},get:function(){return this._target}}]),e}();e.exports=l},function(e,t){function n(e){var t;if("SELECT"===e.nodeName)e.focus(),t=e.value;else if("INPUT"===e.nodeName||"TEXTAREA"===e.nodeName){var n=e.hasAttribute("readonly");n||e.setAttribute("readonly",""),e.select(),e.setSelectionRange(0,e.value.length),n||e.removeAttribute("readonly"),t=e.value}else{e.hasAttribute("contenteditable")&&e.focus();var r=window.getSelection(),i=document.createRange();i.selectNodeContents(e),r.removeAllRanges(),r.addRange(i),t=r.toString()}return t}e.exports=n},function(e,t){function n(){}n.prototype={on:function(e,t,n){var r=this.e||(this.e={});return(r[e]||(r[e]=[])).push({fn:t,ctx:n}),this},once:function(e,t,n){var r=this;function i(){r.off(e,i),t.apply(n,arguments)}return i._=t,this.on(e,i,n)},emit:function(e){var t=[].slice.call(arguments,1),n=((this.e||(this.e={}))[e]||[]).slice(),r=0,i=n.length;for(r;r<i;r++)n[r].fn.apply(n[r].ctx,t);return this},off:function(e,t){var n=this.e||(this.e={}),r=n[e],i=[];if(r&&t)for(var o=0,a=r.length;o<a;o++)r[o].fn!==t&&r[o].fn._!==t&&i.push(r[o]);return i.length?n[e]=i:delete n[e],this}},e.exports=n},function(e,t,n){var r=n(5),i=n(6);function o(e,t,n){if(!e&&!t&&!n)throw new Error("Missing required arguments");if(!r.string(t))throw new TypeError("Second argument must be a String");if(!r.fn(n))throw new TypeError("Third argument must be a Function");if(r.node(e))return a(e,t,n);if(r.nodeList(e))return s(e,t,n);if(r.string(e))return c(e,t,n);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}function a(e,t,n){return e.addEventListener(t,n),{destroy:function(){e.removeEventListener(t,n)}}}function s(e,t,n){return Array.prototype.forEach.call(e,function(e){e.addEventListener(t,n)}),{destroy:function(){Array.prototype.forEach.call(e,function(e){e.removeEventListener(t,n)})}}}function c(e,t,n){return i(document.body,e,t,n)}e.exports=o},function(e,t){t.node=function(e){return void 0!==e&&e instanceof HTMLElement&&1===e.nodeType},t.nodeList=function(e){var n=Object.prototype.toString.call(e);return void 0!==e&&("[object NodeList]"===n||"[object HTMLCollection]"===n)&&"length"in e&&(0===e.length||t.node(e[0]))},t.string=function(e){return"string"===typeof e||e instanceof String},t.fn=function(e){var t=Object.prototype.toString.call(e);return"[object Function]"===t}},function(e,t,n){var r=n(7);function i(e,t,n,r,i){var o=a.apply(this,arguments);return e.addEventListener(n,o,i),{destroy:function(){e.removeEventListener(n,o,i)}}}function o(e,t,n,r,o){return"function"===typeof e.addEventListener?i.apply(null,arguments):"function"===typeof n?i.bind(null,document).apply(null,arguments):("string"===typeof e&&(e=document.querySelectorAll(e)),Array.prototype.map.call(e,function(e){return i(e,t,n,r,o)}))}function a(e,t,n,i){return function(n){n.delegateTarget=r(n.target,t),n.delegateTarget&&i.call(e,n)}}e.exports=o},function(e,t){var n=9;if("undefined"!==typeof Element&&!Element.prototype.matches){var r=Element.prototype;r.matches=r.matchesSelector||r.mozMatchesSelector||r.msMatchesSelector||r.oMatchesSelector||r.webkitMatchesSelector}function i(e,t){while(e&&e.nodeType!==n){if("function"===typeof e.matches&&e.matches(t))return e;e=e.parentNode}}e.exports=i}])})}}]);
//# sourceMappingURL=chunk-6d8365fc.fbbdf4c8.js.map