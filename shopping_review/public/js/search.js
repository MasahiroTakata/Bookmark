// 詳細ページが読み込まれた時に呼び出す
$(function() {
  $('#searchingBtn').click(function(){
    var keyword = $('#keywordBox').val();
    if(keyword == ""){
      alert('キーワードを入力してください。');
    }
  });
});