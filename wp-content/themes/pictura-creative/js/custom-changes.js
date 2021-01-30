// This goes in the header section
// Adjust banner height
// Social Media icons control

function repositionHeading(docHeight) {
    const heading = jQuery(".banner-text");
    const docWidth = jQuery(document).outerWidth();

    if (docWidth < 768)
    {
        heading.css("transform", `translateY(${docHeight - 86}px)`);
    }
    else if (docWidth >= 768 && docWidth <= 1024)
    {
        heading.css("transform", `translateY(${docHeight - 100}px)`);
    }
    else {
        heading.css("transform", `translateY(${docHeight - 175}px)`);
    }
}

function backgroundSize(banner, values) {
    // Disable this; who's going to view this on a wide screen with a squashed height??
    //const widthHeightRatio = Number((banner.outerWidth() / banner.outerHeight()).toFixed(2));

    return values; //widthHeightRatio <= 2.09 ? values : "cover";
}

// For all pages except homepage
function resizeBanner()
{
    const docWidth = jQuery(document).outerWidth();
    const bannerBox = jQuery(".banner[style*='background-image']");

    if (bannerBox.length)
    {
        const docHeight = bannerBox.outerWidth() / 2.09;

        if (docWidth < 768)
        {
            bannerBox.css("background-attachment", "scroll");
            bannerBox.css("background-position", "center top");
            bannerBox.css("background-size", backgroundSize(bannerBox, "auto 100%"));
            bannerBox.css("height", "40vh");

            repositionHeading(bannerBox.outerHeight());

            jQuery(".socialMediaSM").css("display", "block");
            jQuery(".socialMediaLG").css("display", "none");
        }
        else if (docWidth >= 768 && docWidth < 1681)
        {
            bannerBox.css("background-attachment", "fixed");
            bannerBox.css("background-position", "top left");
            bannerBox.css("background-size", backgroundSize(bannerBox, "100%"));
            bannerBox.css("height", `${docHeight}px`);

            repositionHeading(docHeight);

            jQuery(".socialMediaLG").css("display", "block");
            jQuery(".socialMediaSM").css("display", "none");
        }
        else if (docWidth >= 1680)
        {
            bannerBox.css("background-attachment", "fixed");
            bannerBox.css("background-position", "top center");
            bannerBox.css("background-size", backgroundSize(bannerBox, "1680px 800px"));
            bannerBox.css("height", "800");

            repositionHeading(docHeight);

            jQuery(".socialMediaLG").css("display", "block");
            jQuery(".socialMediaSM").css("display", "none");
        }
    }
    else {
        if (docWidth < 685)
        {
            jQuery(".socialMediaSM").css("display", "block");
            jQuery(".socialMediaLG").css("display", "none");
        }
        else if (docWidth >= 686 && docWidth < 1681)
        {
            jQuery(".socialMediaLG").css("display", "block");
            jQuery(".socialMediaSM").css("display", "none");
        }
        else if (docWidth >= 1680)
        {
            jQuery(".socialMediaLG").css("display", "block");
            jQuery(".socialMediaSM").css("display", "none");
        }
    }
}

function repositionSearchForm()
{
    if (window.innerHeight < 900 && window.innerWidth < 768)
    {
        jQuery(".site-content").css("margin-top", window.innerHeight - 38);
        jQuery(".flex-active-slide").css("height", window.innerHeight - 38);
        jQuery(".flex-active-slide").css("background-position-x", "25%");
        jQuery(".flex-active-slide").css("background-position-y", "100%");

        jQuery(".p-md.search-title").mousedown(function()
        {
            let scrollY = 0;

            const slider = window.setInterval(function()
            {
                if (scrollY < 450)
                {
                    scrollY += 10;

                    window.scrollTo(0, scrollY);
                }
                else {
                    window.clearInterval(slider);
                }
            }, 10);
        });
    }
     else {
       //jQuery(".flex-active-slide").css("height", "");
         //jQuery(".site-content").css("margin-top", "");
    }
}

function remPixels(pixelData)
{
    if (pixelData.includes("px"))
    {
        const numberOnly = pixelData.split("p");

        return Number(pixelData[0]);
    }
}

function resizeHomepageBanner()
{
    if (jQuery("img.hero-svg").length) // Homepage only - change when live
    {
        const documentWidth = jQuery(document).outerWidth();
        const searchFormTop = jQuery(".search-form.container").offset().top;

        // Resize the Multi-award SVG image
        if (documentWidth <= 500)
        {
            jQuery("img.hero-svg").attr("style", "width:250px!important");
            jQuery(".hero-container.container").css("margin-top", searchFormTop - jQuery(".hero-svg").outerHeight() - 20);
        }
        else if (documentWidth >= 501 && documentWidth <= 1024)
        {
            jQuery("img.hero-svg").attr("style", "width:350px!important");
            jQuery(".hero-container.container").css("margin-top", searchFormTop - jQuery(".hero-svg").outerHeight() - 20);
        }
        else if (documentWidth >= 1025)
        {
            jQuery("img.hero-svg").attr("style", "width:500px!important");
            jQuery(".hero-container.container").css("margin-top", searchFormTop - jQuery(".hero-svg").outerHeight() - 50);
        }
    }
    else {
       // jQuery(".flex-active-slide").css("height", "");
        //jQuery(".site-content").css("margin-top", "");
    }
}

let currentPageWidth = jQuery(window).width();

window.onload = function()
{
    resizeBanner();

    window.setTimeout(function()
    {
        if (jQuery(".home").length)
        {
            repositionSearchForm();
            resizeHomepageBanner();
            
            jQuery(".hero-container.container").css("visibility", "visible");
        }
    }, 0);

    jQuery(window).resize(function()
    {
		resizeBanner();
		if (jQuery(window).width() != currentPageWidth && jQuery(".home").length)
        {
            repositionSearchForm();
            resizeHomepageBanner();
        }
    });
};