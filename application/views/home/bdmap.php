<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
    <meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
    <title>百度地图API自定义地图</title>
    <style type="text/css">
      html, body{
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <!--引用百度地图API-->
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BD5bd0c6de91c102c22de161faa1af82"></script>
  </head>

  <body>
    <!--百度地图容器-->
    <div style="width:100%;height:100%;" id="map"></div>
  </body>
  <script type="text/javascript">
  /**
   * [customersStack description]
   * 类型：红色：汽配商
   * 蓝色：修理厂
   * 绿色：4S店
   21@type {Obj-22ct}
   */
  var customersStack = {
    attrs:  {province:'省份',
        city:'城市',
        bus_module:'主营业务',
        comp_name:'公司名称',
        comp_short_name:'公司简称',
        comp_type:'公司类型',
        contacts:'联系人',
        tel:'联系方式',
        address:'地址',
        qq:'QQ',
        weixin:'微信',
        jingquedu:'精确度',
        position:'坐标'},
    customers:[
{"province": "浙江", "comp_type":"汽配商", "address": "杭州市良渚街道储运路107号C座4楼","comp_name":"杭州鼎能汽车配件有限公司", "comp_short_name": "杭州鼎能", "tel": "0571-87206368", "jingquedu": "1", "contacts": "俞强", "bus_module": "奇瑞，开瑞", "qq": "2368970252", "city": "杭州", "marker": {lng:120.130854, lat:30.388041, offheight:-21,offwidth:1}},
{"province": "浙江", "comp_type":"汽配商", "address": "杭州市江干区新塘路356-361号汽配城内（377-379营业房）","comp_name":"", "comp_short_name": "杭州康东", "tel": "", "jingquedu": "1", "contacts": "程子良", "bus_module": "奇瑞，开瑞", "qq": "624743654", "city": "杭州", "marker": {lng:120.208738, lat:30.283756, offheight:-21,offwidth:1}},
{"province": "浙江", "comp_type":"汽配商", "address": "杭州市浙江汽配城377号","comp_name":"", "comp_short_name": "杭州彦君", "tel": "0571-84653371", "jingquedu": "1", "contacts": "周小建", "bus_module": "奇瑞", "city": "杭州", "marker": {lng:120.216181, lat:30.291368, offheight:-21,offwidth:1}},
{"province": "上海", "comp_type":"汽配商", "address": "上海市普陀区真北路3319号","comp_name":"", "comp_short_name": "上海弘迅", "tel": "", "jingquedu": "0", "contacts": "袁振洋", "bus_module": "奇瑞", "qq": "2661895350", "city": "普陀", "marker": {lng:121.404372, lat:31.28325, offheight:-21,offwidth:1}},
{"province": "上海", "comp_type":"汽配商", "address": "上海市虹梅南路 吴中汽配城14区17号","comp_name":"", "comp_short_name": "上海倍武", "tel": "021-34634498", "jingquedu": "1", "contacts": "周", "bus_module": "奇瑞，力帆", "qq": "8164021", "city": "虹梅", "marker": {lng:121.448347, lat:31.084668, offheight:-21,offwidth:1}},
{"province": "上海", "comp_type":"汽配商", "address": "上海市嘉定区博园路999弄新东方汽配城9栋109","comp_name":"", "comp_short_name": "上海淳润", "tel": "021-69968919", "jingquedu": "1", "contacts": "叶", "bus_module": "奇瑞", "qq": "332787876", "city": "嘉定", "marker": {lng:121.287711, lat:31.266277, offheight:-21,offwidth:1}},
{"province": "上海", "comp_type":"汽配商", "address": "上海市虹梅南路车配龙一期3区5号","comp_name":"", "comp_short_name": "上海大友", "tel": "021-33505965", "jingquedu": "0", "contacts": "贵陆", "bus_module": "奇瑞", "qq": "1172113773", "city": "虹梅", "marker": {lng:121.448046, lat:31.085523, offheight:-21,offwidth:1}},
{"province": "上海", "comp_type":"汽配商", "address": "上海市闵行区虹梅南路3888号汽配城一期29区21-24号","comp_name":"", "comp_short_name": "上海冠雅", "tel": "021-34625789", "jingquedu": "0", "contacts": "蒋文斌", "bus_module": "奇瑞", "qq": "825069222", "city": "闵行", "marker": {lng:121.449297, lat:31.085056, offheight:-21,offwidth:1}},
{"province": "安徽", "comp_type":"汽配商", "address": "芜湖市鸠江区万春西路180号亚夏二手车市场14-12","comp_name":"", "comp_short_name": "", "tel": "", "jingquedu": "1", "contacts": "谷有琴", "bus_module": "奇瑞", "qq": "1139295618", "city": "芜湖", "marker": {lng:118.445614, lat:31.384924, offheight:-21,offwidth:1}},
{"province": "安徽", "comp_type":"汽配商", "address": "合肥市三里街汽配城","comp_name":"", "comp_short_name": "合肥瑞雅", "tel": "0551-64201086", "jingquedu": "1", "contacts": "刘振清", "bus_module": "奇瑞", "qq": "932651823", "city": "合肥", "marker": {lng:117.326819, lat:31.873855, offheight:-21,offwidth:1}},
{"province": "安徽", "comp_type":"汽配商", "address": "合肥市三里街汽配城/合肥市瑶海区三里街汽配城 天长路与凤阳路岔口","comp_name":"", "comp_short_name": "合肥鑫润达", "tel": "0551-67101919", "jingquedu": "0", "contacts": "", "bus_module": "奇瑞", "qq": "512774456", "city": "合肥", "marker": {lng:117.325281, lat:31.87832, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京市仙林汽配城宏达设备市场2号库","comp_name":"", "comp_short_name": "南京泽旭", "tel": "025-85360257", "jingquedu": "0", "contacts": "史女士", "bus_module": "奇瑞", "qq": "1219213682", "city": "南京", "marker": {lng:118.9087, lat:32.121854, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京市栖霞区仙林汽配城20幢2-1","comp_name":"", "comp_short_name": "南京中奇", "tel": "025-85354465", "jingquedu": "1", "contacts": "王帅", "bus_module": "奇瑞，开瑞", "qq": "317373384", "city": "南京", "marker": {lng:118.904388, lat:32.117469, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京栖霞大道18号高力汽配城12栋119号","comp_name":"", "comp_short_name": "南京奇备", "tel": "025-86983516", "jingquedu": "0", "contacts": "孟德和", "bus_module": "奇瑞", "qq": "82351283", "city": "南京", "marker": {lng:118.842102, lat:32.124474, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "江苏省南京市栖霞区下曹101号","comp_name":"", "comp_short_name": "南京中超", "tel": "025-85350038", "jingquedu": "0", "contacts": "杨绍宏", "bus_module": "奇瑞", "qq": "550865786", "city": "南京", "marker": {lng:118.90471, lat:32.117467, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "徐州市泉山区汽配城特区159-160号","comp_name":"", "comp_short_name": "徐州锦鸿", "tel": "0516-69927288", "jingquedu": "1", "contacts": "乔言峰", "bus_module": "奇瑞", "qq": "842649312", "city": "徐州", "marker": {lng:117.227165, lat:34.237424, offheight:-21,offwidth:1}},
{"province": "山东", "comp_type":"汽配商", "address": "山东临沂汽摩配城A-393号，三合汽配","comp_name":"", "comp_short_name": "临沂三合", "tel": "", "jingquedu": "1", "contacts": "马宏岩", "bus_module": "奇瑞", "qq": "1779286072", "city": "临沂", "marker": {lng:118.302882, lat:35.093854, offheight:-21,offwidth:1}},
{"province": "福建", "comp_type":"汽配商", "address": "莆田市荔城区西天尾镇龙山村奇奇汽车城 ","comp_name":"", "comp_short_name": "莆田奇奇", "tel": "0594-2889907", "jingquedu": "1", "contacts": "陈丽贞", "bus_module": "奇瑞", "qq": "877890425", "city": "莆田", "marker": {lng:119.058145, lat:25.478494, offheight:-21,offwidth:1}},
{"province": "安徽", "comp_type":"汽配商", "address": "安徽省六安市经济开发区312国道交叉口铃木4S店","comp_name":"", "comp_short_name": "六安明峰", "tel": "0564-3851333", "jingquedu": "1", "contacts": "王华", "bus_module": "铃木", "qq": "2063522007", "city": "六安", "marker": {lng:116.621567, lat:31.768266, offheight:-21,offwidth:1}},
{"province": "广西", "comp_type":"汽配商", "address": "广西南宁市高新区高新大道东段3号永邦汽车城","comp_name":"", "comp_short_name": "广西智迈", "tel": "", "jingquedu": "0", "contacts": "韦雯萱", "bus_module": "铃木", "qq": "2314860385", "city": "南宁", "marker": {lng:108.279473, lat:22.873648, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京市栖霞区仙林汽配城4栋1-2号","comp_name":"", "comp_short_name": "南京宏骏", "tel": "025-85357110", "jingquedu": "0", "contacts": "潘宏骏", "bus_module": "铃木", "qq": "244274087", "city": "南京", "marker": {lng:118.902738, lat:32.116421, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京市雨花区软件大道20号宁南汽配城18幢21号","comp_name":"", "comp_short_name": "南京弘泰", "tel": "025-66618275", "jingquedu": "0", "contacts": "", "bus_module": "铃木", "qq": "791938083", "city": "南京", "marker": {lng:118.805283, lat:31.987775, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "江苏省南京市栖霞区仙林汽配城","comp_name":"", "comp_short_name": "南京昊瑞", "tel": "025-85359008", "jingquedu": "1", "contacts": "王海瑞", "bus_module": "铃木", "qq": "734866661", "city": "南京", "marker": {lng:118.904141, lat:32.116896, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京市栖霞区栖霞大道18号高力汽配城12幢109号","comp_name":"", "comp_short_name": "南京鑫长铃", "tel": "025-86911552", "jingquedu": "0", "contacts": "易长春", "bus_module": "铃木", "qq": "240469637", "city": "南京", "marker": {lng:118.842102, lat:32.124474, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "江苏省南京市栖霞区仙林汽配城","comp_name":"", "comp_short_name": "南京昊阳", "tel": "", "jingquedu": "1", "contacts": "万新", "bus_module": "铃木", "qq": "1493970814", "city": "南京", "marker": {lng:118.904216, lat:32.116254, offheight:-21,offwidth:1}},
{"province": "上海", "comp_type":"汽配商", "address": "上海浦东秀浦路振东汽配城2期2栋30号","comp_name":"", "comp_short_name": "上海伟青", "tel": "021-68068232", "jingquedu": "0", "contacts": "张新军", "bus_module": "铃木", "qq": "375307015", "city": "浦东", "marker": {lng:121.559646, lat:31.132145, offheight:-21,offwidth:1}},
{"province": "上海", "comp_type":"修理厂", "address": "上海市嘉定区博源路999号2-124","comp_name":"", "comp_short_name": "上海渊源", "tel": "021-59186133", "jingquedu": "1", "contacts": "葛渊源", "bus_module": "铃木", "qq": "30682880", "city": "嘉定", "marker": {lng:121.368866, lat:31.261019, offheight:-21,offwidth:-22}},
{"province": "江苏", "comp_type":"汽配商", "address": "无锡市崇安区广益汽配城C-17-130","comp_name":"", "comp_short_name": "无锡帆佳", "tel": "0510-82466336", "jingquedu": "0", "contacts": "李文章", "bus_module": "铃木", "qq": "239300064", "city": "无锡", "marker": {lng:120.33422, lat:31.60189, offheight:-21,offwidth:1}},
{"province": "浙江", "comp_type":"汽配商", "address": "杭州市拱墅区花园岗街111号金通汽配城18幢9-10号","comp_name":"", "comp_short_name": "杭州国宾", "tel": "0571-85106529", "jingquedu": "0", "contacts": "吴海芳", "bus_module": "铃木，力帆", "qq": "1770933772", "city": "杭州", "marker": {lng:120.129938, lat:30.331824, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"修理厂", "address": "苏州市胥江路586号，震宇汽配","comp_name":"", "comp_short_name": "苏州震宇", "tel": "0512-68224847", "jingquedu": "1", "contacts": "徐克林", "bus_module": "铃木", "city": "苏州", "marker": {lng:120.605657, lat:31.293575, offheight:-21,offwidth:-22}},
{"province": "浙江", "comp_type":"汽配商", "address": "杭州市新塘路353号浙江汽配城内879号","comp_name":"", "comp_short_name": "杭州龙丰", "tel": "", "jingquedu": "1", "contacts": "李金余", "bus_module": "铃木", "city": "杭州", "marker": {lng:120.216181, lat:30.291368, offheight:-21,offwidth:1}},
{"province": "浙江", "comp_type":"汽配商", "address": "杭州万品汽配城6幢1-5号","comp_name":"", "comp_short_name": "杭州顺航", "tel": "0571-85152086", "jingquedu": "1", "contacts": "周", "bus_module": "幻速", "qq": "1336998554", "city": "杭州", "marker": {lng:120.309373, lat:30.324316, offheight:-21,offwidth:1}},
{"province": "浙江", "comp_type":"修理厂", "address": "浙江省杭州市拱墅区花园岗街111号（浙江金通汽配城5号楼14号）","comp_name":"", "comp_short_name": "杭州韩现", "tel": "0571-89981770", "jingquedu": "0", "contacts": "丁凯", "bus_module": "幻速", "qq": "2355456863", "city": "杭州", "marker": {lng:120.129623, lat:30.329971, offheight:-21,offwidth:-22}},
{"province": "浙江", "comp_type":"汽配商", "address": "杭州市新塘路汽配城2075号","comp_name":"", "comp_short_name": "杭州天禄", "tel": "", "jingquedu": "0", "contacts": "韩亮", "bus_module": "幻速", "qq": "33908325", "city": "杭州", "marker": {lng:120.214423, lat:30.290959, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京市仙林汽配城甘家边东101-1号","comp_name":"", "comp_short_name": "南京宇泽轩", "tel": "025-85495561", "jingquedu": "1", "contacts": "", "bus_module": "幻速", "qq": "335300743", "city": "南京", "marker": {lng:118.903152, lat:32.116897, offheight:-21,offwidth:1}},
{"province": "江苏", "comp_type":"汽配商", "address": "南京市仙林汽配城","comp_name":"", "comp_short_name": "南京中超", "tel": "", "jingquedu": "0", "contacts": "伍德禹", "bus_module": "幻速", "city": "南京", "marker": {lng:118.90471, lat:32.117467, offheight:-21,offwidth:1}},
{"province": "浙江", "comp_type":"汽配商", "address": "杭州市下城区石桥路290号","comp_name":"", "comp_short_name": "杭州新中南", "tel": "0571-88175602", "jingquedu": "0", "contacts": "周丽萍", "bus_module": "奇瑞服务站", "qq": "1947038840", "city": "杭州", "marker": {lng:120.20075, lat:30.326959, offheight:-21,offwidth:1}},
{"province": "浙江", "comp_type":"汽配商", "address": "嘉兴市中环南路999号汽车商贸园品牌区2号D座（长安铃木4S店）","comp_name":"", "comp_short_name": "嘉兴中信", "tel": "0573-83687937", "jingquedu": "0", "contacts": "屠康", "bus_module": "铃木服务站", "qq": "344968426", "city": "嘉兴", "marker": {lng:120.815532, lat:30.741391, offheight:-21,offwidth:1}},
]
}
</script>
  <script type="text/javascript">
  function getUserContent(data){
     //信息窗口内容
      var content = [];
    content.push('<div style="width: 400px;position: relative;">');
    content.push('<div style="font-size: 18px;padding: 5px;border-bottom:1px solid #e0e0e0;">'+data.comp_name+'</div>');
    content.push('<div style="padding: 5px; font-size: 14px">');
    content.push('<div>');
    if(data.contacts) content.push('<span style="display: inline-block;width: 50%;">'+customersStack.attrs.contacts+'：'+data.contacts+'</span>');
    if(data.tel) content.push('<span>'+customersStack.attrs.tel+'：'+data.tel+'</span>');
    content.push('</div>');
    if(data.bus_module) content.push('<div>'+customersStack.attrs.bus_module+'：'+data.bus_module+'</div>');
    if(data.address) content.push('<div class="address">'+customersStack.attrs.address+'：'+data.address+'</div>');
    content.push('</div></div>');
    return content.join('');
  }
    //创建和初始化地图函数：
    function initMap(){
      createMap();//创建地图
      setMapEvent();//设置地图事件
      addMapControl();//向地图添加控件
      addMapOverlay();//向地图添加覆盖物
    }
    function createMap(){ 
      map = new BMap.Map("map"); 
      map.centerAndZoom(new BMap.Point(120.122819,30.32512),6);
    }
    function setMapEvent(){
      map.enableScrollWheelZoom();
      map.enableKeyboard();
      map.enableDragging();
      map.enableDoubleClickZoom()
    }
    function addClickHandler(target,window){
      target.addEventListener("click",function(){
        target.openInfoWindow(window);
      });
    }
    function addMapOverlay(){
      var customers = customersStack.customers;
      for(var index = 0; index < customers.length; index++ ){
        var point = new BMap.Point(customers[index].marker.lng, customers[index].marker.lat);
        var marker = new BMap.Marker(point,{
          icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",
          new BMap.Size(23,25),
          {
            anchor: new BMap.Size(11.5, 25),
            imageOffset: new BMap.Size(customers[index].marker.offwidth, customers[index].marker.offheight)
        })});
        if(customers[index].comp_short_name){
          var label = new BMap.Label(customers[index].comp_short_name,{offset: new BMap.Size(25,5)});
          marker.setLabel(label);
        }
        var infoWindow = new BMap.InfoWindow(getUserContent(customers[index]),{
          offset:new BMap.Size(0, -21),
        });
        addClickHandler(marker,infoWindow);
        map.addOverlay(marker);
      };
    }
    //向地图添加控件
    function addMapControl(){
      var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
      scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
      map.addControl(scaleControl);
      var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
      map.addControl(navControl);
      var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:true});
      map.addControl(overviewControl);
    }
    var map;
    initMap();
  </script>
</html>