// pages/ssg/ssg.js
var app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    company:'',
    id:0,
    aff_id:0,
     tabArr: {
        curHdIndex: 0,
        curBdIndex: 0
     },
     imgUrls: ['http://img02.sogoucdn.com/app/a/100520024/840ba27ceccc2842093a4e8afe27f019',
        'http://img04.sogoucdn.com/app/a/100520024/0c18fdb09734b139c10d81cd38b77660'
     ],
     indicatorDots: true,
     autoplay: true,
     interval: 5000,
     duration: 1000,
     circular: true,
  },
  calling: function () {
    var id = this.data.id;
    var aff_id = this.data.aff_id;
wx.redirectTo({

   url: '../pay/pay?id='+id+'&aff_id='+aff_id,
   success: function(res) {},
   fail: function(res) {},
   complete: function(res) {},
})
  },
  // tab切换
  tabFun: function (e) {
     //获取触发事件组件的dataset属性 
     var _datasetId = e.target.dataset.id;
     console.log("----" + _datasetId + "----");
     var _obj = {};
     _obj.curHdIndex = _datasetId;
     _obj.curBdIndex = _datasetId;
     this.setData({
        tabArr: _obj
     });
  }, 
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
        var id = options.id;
        var that = this;
        that.setData({
          id:id,
        });
        wx.setNavigationBarTitle({
           title: options.title,
           success: function(res) {},
           fail: function(res) {},
           complete: function(res) {},
        });
        if(id==0){
          wx.request({
            url: app.d.ceshiUrl + '/Api/Company/index',
            method: 'post',
            header: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function (res) {
              console.log(res);
              //--init data        
              that.setData({
                company: res.data.company,
                adv: res.data.adv,
              });
              //endInitData
            },
          })
        }else if(id == 2){
          wx.request({
            url: app.d.ceshiUrl + '/Api/Affiliate/detail',
            data:{
              id:options.aid,
            },
            method: 'post',
            header: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function (res) {
              var aff_id=res.data.affiliate.id
              console.log(res);
              //--init data        
              that.setData({
                company: res.data.affiliate,
                aff_id:aff_id,
              });
              //endInitData
            },
          })
        }else if(id == 3){
          wx.request({
            url: app.d.ceshiUrl + '/Api/HongKong/index',
            method: 'post',
            header: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function (res) {
              console.log(res);
              //--init data        
              that.setData({
                company: res.data.hongkong,
              });
              //endInitData
            },
          })
        }else if (id == 4) {
          wx.request({
            url: app.d.ceshiUrl + '/Api/Shebao/index',
            method: 'post',
            header: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function (res) {
              console.log(res);
              //--init data        
              that.setData({
                company: res.data.shebao,
              });
              //endInitData
            },
          })
        }else if (id == 5) {
          wx.request({
            url: app.d.ceshiUrl + '/Api/Change/index',
            method: 'post',
            header: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function (res) {
              console.log(res);
              //--init data        
              that.setData({
                company: res.data.change,
              });
              //endInitData
            },
          })
        }else if (id == 6) {
          wx.request({
            url: app.d.ceshiUrl + '/Api/PersonRegister/index',
            method: 'post',
            header: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function (res) {
              console.log(res);
              //--init data        
              that.setData({
                company: res.data.person,
              });
              //endInitData
            },
          })
        }else if (id == 7) {
          wx.request({
            url: app.d.ceshiUrl + '/Api/Approve/index',
            method: 'post',
            header: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            success: function (res) {
              console.log(res);
              //--init data        
              that.setData({
                company: res.data.approve,
              });
              //endInitData
            },
          })
        }
        
        

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
     return {
        title: '社保代办',
        path: '/pages/ssg/ssg',
        success: function (res) {
           // 分享成功
        },
        fail: function (res) {
           // 分享失败
        }
     }
  }
})