var CanvasEditor = {


    initialize: function(){
        console.log('Canvas Editor Initialize');
        this.addEvents();
    },


    addEvents: function(){
        console.log('Canvas Editor Add Events');
        $('#canvasPalletID .editor .form .submit').on( 'click', CanvasEditor.editorSubmit );
    },









    editorSubmit: function( event ){
        console.log('Canvas Editor Editor Submit');
        var button      = event.target;
        var form        = $(button).parent();
        var actions     = new Array();
        $(".action-data", form).each(function(){


            var input   = $(this).children().last();
            var use     = false;

            $.each(this.attributes, function(){

                var parts   = this.name.split(':');

                if(parts[0] === 'canvas'){
                    actions[parts[2]] = this.value;
                }
            });


            if(Object.keys(actions).length){
                actions['value'] = 'something';
            }


        });

        CanvasEditor.change(actions);
    },


    change: function( action ){
        switch(action['type']){
            case 0:     this.changeText(action['target'], action['value']);                                     break;
            case 1:     this.changeStyle(action['target'], action['attribute'], action['value']);               break;
        }
    },

    changeStyle: function( target, style, value ){
        var target = $('#'+target);
        $(target).css(style, value);
    },

    changeText: function( target, value ){
        var target = $('#'+target);
        $(target).text(value);
    }
};