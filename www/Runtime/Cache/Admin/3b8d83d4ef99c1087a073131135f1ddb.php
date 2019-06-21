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
  
  <link rel="stylesheet" href="/OA/www/Public/static/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/OA/www/Public/static/bootstrap/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="/OA/www/Public/static/datetimepicker/css/datetimepicker.css">
  <link rel="stylesheet" href="/OA/www/Public/static/datetimepicker/css/datetimepicker_blue.css">
  <link rel="stylesheet" type="text/css" href="/OA/www/Public/Admin/css/mainLayout.css">

  
  <style>
    .edit_label {
      width: 128px;
    }
  </style>

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
      <a href="<?php echo u('dev/newdevlist');?>">开发管理</a>
      <span class="divider">/</span>
    </div>
    <div>
      <a href="<?php echo u('dev/dev_delivery');?>">开发交付记录</a>
      <span class="divider">/</span>
    </div>
    <div><?php echo ($info['id']?'编辑':'新增'); ?>开发交付记录</div>
  </div>


    
  <div class="newly">
    <form action="/oa/www/admin/dev/dev_delivery_add.html" method="post" class="form-vertical">
      <div class="edit_items">
        <label class="edit_label">交付编号</label>
        <div class="edit_info">
          <input type="text" readonly placeholder="(系统自动生成)">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">交付类型</label>
        <div class="edit_info">
          <select id="delivery_type" name="delivery_type" class="selectpicker" data-width="172" title="请选择" data-size="6">
              <option value="1">需求新增</option>
              <option value="2">BUG修复</option>
              <option value="3">首次交付</option>
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">项目名称</label>
        <div class="edit_info">
          <select id="project_id" name="project_id" class="selectpicker" data-width="172" title="请选择" data-size="6" data-live-search="true" data-live-search-placeholder="Search">
            <?php if(is_array($projects)): $i = 0; $__LIST__ = $projects;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["project_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">项目类型</label>
        <div class="edit_info">
          <input type="text" id="project_type" readonly name="project_type">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">项目地区</label>
        <div class="edit_info">
          <input type="text" readonly id="province" name="province">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">合同编号</label>
        <div class="edit_info">
          <select id="contract_code" name="contract_code" class="selectpicker" data-width="172" title="请选择" data-size="6">
           
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">采购产品</label>
        <div class="edit_info">
          <input type="text"  id="project_productlist" name="project_productlist">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">交付产品</label>
        <div class="edit_info">
          <select name="deliver_product[]" class="selectpicker" id="deliver_product" data-width="172" title="请选择" data-size="6" multiple>
            <!-- <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["product_name"]); ?>"><?php echo ($vo["product_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> -->
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">实施负责人</label>
        <div class="edit_info">
          <input type="text"  id="TechRole" name="tech_role">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">交付版本号</label>
        <div class="edit_info">
          <input type="text" name="deliver_version">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">交付日期</label>
        <div class="edit_info">
          <div class="date form_datetime">
            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
            <input type="text" class="date" name="del_date" placeholder="选择日期" readonly>
          </div>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">开发负责人</label>
        <div class="edit_info">
          <input type="text" name="dev_role">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">情况说明</label>
        <div class="edit_info">
          <textarea name="describe"></textarea>
        </div>
      </div>
      <div class="edit_btn">
        <input type="hidden" name="id" value="<?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]):''); ?>">
        <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-vertical">确 定</button>
        <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
      </div>
    </form>
  </div>

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

  <script src="/OA/www/Public/static/bootstrap/js/bootstrap.min.js"></script>
  <script src="/OA/www/Public/static/bootstrap/js/bootstrap-select.min.js"></script>
  <script src="/OA/www/Public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="/OA/www/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
  <script type="text/javascript">
    $(function () {
      //导航高亮
      $('.side-sub-menu').find('a[href="<?php echo U('dev/dev_delivery');?>"]').closest('li').addClass('current');

      // 日期插件
      $('.form_datetime').datetimepicker({
        format: 'yyyy-mm-dd',
        language: "zh-CN",
        minView: 2,
        autoclose: true,
        todayBtn: true
      });
    });

    $("#project_id").change(function () {
      $("#deliver_product").empty().selectpicker('refresh');
      $("#contract_code").empty();
      $("#project_productlist").val('');
      var project_id = $(this).val();
      // console.log(project_id);
      // Ajax提交数据
      // return;
      $.ajax({
        url: "<?php echo U('Dev/getProjectBypid');?>",    // 提交到controller的url路径
        type: "post",    // 提交方式
        data: {"project_id": project_id},  // data为String类型，必须为 Key/Value 格式。
        dataType: "json",    // 服务器端返回的数据类型
        success: function (data) {
          // $("#project_id").empty();
          
          $("#project_type").val(data.project_type);
          $("#province").val(data.province);
          $("#TechRole").val(data.TechRole);
          // $("#project_productlist").val(data.project_productlist);

          let str = '';
          data.contract.map(item => {
            str += `<option value='${item.contract_code}'>${item.contract_code}</option>`;
          });
          $("#contract_code").append(str).selectpicker('refresh');

        },
      });
    });

    $("#contract_code").change(function () {
      $("#project_productlist").val('');
      var contract_code = $(this).val();
      console.log(contract_code);
      // Ajax提交数据
      // return;
      $.ajax({
        url: "<?php echo U('Dev/getProductsBycid');?>",    // 提交到controller的url路径
        type: "post",    // 提交方式
        data: {"contract_code": contract_code},  // data为String类型，必须为 Key/Value 格式。
        dataType: "json",    // 服务器端返回的数据类型
        success: function (data) {
          console.log(data);
          $("#project_productlist").val(data.project_productlist);
           let str = '';
           if (data.project_productlist) {
              data.project_productlist.split(',').map(item => {
                str += `<option value='${item}'>${item}</option>`;
              });            
           }
          $('#deliver_product').html(str).selectpicker('refresh');
          

        },
      });
    });

  </script>


</body>
</html>