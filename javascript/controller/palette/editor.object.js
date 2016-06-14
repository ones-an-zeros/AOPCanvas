function Editor(Object, GroupKey, EditorKey){
  var collection  = { key: null };
  var document    = { container: null, toggle: null, form: null, part: [], submit: null };
  /** Set all our values */
  collection.key  =  new Key(GroupKey, EditorKey);
  document.container  = Object;
  document.toggle     = $('.editor-button', document.container).first();
  document.form       = $('.form', document.container).first();
  document.submit     = $('.submit', document.container).first();
  /** Modify the DOM */
  $(document.container).prop('id', collection.key.id());
  $(document.container).attr('canvas:event:key',1);
  $(document.submit).attr('canvas:event:key',2);
  /** Add the parts */
  $('.editor-part', document.form).each(function(){
    document.part.push(new Part(this));
  });
  /** Add the click event */
  $(document.toggle).on('click', window.Canvas.click);
  $(document.submit).on('click', window.Canvas.click);
  /** Add the public interfaces */
  this.submitClick = function(){
    var parts   = document.part;
    passed = true;
    for( var index = 0; index < parts.length; index++ ){
      var part = parts[index];
      var result = part.doTest();
      if(!result.outcome){ passed = false; }
    }
    if(passed){
      for( var index = 0; index < parts.length; index++ ) {
        var part = parts[index];
        part.doAction();

      }
    }
  }
}