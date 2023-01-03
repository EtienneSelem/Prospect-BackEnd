require('./bootstrap');
require('admin-lte');

try {
    window.$ = window.jQuery = require('jquery');
    require( 'ekko-lightbox' );
    require('select2');
    require( 'filterizr' );
    require( 'datatables.net-buttons' );
    require( 'datatables.net-bs4' );
    require( 'datatables.net' );
} catch (e) {
}

var id = document.querySelector('.recup_id')
// alert(id.innerHTML)

var pros = new XMLHttpRequest();
pros.open('get', '/visualize-prospect');

pros.onreadystatechange = function(){
    if(pros.status == 200 && pros.readyState == 4){
        console.log(pros.responseText)
    }
}
pros.setRequestHeader('X-CSRF-TOKEN', document.querySelector("[name*='csrf-token']").getAttribute('content'));
pros.send('envoie = ' + id.innerHTML)
