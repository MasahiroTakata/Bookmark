var exit_count = 0;
var elems_count = 0;

function repeat_show(elems$) {
  elems_count = elems$.length;

  elems$.eq(exit_count).show('slow', function() {
    exit_count ++;

    if(exit_count <= elems_count) {
      repeat_show(elems$); // 再度メソッドを呼び出す
     }
  });
}

// 詳細ページが読み込まれた時に呼び出す
$(function() {
  repeat_show($(".a_relatedProduct"));
});