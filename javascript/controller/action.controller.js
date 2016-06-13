function Action(){
  var action = [];


  this.initialize = function(){
    $('.editor-action').each(function(){
      action.push(JSON.parse($(this).text()));
    });
  };



}
