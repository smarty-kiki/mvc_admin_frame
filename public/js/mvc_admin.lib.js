// form 添加 ajax=true 后让 form 变为异步
// 如果 form 内有 input name=refer_url 则提交成功后跳转该地址
// 如果失败，则会在页面寻找 class=error 的元素写入报错信息
$("form[ajax=true]").on('submit', function () {
  var $this = $(this);
  var $error = $('.error');
  var action = $this.attr('action');
  var method = $this.attr('method');
  var data = {};
  var refer_url = $this.find('input[name=refer_url]').val();

  $this.find('input, select').each(function (i, item) {
    var $item = $(item);
    var name = $item.attr('name');
    var type = $item.attr('type');

    if (name) {
      if (type === 'checkbox') {
        data[name] = $item.is(':checked');
      } else {
        data[name] = $item.val();
      }
    }
  });

  $.ajax({
    type: method,
    url: action,
    data: data,
    dataType: 'json',
    timeout: 500,
    success: function (res) {
      if (res.code === 0) {
        if (refer_url) {
          window.location.href = refer_url;
        }
      } else {
        $error.html(res.msg);
      }
    }
  });

  return false;
});

// 点击 class=tr-select-all 的 checkbox 则将同一个 tr 下的 class=tr-select-all-children 的 checkbox 选中
// 反之亦然，另，tr-select-all-children 也会联动 tr-select-all
$('.tr-select-all').on('click', function (e) {
  var $this = $(this);
  $this.parents('tr').find('input[type=checkbox].tr-select-all-children').prop('checked', $this.is(':checked'));
  e.stopPropagation();
});
$('.tr-select-all-children').on('click', function (e) {
  var $this = $(this);
  if ($this.is(':checked')) {
    if ($this.parents('tr').find('input[type=checkbox].tr-select-all-children:not(:checked)').length === 0) {
      $this.parents('tr').find('input[type=checkbox].tr-select-all').prop('checked', true);
    }
  } else {
    $this.parents('tr').find('input[type=checkbox].tr-select-all').prop('checked', false);
  }
});
// 初始化 select-all 的选中状态
$('.tr-select-all').each(function (i, item) {
  var $item = $(item);
  var parent_tr = $(item).parents('tr');
  if (parent_tr.find('input[type=checkbox].tr-select-all-children').length === parent_tr.find('input[type=checkbox].tr-select-all-children:checked').length) {
    $item.prop('checked', true);
  }
});
