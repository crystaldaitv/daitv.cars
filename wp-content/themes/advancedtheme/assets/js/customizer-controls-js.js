(function ($) {
    $(document).ready(function () {
        var $ = jQuery;
        var $customize_footer_actions = $('#customize-footer-actions');
        var $customize_theme_controls = $('#customize-theme-controls');
        var $customize_control = $customize_theme_controls.find('li.customize-control');
        var $ag_theme_tablet = $customize_theme_controls.find('li.ag_theme_tablet');
        var $ag_theme_phone = $customize_theme_controls.find('li.ag_theme_phone');

        //click ag_select_type option style
        $customize_control.find('.ag_select_type').on('click', function () {
            var valueThis = $(this).siblings('.ag_value_option').val();
            if ($(this).hasClass('none')) {
                    $(this).siblings('.ag_theme_checked').removeClass('ag_theme_checked');
                    $(this).addClass('ag_theme_checked');
                    valueThis = '|' + $(this).data('value');
                    $(this).siblings('.ag_value_option').val(valueThis).trigger('change');
            } else if ($(this).hasClass('material-icons')) {
                if ($(this).hasClass('ag_theme_checked')) {
                    $(this).removeClass('ag_theme_checked');
                    valueThis = valueThis.replace('|' + $(this).data('value'), '');
                    $(this).siblings('.ag_value_option').val(valueThis).trigger('change');
                } else {
                    $(this).addClass('ag_theme_checked');
                    valueThis = valueThis + '|' + $(this).data('value');
                    $(this).siblings('.ag_value_option').val(valueThis).trigger('change');
                }
            } else {
                if (valueThis !== $(this).data('value')) {
                    $(this).siblings('.ag_theme_checked').removeClass('ag_theme_checked');
                    $(this).addClass('ag_theme_checked');
                    valueThis = $(this).data('value');
                    $(this).siblings('.ag_value_option').val(valueThis).trigger('change');
                }
            }
        });
    });
})(jQuery);
