// pages/hongkong/hongkong.js
var app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    hongkong:'',
    problem:'',
  },
   like:function(){
     wx.navigateTo({
        url: '../ssg/ssg?id=3',
        success: function(res) {},
        fail: function(res) {},
        complete: function(res) {},
     })
   },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
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
          hongkong: res.data.hongkong,
          problem: res.data.problem,
        });
        //endInitData
      },
    })
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
        title: '香港挂靠',
        path: '/pages/hongkong/hongkong',
        success: function (res) {
           // 分享成功
        },
        fail: function (res) {
           // 分享失败
        }
     }
  }
})