function Event( parent ){
  var module      = parent;
  var controller  = module.controller;
  var eventLinks = [];
  eventLinks[0] = controller.palette.clickGroup;
  eventLinks[1] = controller.palette.clickEditor;

  this.initialize = function(){

  };

  //this.handle = function( event ){ console.log('here'); eventLinks[this.target(event)]( event ); };
  this.handle = function( event ){
    console.log('here');
  };
  this.target = function( event ){ return event.target; };
}