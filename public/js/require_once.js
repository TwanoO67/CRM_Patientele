
//AW: loader mini
loadedScript = [];

get_file = function(url,callback){
    if(typeof loadedScript[url] == 'undefined'){
        if(url.indexOf('.css') != -1){
            $('<link/>', {
               rel: 'stylesheet',
               type: 'text/css',
               href: url
            }).appendTo('head');
            if(typeof callback == 'function')
                callback();
        }
        else{
           $.getScript( url )
            .done(function( script, textStatus ) {
                if(typeof callback == 'function')
                    callback();
            }); 
        }
        loadedScript[url] = true;
    }
}

require_once = function(url,callback){
    //si un tableau de requis
    if($.isArray(url)){
        $(url).each(function(index,element){
            if(index == url.length-1)
                get_file(element,callback);
            else
                get_file(element);
        });
    }
    else{
        //si une seul url
        get_file(url,callback);
    }
};