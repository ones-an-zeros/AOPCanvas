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
    var passed  = true;
    for( var index = 0; index < parts.length; index++ ){
      var part = parts[index];
      var result = part.test();
      if(!result){ passed = false; }
    }
    if(passed){
      console.log('do the actions');
    } else {
      console.log('failure somewhere');
    }
  }
}

function Part(Object){
  var part    = Object;
  var input   = $('.part-input', part).first();
  var action  = JSON.parse($('.editor-action', part).text());
  var test    = JSON.parse($('.editor-test', part).text());


  this.test = function(){
    var value     = $(input).val();
    var tests     = test.value;
    var messages  = test.message;
    var passed    = true;
    var failKeys  = [];
    for(var key in tests){
      if(!this.testRouter(key, tests[key], value)){
        passed = false;
        failKeys.push(key);
      }
    }
    return passed;
  };

  this.testRouter = function(testKey, testValue, inputValue){
    switch(testKey){
      case 'minLength': return this.minLength(testValue, inputValue); break;
      case 'maxLength': return this.maxLength(testValue, inputValue); break;
    }
  };

  this.minLength = function(testValue, inputValue){
    return inputValue.length >= testValue;
  };
  this.maxLength = function(testValue, inputValue){
    return inputValue.length <= testValue;
  };
}