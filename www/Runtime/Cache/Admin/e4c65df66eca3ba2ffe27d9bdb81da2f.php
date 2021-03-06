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
      <a href="<?php echo u('contract/intention');?>">合同管理</a>
      <span class="divider">/</span>
    </div>
    <div>
      <a href="<?php echo u('index');?>">项目维护</a>
      <span class="divider">/</span>
    </div>
    <div><?php echo ($info['id']?'编辑':'新增'); ?>项目</div>
  </div>


    
  <div class="newly">
    <form action="/oa/www/admin/project/add.html" method="post" class="form-vertical">
      <div class="edit_items">
        <label class="edit_label">项目编号</label>
        <div class="edit_info">
          <input type="text" readonly placeholder="系统自动生成" name="customer_code">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">客户名称</label>
        <div class="edit_info">
          <select name="customer" class="selectpicker" data-width="150" data-size="6" data-live-search="true" data-live-search-placeholder="Search">
            <?php if(is_array($customers)): $i = 0; $__LIST__ = $customers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["customer"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">项目(商业)名称</label>
        <div class="edit_info">
          <input type="text" name="project_name" placeholder="请输入（项目|商业）名称">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">开始日期</label>
        <div class="edit_info">
          <div class="date form_datetime">
              <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
              <input type="text" class="date" name="begin_time" placeholder="选择日期" readonly style='width: 110px;'>
          </div>
          <!-- <div class="datepicker">
            <i class="sys-icon-clock"></i>
            <input type="text" class="date" name="begin_time" placeholder="选择日期" class="datepicker-input">
          </div> -->
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">开业日期</label>
        <div class="edit_info">
          <div class="date form_datetime">
              <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
              <input type="text" class="date" name="open_time" placeholder="选择日期" readonly style='width: 110px;'>
          </div>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">项目类型</label>
        <div class="edit_info">
          <select name="project_type" class="selectpicker" data-width="150" data-size="6" data-live-search="true" data-live-search-placeholder="Search">
            <option value="购物中心">购物中心</option>
            <option value="购物中心">百货商场</option>
            <option value="购物中心">专业市场</option>
            <option value="购物中心">精品广场</option>
            <option value="购物中心">名品折扣店</option>
            <option value="购物中心">批发市场</option>
            <option value="购物中心">文化主题业态</option>
            <option value="购物中心">旅游商业业态</option>
            <option value="购物中心">商业街</option>
            <option value="购物中心">住宅底商商业</option>
            <option value="购物中心">政府</option>
            <option value="购物中心">其他</option>
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">联系人</label>
        <div class="edit_info">
          <input type="text" name="linkman">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">职位</label>
        <div class="edit_info">
          <input type="text" name="position">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">联系电话</label>
        <div class="edit_info">
          <input type="text" name="linkphone">
        </div>
      </div>

      <div class="edit_items">
        <label class="edit_label">商务负责人</label>
        <div class="edit_info">
          <select name="charge_person[]" class="selectpicker" data-width="150" data-size="6" title="请选择" multiple>
            <?php if(is_array($charge_persons)): $i = 0; $__LIST__ = $charge_persons;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["nickname"]); ?>"><?php echo ($vo["nickname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">地区</label>
        <div class="edit_info">
          <select id="province" runat="server" onchange="selectprovince(this);" name="province" class="selectpicker" data-width="auto" data-size="6"></select>
          <select id="city" runat="server" name="city" class="selectpicker cityList" data-width="auto" data-size="6"></select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">意向产品</label>
        <div class="edit_info">
          <select name="purchase_intention[]" class="selectpicker" data-width="150" title="请选择" multiple data-size="6" data-live-search="true" data-live-search-placeholder="Search">
            <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["product_name"]); ?>"><?php echo ($vo["product_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">项目预估(元)</label>
        <div class="edit_info">
          <input type="text" name="budget">
        </div>
      </div>
      <div class="edit_items">
        <label class="edit_label">备注</label>
        <div class="edit_info">
          <textarea name="remark"></textarea>
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
  <script type="text/javascript" src="/OA/www/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
  <script type="text/javascript">
    $(function () {
      //导航高亮
      $('.side-sub-menu').find('a[href="<?php echo U('Project/index');?>"]').closest('li').addClass('current');

      // 日期插件
      $('.form_datetime').datetimepicker({
        format: 'yyyy-mm-dd',
        language: "zh-CN",
        minView: 2,
        autoclose: true,
        todayBtn: true
      });
    });
    // Think.setValue("type", <?php echo ((isset($info["type"]) && ($info["type"] !== ""))?($info["type"]):0); ?>);
    // Think.setValue("group", <?php echo ((isset($info["group"]) && ($info["group"] !== ""))?($info["group"]):0); ?>);
  </script>

  <script type="text/javascript">
    var list1 = new Array;
    var list2 = new Array;
    list1[list1.length] = "北京市";
    list1[list1.length] = "天津市";
    list1[list1.length] = "河北省";
    list1[list1.length] = "山西省";
    list1[list1.length] = "内蒙古";
    list1[list1.length] = "辽宁省";
    list1[list1.length] = "吉林省";
    list1[list1.length] = "黑龙江省";
    list1[list1.length] = "上海市";
    list1[list1.length] = "江苏省";
    list1[list1.length] = "浙江省";
    list1[list1.length] = "安徽省";
    list1[list1.length] = "福建省";
    list1[list1.length] = "江西省";
    list1[list1.length] = "山东省";
    list1[list1.length] = "河南省";
    list1[list1.length] = "湖北省";
    list1[list1.length] = "湖南省";
    list1[list1.length] = "广东省";
    list1[list1.length] = "广西自治区";
    list1[list1.length] = "海南省";
    list1[list1.length] = "重庆市";
    list1[list1.length] = "四川省";
    list1[list1.length] = "贵州省";
    list1[list1.length] = "云南省";
    list1[list1.length] = "西藏自治区";
    list1[list1.length] = "陕西省";
    list1[list1.length] = "甘肃省";
    list1[list1.length] = "青海省";
    list1[list1.length] = "宁夏回族自治区";
    list1[list1.length] = "新疆维吾尔自治区";
    list1[list1.length] = "香港特别行政区";
    list1[list1.length] = "澳门特别行政区";
    list1[list1.length] = "台湾省";
    list1[list1.length] = "其它";

    list2[list2.length] = new Array("北京", "东城区", "西城区", "崇文区", "宣武区", "朝阳区", "丰台区", "石景山区", " 海淀区（中关村）", "门头沟区", "房山区", "通州区", "顺义区", "昌平区", "大兴区", "怀柔区", "平谷区", "密云县", "延庆县", " 其他");
    list2[list2.length] = new Array("和平区", "河东区", "河西区", "南开区", "红桥区", "塘沽区", "汉沽区", "大港区",
      "西青区", "津南区", "武清区", "蓟县", "宁河县", "静海县", "其他");
    list2[list2.length] = new Array("石家庄市", "张家口市", "承德市", "秦皇岛市", "唐山市", "廊坊市", "衡水市",
      "沧州市", "邢台市", "邯郸市", "保定市", "其他");
    list2[list2.length] = new Array("太原市", "朔州市", "大同市", "长治市", "晋城市", "忻州市", "晋中市", "临汾市",
      "吕梁市", "运城市", "其他");
    list2[list2.length] = new Array("呼和浩特市", "包头市", "赤峰市", "呼伦贝尔市", "鄂尔多斯市", "乌兰察布市",
      "巴彦淖尔市", "兴安盟", "阿拉善盟", "锡林郭勒盟", "其他");
    list2[list2.length] = new Array("沈阳市", "朝阳市", "阜新市", "铁岭市", "抚顺市", "丹东市", "本溪市", "辽阳市",
      "鞍山市", "大连市", "营口市", "盘锦市", "锦州市", "葫芦岛市", "其他");
    list2[list2.length] = new Array("长春市", "白城市", "吉林市", "四平市", "辽源市", "通化市", "白山市", "延边朝鲜族自治州", "其他");
    list2[list2.length] = new Array("哈尔滨市", "七台河市", "黑河市", "大庆市", "齐齐哈尔市", "伊春市", "佳木斯市",
      "双鸭山市", "鸡西市", "大兴安岭地区(加格达奇)", "牡丹江", "鹤岗市", "绥化市　", "其他");
    list2[list2.length] = new Array("黄浦区", "卢湾区", "徐汇区", "长宁区", "静安区", "普陀区", "闸北区", "虹口区",
      "杨浦区", "闵行区", "宝山区", "嘉定区", "浦东新区", "金山区", "松江区", "青浦区", "南汇区", "奉贤区", "崇明县", "其他");
    list2[list2.length] = new Array("南京市", "徐州市", "连云港市", "宿迁市", "淮安市", "盐城市", "扬州市", "泰州市",
      "南通市", "镇江市", "常州市", "无锡市", "苏州市", "其他");
    list2[list2.length] = new Array("杭州市", "湖州市", "嘉兴市", "舟山市", "宁波市", "绍兴市", "衢州市", "金华市",
      "台州市", "温州市", "丽水市", "其他");
    list2[list2.length] = new Array("合肥市", "宿州市", "淮北市", "亳州市", "阜阳市", "蚌埠市", "淮南市", "滁州市",
      "马鞍山市", "芜湖市", "铜陵市", "安庆市", "黄山市", "六安市", "巢湖市", "池州市", "宣城市", "其他");
    list2[list2.length] = new Array("福州市", "南平市", "莆田市", "三明市", "泉州市", "厦门市", "漳州市", "龙岩市", "宁德市", "其他");
    list2[list2.length] = new Array("南昌市", "九江市", "景德镇市", "鹰潭市", "新余市", "萍乡市", "赣州市", "上饶市",
      "抚州市", "宜春市", "吉安市", "其他");
    list2[list2.length] = new Array("济南市", "聊城市", "德州市", "东营市", "淄博市", "潍坊市", "烟台市", "威海市",
      "青岛市", "日照市", "临沂市", "枣庄市", "济宁市", "泰安市", "莱芜市", "滨州市", "菏泽市", "其他");
    list2[list2.length] = new Array("郑州市", "三门峡市", "洛阳市", "焦作市", "新乡市", "鹤壁市", "安阳市", "濮阳市",
      "开封市", "商丘市", "许昌市", "漯河市", "平顶山市", "南阳市", "信阳市", "周口市", "驻马店市", "其他");
    list2[list2.length] = new Array("武汉市", "十堰市", "襄樊市", "荆门市", "孝感市", "黄冈市", "鄂州市", "黄石市",
      "咸宁市", "荆州市", "宜昌市", "随州市", "恩施土家族苗族自治州", "仙桃市", "天门市", "潜江市", "神农架林区", "其他");
    list2[list2.length] = new Array("长沙市", "张家界市", "常德市", "益阳市", "岳阳市", "株洲市", "湘潭市", "衡阳市",
      "郴州市", "永州市", "邵阳市", "怀化市", "娄底市", "湘西土家族苗族自治州", "其他");
    list2[list2.length] = new Array("广州市", "清远市市", "韶关市", "河源市", "梅州市", "潮州市", "汕头市", "揭阳市",
      "汕尾市", " 惠州市", "东莞市", "深圳市", "珠海市", "中山市", "江门市", "佛山市", "肇庆市", "云浮市",
      "阳江市", "茂名市", "湛江市", " 其他");
    list2[list2.length] = new Array("南宁市", "桂林市", "柳州市", "梧州市", "贵港市", "玉林市", "钦州市", "北海市",
      "防城港市", "崇左市", "百色市", "河池市", "来宾市", "贺州市", "其他");
    list2[list2.length] = new Array("海口市", "三亚市", "其他");
    list2[list2.length] = new Array("渝中区", "大渡口区", "江北区", "沙坪坝区", "九龙坡区", "南岸区", "北碚区",
      "万盛区", "双桥区", "渝北区", "巴南区", "万州区", "涪陵区", "黔江区", "长寿区", "合川市", "永川市",
      "江津市", "南川市", "綦江县", "潼南县", "铜梁县", "大足县", "璧山县", "垫江县", "武隆县", "丰都县",
      "城口县", "开县", "巫溪县", "巫山县", "奉节县", "云阳县", "忠县", "石柱土家族自治县", "彭水苗族土家族自治县",
      "酉阳土家族苗族自治县", "秀山土家族苗族自治县", "其他");
    list2[list2.length] = new Array("成都市", "广元市", "绵阳市", "德阳市", "南充市", "广安市", "遂宁市",
      "内江市", "乐山市", "自贡市", "泸州市", "宜宾市", "攀枝花市", "巴中市", "资阳市", "眉山市", "雅安",
      "阿坝藏族羌族自治州", "甘孜藏族自治州", "凉山彝族自治州县", "其他");
    list2[list2.length] = new Array("贵阳市", "六盘水市", "遵义市", "安顺市", "毕节地区", "铜仁地区",
      "黔东南苗族侗族自治州", "黔南布依族苗族自治州", "黔西南布依族苗族自治州", "其他");
    list2[list2.length] = new Array("昆明市", "曲靖市", "玉溪市", "保山市", "昭通市", "丽江市", "普洱市",
      "临沧市", "宁德市", "德宏傣族景颇族自治州", "怒江傈僳族自治州", "楚雄彝族自治州", "红河哈尼族彝族自治州",
      "文山壮族苗族自治州", "大理白族自治州", "迪庆藏族自治州", "西双版纳傣族自治州", "其他");
    list2[list2.length] = new Array("拉萨市", "那曲地区", "昌都地区", "林芝地区", "山南地区", "日喀则地区", "阿里地区", "其他");
    list2[list2.length] = new Array("西安市", "延安市", "铜川市", "渭南市", "咸阳市", "宝鸡市", "汉中市", "安康市", "商洛市", "其他");
    list2[list2.length] = new Array("兰州市 ", "嘉峪关市", "金昌市", "白银市", "天水市", "武威市", "酒泉市",
      "张掖市", "庆阳市", "平凉市", "定西市", "陇南市", "临夏回族自治州", "甘南藏族自治州", "其他");
    list2[list2.length] = new Array("西宁市", "海东地区", "海北藏族自治州", "黄南藏族自治州", "玉树藏族自治州",
      "海南藏族自治州", "果洛藏族自治州", "海西蒙古族藏族自治州", "其他");
    list2[list2.length] = new Array("银川市", "石嘴山市", "吴忠市", "固原市", "中卫市", "其他");
    list2[list2.length] = new Array("乌鲁木齐市", "克拉玛依市", "喀什地区", "阿克苏地区", "和田地区", "吐鲁番地区",
      "哈密地区", "塔城地区", "阿勒泰地区", "克孜勒苏柯尔克孜自治州", "博尔塔拉蒙古自治州",
      "昌吉回族自治州伊犁哈萨克自治州", "巴音郭楞蒙古自治州", "河子市", "阿拉尔市", "五家渠市", "图木舒克市", "其他");
    list2[list2.length] = new Array("香港", "其他");
    list2[list2.length] = new Array("澳门", "其他");
    list2[list2.length] = new Array("台湾", "其他");

    var ddlProvince = document.getElementById("province");
    var ddlCity = document.getElementById("city");
    for (var i = 0; i < list1.length; i++) {
      var option = document.createElement("option");
      option.appendChild(document.createTextNode(list1[i]));
      option.value = list1[i];
      ddlProvince.appendChild(option);
      //city initialize
      var firstprovince = list2[0];
      for (var j = 0; j < firstprovince.length; j++) {
        var optioncity = document.createElement("option");
        optioncity.appendChild(document.createTextNode(firstprovince[j]));
        optioncity.value = firstprovince[j];
        ddlCity.appendChild(optioncity);
      }
    }

    function indexof(obj, value) {
      var k = 0;
      for (; k < obj.length; k++) {
        if (obj[k] == value)
          return k;
      }
      return k;
    }

    function selectprovince(obj) {
      ddlCity.options.length = 0;//clear
      var index = indexof(list1, obj.value);
      var list2element = list2[index];
      for (var i = 0; i < list2element.length; i++) {
        var option = document.createElement("option");
        option.appendChild(document.createTextNode(list2element[i]));
        option.value = list2element[i];
        ddlCity.appendChild(option);
      }
      $('select.cityList').selectpicker('refresh');
    }
  </script>



</body>
</html>