/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $(".image").click(function(){
        var image = $(this).attr("rel");
        $('#image').hide();
        $('#image').fadeIn('slow');
        $('#image').html('<img src="' + image + '"/>');
        return false;
    });
    $('#')
});

/*function slideShow(){
    var $active = $('#gallery img.active');
    if ($active.length == 0) $active = $('#gallery img:last');
    
    var $next = $active.next().length ? $active.next()
        : $('#gallery img:first');
        
    $active.addClass('last-active');
    
    $next.css({opacity:0.0})
            .addClass('active')
            .animate({opacity:1.0},1000, function(){
               $active.removeClass('active last-active'); 
            });
}

$document.ready(function(){
    setInterval("slideShow()",1000);
});*/

