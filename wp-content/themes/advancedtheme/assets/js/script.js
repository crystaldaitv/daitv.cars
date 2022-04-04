jQuery(document).ready(function() {
    var $ = jQuery;
    if ($('#sidebar input#s').length) {
        $('#sidebar input#s').attr('placeholder', 'Search...');
    } else {
        $('#sidebar input[name="s"]').attr('placeholder', 'Search...');
    }

    $('.advanced-theme-menu').find('a').addClass('advanced-theme-menu-link');

    $('.show-menu-mobile i.open').on('click', function (e) {
        $('.menu-header').show();
        $('.advanced-theme-container-menu').show();
        $(this).hide();
        $('.show-menu-mobile i.close').show();

    });
    $('.show-menu-mobile i.close').on('click', function (e) {
        $('.menu-header').hide();
        $('.advanced-theme-container-menu').hide();
        $(this).hide();
        $('.show-menu-mobile i.open').show();

    });
});