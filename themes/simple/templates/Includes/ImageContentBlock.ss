<div class="primary-content py-5 text-center d-flex align-items-center container content-blocks">

<% loop $ImageContentBlocks %>
    <div class="container-fluid">
        <div class="row<% if $FullWidth %> no-gutter<% end_if %><% if $ReverseImage %> row-reverse<% end_if %>">
            <div class="flex-col text-left col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 content">
                <h4>$Title</h4>
                <% if $BoldCaption %><h2 class="bold-caption">$BoldCaption</h2><% end_if %>
                <% if $CaptionHighlight %><h2 class="bold-caption-hi">$CaptionHighlight</h2><% end_if %>
                <p>
                    $Content
                </p>
            </div>
            <div class="flex-col text-left col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 image">
                <% if $ContainerImage %>
                    <img src=$ContainerImage.URL />
                <% end_if %>
            </div>
        </div>
    </div>
<% end_loop %>

</div>
