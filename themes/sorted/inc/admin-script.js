// (function($){
//     $(document).ready(function(){
//         // Ensure submenus stay open after clicking the parent
//         $('#adminmenu li.wp-has-submenu > a').on('click', function(e) {
//             // If submenu is already open, close it
//             var $submenu = $(this).next('.wp-submenu');
//             if ($submenu.is(':visible')) {
//                 $submenu.slideUp();
//             } else {
//                 // Close all other submenus
//                 $('#adminmenu li.wp-has-submenu .wp-submenu').slideUp();
//                 $submenu.stop(true, true).slideDown();
//             }
//         });
//     });
// })(jQuery);
