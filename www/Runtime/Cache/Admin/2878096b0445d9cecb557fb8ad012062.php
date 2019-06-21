<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo ($meta_title); ?>|GDWS-OA管理平台</title>
  <link href="/OA/www/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
  <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/base.css" media="all">
  <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/common.css" media="all">
  <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/module.css">
  <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/style.css" media="all">
  <!-- <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/new.css" media="all"> -->
  <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
  <!--[if lt IE 9]>
  <script type="text/javascript" src="/OA/www/Public/static/jquery-1.10.2.min.js"></script>
  <![endif]--><!--[if gte IE 9]><!-->
  <script type="text/javascript" src="/OA/www/Public/static/jquery-2.0.3.min.js"></script>
  <script type="text/javascript" src="/OA/www/Public/Admin/js/jquery.mousewheel.js"></script>
  <!--<![endif]-->
  
  <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/mainLayout.css" media="all">

  
</head>
<body>
<!-- 头部 -->
<?php $__base_menu__ = $__controller__->getMenus(); ?>
<div class="header">
  <!-- Logo -->
  <span class="logo"></span>
  <!-- /Logo -->

  <!-- 主导航 -->
  <ul class="main-nav">
    <?php if(is_array($__base_menu__["main"])): $i = 0; $__LIST__ = $__base_menu__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <!-- /主导航 -->

  <!-- 用户栏 -->
  <div class="user-bar">
    <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
    <ul class="nav-list user-menu hidden">
      <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
      <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
      <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
      <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
    </ul>
  </div>
</div>
<!-- /头部 -->

<!-- 边栏 -->
<div class="sidebar">
  <!-- 子导航 -->
  
    <div id="subnav" class="subnav">
      <?php if(!empty($_extra_menu)): ?>
        <?php echo extra_menu($_extra_menu,$__base_menu__); endif; ?>
      <?php if(is_array($__base_menu__["child"])): $i = 0; $__LIST__ = $__base_menu__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
        <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
          <ul class="side-sub-menu">
            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul><?php endif; ?>
        <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  
  <!-- /子导航 -->
</div>
<!-- /边栏 -->

<!-- 内容区 -->
<div id="main-content">
  <div id="top-alert" class="fixed alert alert-error" style="display: none;">
    <button class="close fixed" style="margin-top: 4px;">&times;</button>
    <div class="alert-content">这是内容</div>
  </div>
  <div id="main" class="main">
    
  <div class="breadcrumb">
    <span>您的位置:</span>
    <div>
      <span>开发管理</span>
      <span class="divider">/</span>
    </div>
    <div>新产品开发计划</div>
  </div>


    
  <div class="search_box">
    <div class="items">
      <span>产品名称：</span>
      <input type="text" name="product_name" class="search-input" value="<?php echo I('product_name');?>"/>
    </div>

    <div class="items">
      <span>状态：</span>
      <div class="drop-down">
        <span id="sch-sort-txt" class="sort-txt" data="<?php echo ($status); ?>">
          <?php echo state_text($status);?>
        </span>
        <i class="arrow arrow-down"></i>
        <ul id="sub-sch-menu" class="nav-list hidden">
          <li><a href="javascript:void(0);" value="">所有</a></li>
          <li><a href="javascript:void(0);" value="0">新增</a></li>
          <li><a href="javascript:void(0);" value="1">正常</a></li>
          <li><a href="javascript:void(0);" value="2">完成</a></li>
          <li><a href="javascript:void(0);" value="3">暂停</a></li>
          <li><a href="javascript:void(0);" value="4">延期</a></li>
        </ul>
      </div>
    </div>

    <div class="items">
      <a class="sch-btn" href="javascript:void(0);" id="search" url="<?php echo U('newdevlist');?>"><i class="btn-search"></i></a>
    </div>
    <div class="items action_btn_box">
      <button class="btn" id="action_add" url="<?php echo U('new_dev_add');?>">新 增</button>
      <button class="btn ajax-post confirm" target-form="ids" url="<?php echo U('new_sure',array('status'=>-1));?>">确 认</button>
      <button class="btn ajax-post confirm" target-form="ids" url="<?php echo U('new_sure',array('status'=>-2));?>">完 成</button>
      <button class="btn ajax-post confirm" target-form="ids" url="<?php echo U('new_sure',array('status'=>-3));?>">终 止</button>
      <button class="btn ajax-post confirm" target-form="ids" url="<?php echo U('new_sure',array('status'=>-4));?>">延 期</button>
    </div>
  </div>

  <!-- 数据列表 -->
  <div class="data-table">
    <table>
      <thead>
      <tr>
        <th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
        <th>计划编号</th>
        <th>状态</th>
        <th>产品名称</th>
        <th>产品类型</th>
        <th>迭代版本</th>
        <th>启动日期</th>
        <!-- <th>预计完成日期</th> -->
        <th>实际完成日期</th>
        <th>实际人天</th>
        <th>产品负责人</th>
        <!-- <th>开发负责人</th> -->
        <!-- <th>情况说明</th> -->
        <th>创建人</th>
        <th>创建时间</th>
        <th>更新人</th>
        <th>更新时间</th>
        <th>操作</th>

      </tr>
      </thead>
      <tbody>
      <?php if($newproduct != ''): if(is_array($newproduct)): $i = 0; $__LIST__ = $newproduct;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><input class="ids" type="checkbox" name="ids[]" value="<?php echo ($vo["id"]); ?>"/></td>
            <td><?php echo ($vo["plan_code"]); ?></td>
            <td>
              <?php if($vo["status"] == 0): ?>新增
                <?php elseif($vo["status"] == 1): ?>
                正常
                <?php elseif($vo["status"] == 2): ?>
                已完成
                <?php elseif($vo["status"] == 3): ?>
                暂停
                <?php elseif($vo["status"] == 4 ): ?>
                延期<?php endif; ?>
            </td>
            <td><?php echo ($vo["product_name"]); ?></td>
            <td>
              <?php if($vo["product_type"] == 1): ?>标准版
              <?php elseif($vo["product_type"] == 2): ?>
                新产品
              <?php elseif($vo["product_type"] == 3): ?>
                集团版<?php endif; ?>
            </td>
            <td><?php echo ($vo["version"]); ?></td>
            <td><?php echo ($vo["start_time"]); ?></td>
            <td><?php echo ($vo["ac_time"]); ?></td>
            <td><?php echo ($vo["manday"]); ?></td>
            <td><?php echo ($vo["product_charge"]); ?></td>
            <!-- <td><?php echo ($vo["dev_role"]); ?></td> -->
            <!-- <td><?php echo ($vo["describe"]); ?></td> -->
            <td><?php echo ($vo["create_person"]); ?></td>
            <td><?php echo ($vo["create_time"]); ?></td>
            <td><?php echo ($vo["update_person"]); ?></td>
            <td><?php echo ($vo["update_time"]); ?></td>
            <td>
              <a href="<?php echo U('new_dev_add?id='.$vo['id']);?>">详情</a>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
        <tr>
          <td colspan="14">
            <div class="no_data">没有数据</div>
          </td>
        </tr><?php endif; ?>
      </tbody>
    </table>

  </div>
  <!-- 分页 -->
  <div class="page"><?php echo ($_page); ?></div>
  <!-- /分页 -->


  </div>
  <div class="cont-ft">
    <div class="copyright">
      <div class="fl">感谢使用<a href="http://www.gdwstech.com" target="_blank">GDWS</a>oa管理平台</div>
      <div class="fr">V3.0.1</div>
    </div>
  </div>
</div>
<!-- /内容区 -->
<script type="text/javascript">
  (function () {
    var ThinkPHP = window.Think = {
      "ROOT": "/OA/www", //当前网站地址
      "APP": "/OA/www", //当前项目地址
      "PUBLIC": "/OA/www/Public", //项目公共目录地址
      "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
      "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
      "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
    }
  })();
</script>
<script type="text/javascript" src="/OA/www/Public/static/think.js"></script>
<script type="text/javascript" src="/OA/www/Public/Admin/js/common.js"></script>
<script type="text/javascript">
  +function () {
    var $window = $(window), $subnav = $("#subnav"), url;
    $window.resize(function () {
      $("#main").css("min-height", $window.height() - 130);
    }).resize();

    /* 左边菜单高亮 */
    url = window.location.pathname + window.location.search;
    url = url.replace(".html", "")
      .replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)/, "");
    $subnav.find("a[href^='" + url + "']").parent().addClass("current");

    /* 左边菜单显示收起 */
    $("#subnav").on("click", "h3", function () {
      var $this = $(this);
      $this.find(".icon").toggleClass("icon-fold");
      $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").prev("h3").find("i").addClass("icon-fold").end().end().hide();
    });

    $("#subnav h3 a").click(function (e) {
      e.stopPropagation()
    });

    /* 头部管理员菜单 */
    $(".user-bar").mouseenter(function () {
      var userMenu = $(this).children(".user-menu ");
      userMenu.removeClass("hidden");
      clearTimeout(userMenu.data("timeout"));
    }).mouseleave(function () {
      var userMenu = $(this).children(".user-menu");
      userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
      userMenu.data("timeout", setTimeout(function () {
        userMenu.addClass("hidden")
      }, 100));
    });

    /* 表单获取焦点变色 */
    $("form").on("focus", "input", function () {
      $(this).addClass('focus');
    }).on("blur", "input", function () {
      $(this).removeClass('focus');
    });
    $("form").on("focus", "textarea", function () {
      $(this).closest('label').addClass('focus');
    }).on("blur", "textarea", function () {
      $(this).closest('label').removeClass('focus');
    });

    // 导航栏超出窗口高度后的模拟滚动条
    var sHeight = $(".sidebar").height();
    var subHeight = $(".subnav").height();
    var diff = subHeight - sHeight; //250
    var sub = $(".subnav");
    if (diff > 0) {
      $(window).mousewheel(function (event, delta) {
        if (delta > 0) {
          if (parseInt(sub.css('marginTop')) > -10) {
            sub.css('marginTop', '0px');
          } else {
            sub.css('marginTop', '+=' + 10);
          }
        } else {
          if (parseInt(sub.css('marginTop')) < '-' + (diff - 10)) {
            sub.css('marginTop', '-' + (diff - 10));
          } else {
            sub.css('marginTop', '-=' + 10);
          }
        }
      });
    }
  }();
</script>

  <script type="text/javascript">
    $(function () {
      /* 状态搜索子菜单 */
      $(".drop-down").hover(function(){
        $("#sub-sch-menu").removeClass("hidden");
      },function(){
        $("#sub-sch-menu").addClass("hidden");
      });

      $("#sub-sch-menu li").find("a").each(function(){
        $(this).click(function(){
          var text = $(this).text();
          $("#sch-sort-txt").text(text).attr("data",$(this).attr("value"));
          $("#sub-sch-menu").addClass("hidden");
        })
      });

      //  新增
      $("#action_add").click(function () {
        window.location.href = $(this).attr('url');
      })

      //搜索功能
      $("#search").click(function () {
        var url = $(this).attr('url');
        var status = $("#sch-sort-txt").attr("data");
        var query = $('.search_box').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
        query = query.replace(/^&/g, '');
        if (query) {
          if (url.indexOf('?') > 0) {
            url += '&' + query;
          } else {
            url += '?' + query;
          }
        }

        if (status != '') {
          if (url.indexOf('?') > 0) {
            url += '&status=' + status;
          } else {
            url += '?status=' + status;
          }
        }
        window.location.href = url;
      });
      //回车搜索
      $(".search-input").keyup(function (e) {
        if (e.keyCode === 13) {
          $("#search").click();
          return false;
        }
      });
    })
  </script>

</body>
</html>