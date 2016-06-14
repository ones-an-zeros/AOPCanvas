function Part(Object){
  var part    = Object;
  var input   = $('.part-input', part).first();
  var error   = $('.part-error', part).first();
  var action  = JSON.parse($('.editor-action', part).text());
  var test    = JSON.parse($('.editor-test', part).text());

  this.doAction = function(){
    var target = this.actionTarget();
    var value = $(input).val();
    console.log(action);
    this.actionRouter( action.type, target, action.attribute, value);
  };

  this.actionTarget = function(){
    return $(document.getElementById(action.target));
  };

  this.actionRouter = function(type, target, attribute, value){
    switch(parseInt(type)){
      case 0:     this.text(target, value);                   break;
      case 1:     this.style(target, attribute, value);       break;
      case 2:     this.keyText(target, value);                break;
      case 3:     this.keyStyle(target, attribute, value);    break;
    }
  };

  this.text =  function(target, value){ $(target).text(value); };
  this.style = function(target, attribute, value){ $(target).css(attribute, value); };
  this.keyText = function(target, value){
    value = action.data[value];
    $(target).css(attribute, value);
  };
  this.keyStyle = function(target, attribute, value){
    value = action.data[value];
    $(target).css(attribute, value);
  };

  this.doTest = function(){
    var value         = $(input).val();
    var tests         = test.value;
    var message       = test.message;
    var result        = {outcome: true, message: []};
    for(var key in tests){
      if(!this.testRouter(key, tests[key], value)){
        result.outcome = false;
        result.message[key] = message[key];
      }
    }
    if(!result.outcome){
      var list = $('ul', error).first();
      for(key in result.message){
        var message = result.message[key];
        if(message.search("%s")){
          result.message[key] = message.replace("%s", tests[key]);
        }
        $(list).append("<li>"+result.message[key]+"</li>");
      }
      $(error).css('display', 'block');
      $(error).css('visibility', 'visible');
    }
    return result;
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