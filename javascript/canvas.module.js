(function(){
  function Canvas(){

    this.controller = {
      palette:    new Palette(),
      action:     new Action(),
      validation: new Validation(),
      event:      new Event()
    };

    this.initialize = function(){
      var Canvas = this;
      $.each( this.controller, function(){
        if(this.hasOwnProperty('initialize')){
          this.initialize( Canvas );
        }
      });
    };

    this.click = function(event){
      window.Canvas.controller.event.handle(
        event,
        window.Canvas.controller.event
      );
    };
  };
  window.Canvas = new Canvas();
})();