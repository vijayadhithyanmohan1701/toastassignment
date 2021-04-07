<% with $SiteConfig %>
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="container1">
                    <h4 class="slider-h4">$SliderTitle</h4>
                    <h2 class="slider-h2 bold-caption">$SliderBoldCaption</h2>
                    <h2 class="slider-h2-hi bold-caption-hi">$SliderCaptionHighlight</h2>
                    <a href="/toast/#" class="action-slider">$SliderActionText</a>
                </div>
                <div class="container2">
                    <% if $SliderImageB %>
                        <img src="$SliderImageB.URL" />
                    <% end_if %>
                </div>
                <div class="container3">
                    <% if $SliderImageA %>
                        <img src="$SliderImageA.URL" />
                    <% end_if %>
                </div>
            </div>
        </div>
    </section>
<% end_with %>