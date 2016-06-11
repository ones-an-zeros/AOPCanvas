function Event(){
  var canvas      = null;
  var controller  = null;


  this.initialize = function( Canvas ){
    canvas      = Canvas;
    controller  = canvas.controller;
  };

  //this.handle = function( event ){ console.log('here'); eventLinks[this.target(event)]( event ); };
  this.handle = function( event, instance ){
    console.log('here');
    var target  = event.target;
    var key     = instance.eventKey(target);
    console.log(key);
    switch(key){
      case 0:   controller.palette.clickGroup(event);   break;
      case 1:   controller.palette.clickEditor(event);  break;
    }
  };
  this.eventKey = function(target){

    // TODO: FIX ERROR HERE CAUSED BY ODD Z INDEXING EFFECTS

    console.log($(target).parent().first());

    return $(target).parent().attr("canvas:event:key");
  }
  this.target = function(event){
    console.log(event);
    if( event === void 0) {
      console.log(event);
    }
    return event.target;
  }
}