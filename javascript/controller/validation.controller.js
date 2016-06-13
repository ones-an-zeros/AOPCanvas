function Validation(){
  var test = [];
  
  this.initialize = function(){
    $('.editor-test').each(function(){
      test.push(JSON.parse($(this).text()));
    });
  };

}