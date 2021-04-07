<div class="col-sm-12">
    <% include ImageContentBlock %>
    <div class="contact-form primary-content py-5 text-center d-flex align-items-center container content-blocks" id="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="flex-col text-left col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 content">
                    <h2 class="bold-caption">get in touch to</h2>
                    <h2 class="bold-caption-hi">upgrade</h2>
                </div>
                <div class="flex-col text-left col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form">
                    <% if $SessionSuccess %>
                            <div class="message-$SessionSuccess.Status">
                            $SessionSuccess.Message
                            </div>
                    <% end_if %>
                    $ContactForm
                </div>
            </div>
        </div>
    </div>
</div>