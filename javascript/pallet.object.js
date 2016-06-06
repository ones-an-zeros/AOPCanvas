var CanvasPallet = {
  palletID:       null,
  groupSelector:  null,
  editorSelector: null,

  initialize: function(){
    this.palletID       = "canvasPalletID";
    this.groupSelector  = "group";
    this.groupSelector  = this.groupSelector+" .editor";
    this.appendEvents();
  },

  markAllInactive: function( target ){
    var targetString = 'group-button';
    if( $( target ).prop('class') == 'editor-button' ){
      targetString = 'editor-button';
    }
    $( '#canvasPalletID .group .'+targetString ).each( function(){
      var element = $( this ).closest( 'LI' );
      $( element ).removeClass( 'active' );
    } );
    if( targetString == 'group-button' ){
      $( '#canvasPalletID .group .editor-button' ).each( function(){
        var element = $( this ).closest( 'LI' );
        $( element ).removeClass( 'active' );
      } );
    }
  },

  markActive: function( element ){
    if( $(element).prop('tagName') !== 'LI' ){
      element = $( element ).closest( 'LI' );
    }
    $( element ).addClass( 'active' );
  },

  appendEvents: function(){
    $( '#canvasPalletID .group .group-button' ).on( 'click', CanvasPallet.onClick );
    $( '#canvasPalletID .group .editor-button' ).on( 'click', CanvasPallet.onClick );
  },

  onClick: function( event ){
    var target = event.target;
    CanvasPallet.markAllInactive( target );
    CanvasPallet.markActive( target );
  }
};