<template>

  <div>
    <img  src="http://meida.lxt7.cn//addons/sjlm_tg/template/mobile/images/Icon_left1_arrow.png" onclick="javascript:history.go(-1)" style="width: .5rem;height:.5rem; margin-left:0.3rem;margin-top:0.2rem">

    <div style="display: flex;justify-content: center;align-items: start;flex-direction: column;margin-top: 50%;margin-left: 25%">
      <span style="margin-bottom: 30px">卡号: 6222 6208 1002 7727 078</span>
      <span style="margin-bottom: 30px">开户行: 交通银行</span>
      <span>持卡人:张林</span>
    </div>
  </div>
</template>
<script>
  import sendVerifyCode from "@mixins/SendVerifyCode";
  import {
    login,
    loginMobile,
    registerVerify,
    register,
    getCodeApi
  } from "@api/user";
  import attrs, { required, alpha_num, chs_phone,is_agreed } from "@utils/validate";
  import { validatorDefaultCatch } from "@utils/dialog";
  import { getLogo } from "@api/public";
  import cookie from "@utils/store/cookie";
  import { VUE_APP_API_URL } from "@utils";
  const BACK_URL = "login_back_url";

  export default {
    name: "Login",
    mixins: [sendVerifyCode],
    data: function() {
      return {
        navList: ["账号登录"],
        current: 0,
        account: "",
        password: "",
        captcha: "",
        formItem: 1,
        type: "login",
        name: "",
        logoUrl: "",
        keyCode: "",
        codeUrl: "",
        codeVal: "",
        invite_code: "",
        isShowCode: false,
        is_agree:false
      };
    },
    mounted: function() {
      this.getCode();
      this.getLogoImage();
      this.invite_code = this.getQueryVariable('code')?this.getQueryVariable('code'):'';

      if (this.getQueryVariable('code')){
        this.formItem = 0;
      }
      if (this.getQueryVariable('item')){
        this.formItem = 0;
      }
    },
    methods: {

      handleDisabled:function(){
        this.is_agree = !this.is_agree;
        if(this.is_agree===true){
          this.is_agree =  true;
        }
        else{
          this.is_agree =  false;
        }
        console.log(this.is_agree)
      },
      getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
          var pair = vars[i].split("=");
          if(pair[0] === variable){return pair[1];}
        }
        return false;
      },
      again() {
        this.codeUrl =
                VUE_APP_API_URL +
                "/sms_captcha?" +
                "key=" +
                this.keyCode +
                Date.parse(new Date());
      },
      getCode() {
        getCodeApi()
                .then(res => {
                  this.keyCode = res.data.key;
                })
                .catch(res => {
                  this.$dialog.error(res.msg);
                });
      },
      async getLogoImage() {
        let that = this;
        getLogo(2).then(res => {
          that.logoUrl = res.data.logo_url;
        });
      },
      async loginMobile() {
        var that = this;
        const { account, captcha } = that;
        try {
          await that
                  .$validator({
                    account: [
                      required(required.message("手机号码")),
                      chs_phone(chs_phone.message())
                    ],
                    captcha: [
                      required(required.message("验证码")),
                      alpha_num(alpha_num.message("验证码"))
                    ]
                  })
                  .validate({ account, captcha });
        } catch (e) {
          return validatorDefaultCatch(e);
        }
        loginMobile({
          phone: that.account,
          captcha: that.captcha,
          spread: cookie.get("spread")
        })
                .then(res => {
                  let data = res.data;
                  let expires_time = data.expires_time.substring(0, 19);
                  expires_time = expires_time.replace(/-/g, "/");
                  expires_time = new Date(expires_time).getTime() - 28800000;
                  // const expires_time = new Date(data.expires_time).getTime() / 1000;
                  const datas = {
                    token: data.token,
                    expires_time: expires_time
                  };

                  this.$store.commit("LOGIN", datas);
                  const backUrl = cookie.get(BACK_URL) || "/";
                  cookie.remove(BACK_URL);
                  that.$router.replace({ path: backUrl });
                })
                .catch(res => {
                  that.$dialog.error(res.msg);
                });
      },
      async register() {
        var that = this;
        const { account, captcha, password,invite_code} = that;
        if (!this.is_agree){
          that.$dialog.error("请同意用户注册协议")
          return;
        }
        try {
          await that
                  .$validator({

                    account: [
                      required(required.message("手机号码")),
                      chs_phone(chs_phone.message())
                    ],
                    captcha: [
                      required(required.message("验证码")),
                      alpha_num(alpha_num.message("验证码"))
                    ],
                    password: [
                      required(required.message("密码")),
                      attrs.range([6, 16], attrs.range.message("密码")),
                      alpha_num(alpha_num.message("密码"))
                    ]
                  })
                  .validate({ account, captcha, password});
        } catch (e) {
          return validatorDefaultCatch(e);
        }
        register({
          invite_code: that.invite_code,
          account: that.account,
          captcha: that.captcha,
          password: that.password,
          spread: cookie.get("spread"),
          name: this.name
        })
                .then(res => {
                  that.$dialog.success(res.msg);
                  that.formItem = 1;
                })
                .catch(res => {
                  that.$dialog.error(res.msg);
                });
      },
      async code() {
        var that = this;
        const { account } = that;
        try {
          await that
                  .$validator({
                    account: [
                      required(required.message("手机号码")),
                      chs_phone(chs_phone.message())
                    ]
                  })
                  .validate({ account });
        } catch (e) {
          return validatorDefaultCatch(e);
        }
        if (that.formItem == 2) that.type = "register";
        await registerVerify({
          phone: that.account,
          type: "register",
          key: that.keyCode,
          code: that.codeVal
        })
                .then(res => {
                  that.$dialog.success(res.msg);
                  that.sendCode();
                })
                .catch(res => {
                  if (res.data.status === 402) {
                    that.codeUrl = `${VUE_APP_API_URL}/sms_captcha?key=${that.keyCode}`;
                    that.isShowCode = true;
                  }
                  that.$dialog.error(res.msg);
                });
      },
      navTap: function(index) {
        this.current = index;
      },
      async submit() {
        const { account, password, codeVal, invite_code } = this;
        try {
          await this.$validator({
            account: [
              required(required.message("账号")),
              attrs.range([5, 16], attrs.range.message("账号")),
              alpha_num(alpha_num.message("账号"))
            ],
            password: [
              required(required.message("密码")),
              attrs.range([6, 16], attrs.range.message("密码")),
              alpha_num(alpha_num.message("密码"))
            ],
            codeVal: this.isShowCode
                    ? [
                      required(required.message("验证码")),
                      attrs.length(4, attrs.length.message("验证码")),
                      alpha_num(alpha_num.message("验证码"))
                    ]
                    : []
          }).validate({ account, password, codeVal });
        } catch (e) {
          return validatorDefaultCatch(e);
        }

        login({ account, password, code: codeVal })
                .then(({ data }) => {
                  let expires_time = data.expires_time.substring(0, 19);
                  expires_time = expires_time.replace(/-/g, "/");
                  expires_time = new Date(expires_time).getTime() - 28800000;
                  const datas = {
                    token: data.token,
                    expires_time: expires_time
                  };
                  localStorage.setItem("LOGIN",JSON.stringify(datas));
                  this.$store.commit("LOGIN", datas);
                  const backUrl = cookie.get(BACK_URL) || "/";
                  cookie.remove(BACK_URL);
                  this.$router.replace({ path: backUrl });
                  //  let newTime = Math.round(new Date() / 1000);
                  // this.$store.commit("LOGIN", data.token, dayjs(data.expires_time))213123
                })
                .catch(e => {
                  this.$dialog.error(e.msg);
                });
      }
    }
  };
</script>
<style scoped>
  .code img {
    width: 100%;
    height: 100%;
  }
</style>
