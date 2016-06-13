function Event(){
  var canvas      = null;
  var controller  = null;


  this.initialize = function( Canvas ){
    canvas      = Canvas;
    controller  = canvas.controller;
  };


  this.handle = function( event, instance ){
    var target  = event.target;
    var key     = instance.eventKey(target);
    switch(parseInt(key)){
      case 0:   controller.palette.clickGroup(event);   break;
      case 1:   controller.palette.clickEditor(event);  break;
      case 2:   controller.palette.clickSubmit(event);  break;
    }
  };

  this.eventKey = function(target){
    var key = $(target).attr("canvas:event:key");
    if( key === void 0 ){
      return this.eventKey($(target).parent().first());
    }
    return key;
  };

  this.target = function(event){
    return event.target;
  };
}