var CanvasPallet = {
  palletID:         null,
  groupSelector:    null,
  editorSelector:   null,
  /** Editor / Group selectors */
  group:            'group',
  editor:           'editor',
  /** Icon Classes */
  minusIcon:        'fa fa-minus-square',
  plusIcon:         'fa fa-plus-square',
  initialize: function(){
    this.palletID       = "canvasPalletID";
    this.groupSelector  = "group";
    this.groupSelector  = this.groupSelector+" .editor";
    this.appendEvents();
  },
  appendEvents: function(){
    $( '#canvasPalletID .group .group-button' ).on( 'click', CanvasPallet.onClick );
    $( '#canvasPalletID .group .editor-button' ).on( 'click', CanvasPallet.onClick );
  },
  /** Click Events */
  onClick: function( event ){
    var target      = event.target;
    var listElement = CanvasPallet.getNearestList(target);
    if( CanvasPallet.isGroup( listElement ) ){
      return CanvasPallet.groupClick( listElement );
    }
    if( CanvasPallet.isEditor( listElement ) ){
      return CanvasPallet.editorClick( listElement );
    }
    return false;
  },
  groupClick: function( listElement ){
    if( CanvasPallet.isActive( listElement ) ){
      return true;
    }
    this.closeActiveGroups();
    this.openGroup( listElement );
  },
  editorClick: function( listElement ){
    if( CanvasPallet.isActive( listElement ) ){
      return true;
    }
    this.closeActiveEditors();
    this.openEditor( listElement );
  },
  /** Mark Elements */
  openGroup: function( listElement ){
    this.markActive( listElement );
  },
  openEditor: function( listElement ){
    this.markActive( listElement );
  },
  /** Close */
  closeActiveGroups: function(){
    var palletElement = $( '#'+this.palletID );
    $( '.group', palletElement ).each(function(){
      if(CanvasPallet.isActive(this)){
        CanvasPallet.markInActive(this);
      }
    });
  },
  closeActiveEditors: function(){
    var palletElement = $( '#'+this.palletID );
    $( '.editor', palletElement ).each( function(){
      if( CanvasPallet.isActive(this) ){ CanvasPallet.markInActive( this ); }
    });
  },
  /** Markers */
  markActive: function( listElement ){
    var iconElement = $( 'i:first', $( 'span:first', listElement ) );
    $( listElement ).addClass( 'active' );
    $( iconElement ).removeClass( this.plusIcon );
    $( iconElement ).addClass( this.minusIcon);
  },
  markInActive: function( listElement ){
    var iconElement = $('i:first',$( 'span:first',listElement));
    $(listElement).removeClass( 'active' );
    $(iconElement).removeClass(CanvasPallet.minusIcon);
    $(iconElement).addClass(CanvasPallet.plusIcon);
  },
  /** Tests */
  isGroup: function( element ){
    return $(element).hasClass(this.group);
  },
  isEditor: function( element ){
    return $(element).hasClass(this.editor);
  },
  isActive: function( element ){
    return $(element).hasClass('active');
  },
  /** Getters */
  getNearestList: function( element ){
    if( $(element).prop('tagName') !== 'LI' ){
      return $( element ).closest( 'LI' );
    }
    return element;
  }
};