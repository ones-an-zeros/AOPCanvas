(function(){
  function Canvas(){

    this.controller = { palette: null, action: null, validation: null, event: null };

    var PalletController      = this.controller.palette;
    var ActionController      = this.controller.action;
    var ValidationController  = this.controller.validation;
    var EventController       = this.controller.event;

    this.initialize = function(){
      this.controller.palette     = new Palette( this );
      this.controller.action      = new Action( this );
      this.controller.validation  = new Validation( this );
      this.controller.event       = new Event( this );
      $.each( this.controller, function(){
        if(this.hasOwnProperty('initialize')){
          this.initialize();
        }
      });
    };




    this.click = function(event){
      console.log(EventController);
    };
  };


  window.Canvas = new Canvas();
})();