function Palette(){
  var domObject = { palette: null };
  var group     = [];
  this.initialize = function(){
    domObject.palette = $('#canvasPalletID');
    $(".group", domObject.palette).each(function(){
      var key = group.length;
      group[key] = new Group( this, key );
    });
  };
  this.clickGroup = function(event){
    var target      = event.target;
    var listElement = this.listElement(target);
    if($(listElement).hasClass('active')){
      $(listElement).removeClass('active');
    } else {
      $(listElement).addClass('active');
    }
  };
  this.clickEditor = function(event){
    var target      = event.target;
    var listElement = this.listElement(target);
    $('.editor').each(function(){
      if($(this).hasClass('active')){
        $(this).removeClass('active');
      }
    });
    $(listElement).addClass('active');
  };
  this.clickSubmit = function(event){
    var target      = event.target;
    var listElement = this.listElement(target);
    var parts       = $(listElement).prop('id');
    parts           = parts.split(':');
    var groupKey    = parts[0].split('|')[1];
    var editorKey   = parts[1].split('|')[1];
    group[groupKey].editor(editorKey).submitClick();
  };
  this.listElement = function(target){
    if($(target).prop('nodeName')==='LI'){ return target; }
    return this.listElement($(target).parent().first());
  };
}