function Group(Object, GroupKey){
  /** Set all our values */
  var collection    = { object: Object, toggle: null, editor: [], key: null };
  collection.key    = new Key(GroupKey, null);
  collection.toggle = $('.group-button', collection.object);
  /** Modify the DOM */
  $(collection.object).prop('id',collection.key.id());
  $(collection.object).attr('canvas:event:key',0);
  /** Make all the editor objects */
  $(".editor", collection.object).each(function(){
    collection.editor.push(new Editor(this, collection.key.group(), collection.editor.length));
  });
  /** Add the click event */
  $(collection.toggle).on('click', window.Canvas.click);
  /** Provide Accessor functions */
  this.object = function(){     return collection.object; };
  this.editor = function(key){  return collection.editor[key]; };
  this.id = function(){ return collection.id; };
}