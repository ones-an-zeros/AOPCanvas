function Group( obj ){
  var collection = { object: obj, editors: [] };

  this.addEditor = function( editor ){
    collection.editors[$(editor).prop('id')] = editor;
  };
  this.addEventListeners = function(){
    $(collection.object).attr('canvas:event:key', 0);
    $(collection.object).on('click', window.Canvas.click);
    $.each(collection.editors, function(){
      $(this).attr('canvas:event:key', 1);
      $(this).on('click', window.Canvas.click);
    });
  };
  
  this.object = function(){ return collection.object; };

  this.editors = function(){ return collection.editors; };
}