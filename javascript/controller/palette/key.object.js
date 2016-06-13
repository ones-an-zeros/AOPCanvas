function Key( GroupKey, EditorKey ){
  var collection = { group: null, editor: null, id: "" };
  collection.group  = GroupKey === void 0 ? null : GroupKey;
  collection.editor = EditorKey === void 0 ? null : EditorKey;
  if(collection.group != null){ collection.id += "G|"+collection.group; }
  if(collection.editor != null){ collection.id += ":E|"+collection.editor; }
  this.id     = function(){ return collection.id; };
  this.group  = function(){ return collection.group; };
  this.editor = function(){ return collection.editor; };
}