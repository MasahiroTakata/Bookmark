$(function(){
  $('#searchingBtn').on('click', function(){
    var keyword = document.getElementById("keywordBox").value;
    alert(keyword);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }, // Headersを書き忘れるとエラーになる
      url: '/search',
      // url: '/search/テスト',
      type: 'GET',
      data: {'testData': keyword},
    })
    .done(function(){
      alert('成功');
    })
    .fail(function(){
      alert('失敗');
    })
  });
});