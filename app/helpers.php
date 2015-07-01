<?php

/*
    Enregistrement des macro et helpers
*/

//date html5
/*Form::macro('date', function($name, $value = null, $options = array()) {
    $input =  '<input type="date" name="' . $name . '" value="' . $value . '"';

    foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
    }

    $input .= '>';

    return $input;
});*/

Form::macro('date', function($name, $value = null, $options = array()) {
    $input =  '<input type="text" id="'.$name.'" name="' . $name . '" value="' . $value . '"';

    foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
    }

    $input .= '>
    <script>
    require_once([
        "/css/jquery.datetimepicker.css",
        "/js/jquery.datetimepicker.js"
    ], 
        function(){
            $( "#'.$name.'" ).datetimepicker({
                lang:"fr",
                i18n:{
                    fr:{
                        months:[
                            "Janvier","Février","Mars","Avril",
                            "Mai","Juin","Juillet","Aout",
                            "Septembre","Octobre","Novembre","Décembre"
                        ],
                        dayOfWeek:[
                            "Dim", "Lu", "Ma", "Mer", 
                            "Jeu", "Ven", "Sam",
                        ]
                    }
                },
                timepicker:false,
                format:"Y/m/d"
            });
        }
    );
    </script>';

    return $input;
});


Form::macro('ckedit', function($name, $value = null, $options = array()) {
    $input =  '<textarea name="' . $name . '" id="'.$name.'"';

    foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
    }

    $input .= '>'.$value.'</textarea>
    
    <script>
    require_once("http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js",function() 
    {
        CKEDITOR.replace( "'.$name.'" );
    
    });</script>';

    return $input;
});

Form::macro('datetime', function($name, $value = null, $options = array()) {
    $input =  '<input type="text" id="'.$name.'" name="' . $name . '" value="' . $value . '"';

    foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
    }

    $input .= '>
    <script>
    require_once([
        "/css/jquery.datetimepicker.css",
        "/js/jquery.datetimepicker.js"
    ], 
        function(){
            $( "#'.$name.'" ).datetimepicker({
                lang:"fr",
                i18n:{
                    fr:{
                        months:[
                            "Janvier","Février","Mars","Avril",
                            "Mai","Juin","Juillet","Aout",
                            "Septembre","Octobre","Novembre","Décembre"
                        ],
                        dayOfWeek:[
                            "Dim", "Lu", "Ma", "Mer", 
                            "Jeu", "Ven", "Sam",
                        ]
                    }
                },
                timepicker:true,
                //format:"d.m.Y"
            });
        }
    );
    </script>';

    return $input;
});

?>
