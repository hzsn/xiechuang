<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('public/head.php') ;?>
<div class="layui-layout layui-layout-admin">
 <?php require_once('public/header.php') ;?>
 <div class="layui-body">
 <div class="layui-tab layui-tab-brief" lay-filter="article-tab">
  <ul class="layui-tab-title">
    <li class="layui-this" layui-id="">资讯列表</li>
    <li layui-id="">栏目列表</li>
  </ul>
  <div class="layui-tab-content">
    <div id="layui-view-tab" class="layui-tab-item layui-show">
      <div class="layui-inline">
      <form class="layui-form" action="">
        <div class="layui-inline">
          <label class="layui-form-label">ID:</label>
          <div class="layui-input-inline">
          <input name="article_id" required="" lay-verify="required" placeholder="请输入文章ID" autocomplete="on" class="layui-input" type="text">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">标题:</label>
          <div class="layui-input-inline" style="width: 450px">
          <input name="article_title" required="" lay-verify="required" placeholder="请输入文章标题" autocomplete="on" class="layui-input" type="text">
          </div>
        </div>
        <button class="layui-btn" type="submit">查询</button>
      </form>
      </div>
      <div class="layui-inline">
        <button class="layui-btn layui-btn-normal"><i class="layui-icon">&#xe608;</i> 添加资讯</button>
      </div>
      
      <table class="layui-table">
      <?php 
      ?>
        <colgroup>
          <col>
          <col width="50%">
          <col>
        </colgroup>
        <thead>
          <tr>
            <th>ID</th>
            <th>标题</th>
            <th>类别</th>
            <th>状态</th>
            <th>访问量</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tfoot>
          <tr>
            <td colspan="6" align="right">
              <div id="page-atb" class="layui-tab-page"></div>
            </td>
          </tr>
        </tfoot>
        <tbody>
          <?php
            if(!isset($article)){
              echo "暂无数据";
            }
          foreach ($article as $key => $value) { 
              $status = '显示';
              $_class = '';
              $article_title = '<a href="http://hzxcsy.xlgp.xc/article/'.$value["id"].'" target="_blank">'.$value["title"].'</a>';
              if($value['status']){
                $_class = 'layui-gray';
                $status = '不显示';
                $article_title = $value["title"];
              }
            ?>
            <tr class="<?php echo $_class;?>">
              <td><?php echo $value['id']?></td>
              <td class="layui-elip"><?php echo $article_title ?></td>
              <td><?php echo $value['cato_name']?></td>
              <td><?php echo $status ;?></td>
              <td><?php echo $value['pv'];?></td>
              <td>
                <div class="layui-btn-group">
                  <a class="layui-btn layui-btn-primary layui-btn-small editor-btn" title="修改文章" href="javascript:;" data-id="<?php echo $value['id']?>">
                    <i class="layui-icon">&#xe642;</i>
                  </a>
                  <?php if(!$value['status']){?>
                  <a class="layui-btn layui-btn-primary layui-btn-small del-btn" title="删除文章" href="javascript:;" data-id="<?php echo $value['id']?>">
                    <i class="layui-icon">&#xe640;</i>
                  </a>
                  <?php }?>        
                </div>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
    <div class="layui-tab-item">
      <blockquote class="layui-elem-quote"><h3>栏目列表</h3></blockquote>
    </div>
  </div>
</div>      
</div>
<script type="text/javascript">
layui.use(['laypage', 'layer', 'jquery', 'element','form'],function(){
  var laypage = layui.laypage,
      layer = layui.layer,
      $ = layui.jquery,
      element = layui.element(),
      form = layui.form();

  laypage({
      cont: document.getElementById('page-atb'),
      pages: <?php echo $article_total_count?>, //可以叫服务端把总页数放在某一个隐藏域，再获取。假设我们获取到的是18
      curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
        var page = location.href.match(/index\/(\d+\/*)/);
        return page ? page[1] : 1;
      }(),
      skip: true, //是否开启跳页
      jump: function(e, first){ //触发分页后的回调
        if(!first){ //一定要加此判断，否则初始时会无限刷新
          location.href = location.protocol + '//' + location.host + '/admin/news/index/' +e.curr;
        }
      }
  });


  $('.del-btn').on('click', function(){
    var article_id = $(this).data('id');
      layer.confirm('确定删除ID为 '+article_id+' 的文章吗？', {
        btn: ['确定','取消'] //按钮
      }, function(){
        layer.msg('这是只是测试用例而已啦', {icon: 3});
      });   
  });

  $('.editor-btn').on('click', function(){
    var article_id = $(this).data('id');
    layer.open({
      title:'测试页面',
      type:2,
      area: ['85%','90%'],
      maxmin:true,
      content:'<?php echo base_url('/')?>',
    });
  });



});
</script>
<?php require_once('public/footer.php') ;?>