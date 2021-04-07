(function ($) {
    $(document).ready(function(){
        $('#Form_ContactForm_action_doSubmitForm').on('click', function(){
            $(this).attr("disabled", true);
            $(this).val('Submitting...');
            $('#Form_ContactForm').submit();
        });
    });
})(jQuery);