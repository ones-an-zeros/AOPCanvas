function Palette( configuration ){

  var domObject = { palette: null };

  var group = [];

  this.initialize = function(){
    domObject.palette = $('#canvasPalletID');
    $(".group", domObject.palette).each(function(){
      var id = $(this).prop('id');
      group[id] = new Group( this );
      $(".editor", group[id].object() ).each( group[id].addEditor );
      group[id].addEventListeners();
    });
  };
  this.clickGroup = function( event ){
    console.log('group click');

  };
  this.clickEditor = function( event ){
    console.log('editor click');

  };
}