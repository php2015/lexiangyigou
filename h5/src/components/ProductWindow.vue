<template>
  <div>
    <div
      class="product-window"
      :class="attr.cartAttr === true ? 'on' : ''"
      :style="'padding-bottom:' + (isShowBtn ? '0' : '')"
    >
      <div class="textpic acea-row row-between-wrapper">
        <div class="pictrue">
          <img :src="attr.productSelect.image" class="image" />
        </div>
        <div class="text">
          <div class="line1">
            {{ attr.productSelect.store_name }}
          </div>
          <div v-if="is_intergral_pro==0" class="money font-color-red" style="margin-top: 0.1rem;margin-bottom: 0.2rem">
            ￥<span class="num">{{ attr.productSelect.price }}</span>
          </div>
          <div v-if="is_intergral_pro==1" class="money font-color-red" style="margin-top: 0.1rem;margin-bottom: 0.2rem">
            <span class="num">{{ pro_intergral }}积分</span>
          </div>
          <div class="line1" v-if="is_intergral_pro==0">
          <div  class="stock" style="display: flex;justify-content: space-between" >
            <span>团购类型:</span>
            <span>{{ tuan_number }}人团</span>
            </div>
          </div>

        </div>
        <div class="iconfont icon-guanbi" @click="closeAttr"></div>
      </div>
      <div class="productWinList">
        <div
          class="item"
          v-for="(item, indexw) in attr.productAttr"
          :key="indexw"
        >
          <div class="title">{{ item.attr_name }}</div>
          <div class="listn acea-row row-middle">
            <div
              class="itemn"
              :class="item.index === itemn.attr ? 'on' : ''"
              v-for="(itemn, indexn) in item.attr_value"
              @click="tapAttr(indexw, itemn.attr)"
              :key="indexn"
            >
              {{ itemn.attr }}
            </div>
          </div>
        </div>
      </div>
      <div class="cart">
        <div class="title">数量</div>
        <div class="carnum acea-row row-left">
          <div
            class="item reduce"
            :class="attr.productSelect.cart_num <= 1 ? 'on' : ''"
            @click="CartNumDes"
          >
            -
          </div>
          <div class="item num">
            <input
              type="number"
              v-model="attr.productSelect.cart_num"
              class="ipt_num"
            />
          </div>
          <div
            class="item plus"
            :class="
              attr.productSelect.cart_num >= attr.productSelect.stock
                ? 'on'
                : ''
            "
            @click="CartNumAdd"
          >
            +
          </div>
        </div>
      </div>
      <div class="wrapper" v-if="isShowBtn">
        <div
          class="teamBnt bg-color-red"
          @click="openAlone"
          v-if="
            attr.productSelect.quota > 0 && attr.productSelect.product_stock > 0
          "
        >
          立即参团
        </div>
        <div class="teamBnt bg-color-hui" v-else>已售磬</div>
      </div>
    </div>
    <div
      class="mask"
      @touchmove.prevent
      :hidden="attr.cartAttr === false"
      @click="closeAttr"
    ></div>
  </div>
</template>
<script>
export default {
  name: "ProductWindow",
  props: {
    pro_intergral:{
      type: Object,
      default: () => {}
    },
    is_intergral_pro:{
      type: Object,
      default: () => {}
    },
    tuan_number:{
      type: Object,
      default: () => {}
    },
    attr: {
      type: Object,
      default: () => {}
    }
  },
  data: function() {
    return {};
  },
  computed: {
    isShow() {
      return this.$route.path.indexOf("detail") === 1;
    },
    isShowBtn() {
      return this.$route.path.indexOf("group_rule") != -1;
    }
  },
  mounted: function() {},
  methods: {
    openAlone() {
      this.$emit("changeFun", { action: "goPay", value: false });
    },
    closeAttr: function() {
      this.$emit("changeFun", { action: "changeattr", value: false });
    },
    CartNumDes: function() {
      this.$emit("changeFun", { action: "ChangeCartNum", value: false });
    },
    CartNumAdd: function() {
      this.$emit("changeFun", { action: "ChangeCartNum", value: 1 });
    },
    tapAttr: function(indexw, indexn) {
      let that = this;
      that.attr.productAttr[indexw].index = indexn;
      let value = that
        .getCheckedValue()
        .sort()
        .join(",");
      that.$emit("changeFun", { action: "ChangeAttr", value: value });
    },
    //获取被选中属性；
    getCheckedValue: function() {
      let productAttr = this.attr.productAttr;
      let value = [];
      for (let i = 0; i < productAttr.length; i++) {
        for (let j = 0; j < productAttr[i].attr_value.length; j++) {
          if (productAttr[i].index === productAttr[i].attr_value[j].attr) {
            value.push(productAttr[i].attr_value[j].attr);
          }
        }
      }
      return value;
    }
  }
};
</script>

<style scoped>
.ipt_num {
  width: 100%;
  display: block;
  line-height: 0.54rem;
  text-align: center;
}
</style>
