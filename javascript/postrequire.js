$(document).ready(function() {
    $.each($(".forumpost:not('.firstpost')"), function() {
        $(this).remove();
    });
});
