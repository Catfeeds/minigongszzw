var app = getApp();
Page({
  data:({
    bottom:'',
  }),
  calling: function () {
    // console.log(this.data.bottom[0].phone);
    wx.makePhoneCall({
      phoneNumber: this.data.bottom[0].phone,
      success: function () {
        console.log("拨打电话成功！")
        console.log(phoneNumber);
      },
      fail: function () {
        console.log("拨打电话失败！")
      }
    })
  },

    // 弹窗
   setModalStatus: function (e) {
    console.log("设置显示状态，1显示0不显示", e.currentTarget.dataset.status);
    var animation = wx.createAnimation({
      duration: 200,
      timingFunction: "linear",
      delay: 0
    })
    this.animation = animation
    animation.translateY(300).step()
    this.setData({
      animationData: animation.export()
    })
    if (e.currentTarget.dataset.status == 1) {
      this.setData(
        {
          showModalStatus: true
        }
      );
    }
    setTimeout(function () {
      animation.translateY(0).step()
      this.setData({
        animationData: animation
      })
      if (e.currentTarget.dataset.status == 0) {
        this.setData(
          {
            showModalStatus: false
          }
        );
      }
    }.bind(this), 200)
  },
  onShow:function () {
    var that = this;
    wx.request({
      url: app.d.ceshiUrl + '/Api/Index/index',
      method: 'post',
      header: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      success: function (res) {
        console.log(res);
        //--init data        
        that.setData({
          bottom: res.data.bottom,
        });
        //endInitData
      },
    })
  },

  bindFormSubmit:function (e) {
      var content = e.detail.value.textarea;
      // console.log(content);
      wx.request({
        url: app.d.ceshiUrl + '/Api/User/suggest',
        method: 'post',
        data:{
          uid: app.d.userId,
          content:content,
        },
        header: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        success: function (res) {
          console.log(res);
         var status = res.data.status;
         if(status == 1){
           wx.showToast({
             title: "提交成功！",
           });
         }else{
           wx.showToast({
             title: res.data.err,
           })
         }
        },
      })
  },
})