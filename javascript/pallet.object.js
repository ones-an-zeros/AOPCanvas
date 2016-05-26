var CanvasPallet = {
  palletID: "canvasPalletID",
  palletObject: null,

  initialize: function(){
    this.palletObject = $("#"+this.palletID)[0];
    console.log( $(this.palletObject).html() );
  },
  onClick: function(){

  },
  appendEvents: function(){

  }
};