jQuery(document).ready(function($){

    var strNewString = $('#secondary').html().replace('An error has occurred, which probably means the feed is down. Try again later.','<em>No new updates at this time.</em>');
    $('#secondary').html(strNewString);

});