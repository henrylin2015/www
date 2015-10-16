/**
 * @author modular
 */
(function ($) {
    dataTableCheck = function (id,clazz){
        var value = [];
        $_this = $(id+" "+clazz);
        $($_this).each(function(){
            if($(this).is(":checked")){
                value.push($(this).val());
            }
        }); 
        return value;
    };
})(jQuery); 
