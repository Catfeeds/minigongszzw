var app = getApp();
//index.js
Page({
  data: {
     imgUrls: '',



    dezhii: [
      {
        img: 'http://www.iamcybm.com/template/default/images/why-2.png',
        mingzi: '省钱'
      },
      {
        img: 'http://www.iamcybm.com/template/default/images/why-1.png',
        mingzi: '省心'
      },
      {
        img: 'http://www.iamcybm.com/template/default/images/why-3.png',
        mingzi: '抱团'
      },

    ],

    'headLineList': '',
    indicatorDots: true,
    autoplay: true,
    interval: 5000,
    duration: 1000,
    circular: true,
    productData: [],
    page: 1,
    shebao: '社保代办',
    gongsi:'公司变更',
    geti: '个体注册',
    teshu: '特殊审批',
  },
  feilei: function (e) {
    console.log(e.currentTarget.dataset.id)
    if (e.currentTarget.dataset.id == 0) {
      wx.navigateTo({
        url: '../roc/roc?title=' + e.currentTarget.dataset.title,
      })
    }
    if (e.currentTarget.dataset.id == 1) {
      wx.navigateTo({
        url: '../keep/keep?title=' + e.currentTarget.dataset.title,
      })
    }
    if (e.currentTarget.dataset.id == 2) {
      wx.navigateTo({
        url: '../address/address?title=' + e.currentTarget.dataset.title,
      })
    }
    if (e.currentTarget.dataset.id == 3) {
      wx.navigateTo({
        url: '../hongkong/hongkong?title=' + e.currentTarget.dataset.title,
      })
    }
    if (e.currentTarget.dataset.id == 4) {
          var title=this.data.shebao
       wx.navigateTo({
          url: '../ssg/ssg?title=' + title + '&id=4',
       })
    }
    if (e.currentTarget.dataset.id == 5) {
       console.log(this.data.gongsi) 
       var title = this.data.gongsi
       wx.navigateTo({
         url: '../ssg/ssg?title=' + title + '&id=5',
       })
    }
    if (e.currentTarget.dataset.id == 6) {
       console.log(this.data.geti)
       var title = this.data.geti
       wx.navigateTo({
         url: '../ssg/ssg?title=' + title + '&id=6',
       })
    }
    if (e.currentTarget.dataset.id == 7) {
       console.log(this.data.teshu)
       var title = this.data.teshu
       wx.navigateTo({
         url: '../ssg/ssg?title=' + title + '&id=7',
       })
    }
    if (e.currentTarget.dataset.id == 8) {
   
       wx.navigateTo({
          url: '../planning/planning?title=' + title,
       })
    }

  },
  changeIndicatorDots: function (e) {
    this.setData({
      indicatorDots: !this.data.indicatorDots
    })
  },
  changeAutoplay: function (e) {
    this.setData({
      autoplay: !this.data.autoplay
    })
  },
  intervalChange: function (e) {
    this.setData({
      interval: e.detail.value
    })
  },
  durationChange: function (e) {
    this.setData({
      duration: e.detail.value
    })
  },
  //  商品连接数据 
  initProductData: function (data) {
    // for (var i = 0; i < data.length; i++) {
    //   console.log(data[i]);
    //   var item = data[i];
    //   item.Price = item.Price / 100;
    //   // item.Price = 100;
    //   item.ImgUrl = app.d.hostImg + item.ImgUrl;

    // }
  },
  onLoad: function (options) {
    var that = this;
    wx.request({
      url: app.d.ceshiUrl + '/Api/Index/index',
      method: 'post',
      data: {
        pageindex: that.data.page,
        pagesize: 10,
      },
      header: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      success: function (res) {
        console.log(res);
        //--init data        
        var data = res.data.data;
        console.log(data);
        that.initProductData(data);
        that.setData({
          productData: data,
          imgUrls:res.data.ggtop,
          bottom: res.data.bottom,
          dezhi:res.data.pro,
        });
        //endInitData
      },
    })

  },


  onShareAppMessage: function () {
     return {
        title: '公司注册网',
        path: '/pages/index/index',
        success: function (res) {
           // 分享成功
        },
        fail: function (res) {
           // 分享失败
        }
     }
  }
});