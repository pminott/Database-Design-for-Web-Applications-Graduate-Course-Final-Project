/*jslint browser: true*/
/*global $, jQuery, alert*/


//creates a new li element
$('.btn').click(function () {
    "use strict";
    $('<li>').text('New item').appendTo('.items');
});

//Adds text to a new li element
$('.btn').click(function () {
    "use strict";
    $('<li>').text('New item').appendTo('.items');
});
//adds to begining <creates new li element>
('.btn').click(function () {
    "use strict";
    $('<li>').text('New item').prependTo('.items');
});

function toggleFandom() {
    "use strict";
    var fandomValues = $('#fandoms').val();
    var fandomCategory = $('#fandoms').val();
    
    $(function () {
        $('div .anime').removeClass('hidden');
    });
    
}

$('selected').change(function (){
    
    
})