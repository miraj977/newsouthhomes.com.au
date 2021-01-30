// custom onload events
// This goes in the header section
// Adjust banner height
// Social Media icons control

function repositionHeading(docHeight)
{
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

function backgroundSize(banner, values)
{
    const widthHeightRatio = Number((banner.outerWidth() / banner.outerHeight()).toFixed(2));

    return values; //widthHeightRatio <= 2.09 ? values : "cover"; // Disable this; who's going to view this on a wide screen with a squashed height??
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
        jQuery(".site-content").css("margin-top", window.innerHeight - 48);

        jQuery(".flex-active-slide").css("height", window.innerHeight - 48);
        jQuery(".flex-active-slide").css("background-position", "25% 100%");

//         jQuery(".p-md.search-title").mousedown(function()
//         {
//             let scrollY = 0;

//             const slider = window.setInterval(function()
//             {
//                 if (scrollY < 450)
//                 {
//                     scrollY += 10;

//                     window.scrollTo(0, scrollY);
//                 }
//                 else {
//                     window.clearInterval(slider);
//                 }
//             }, 10);
//         });
    }
    else {
        jQuery(".flex-active-slide").css("height", "");
        jQuery(".site-content").css("margin-top", "");
    }
}

function resizeHomepageBanner()
{
    if (jQuery("body.page-id-7").length) // Homepage only
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
}

// Strips pixels out away from numbers (300px => 300)
function remPixels(pixelData)
{
    if (
        pixelData &&
        pixelData.includes("px") &&
        pixelData.indexOf("p") > 0
    )
    {
        const numberOnly = pixelData.split("p");

        return Number(numberOnly[0]);
    }
}

// House Facade images - resize proportionately
function resizeGalleryImages()
{
    if (
        jQuery(".image-list").length &&
        jQuery(window).innerWidth() <= 685
    )
    {
        let totalImagesWidth = 0;

        jQuery(".product-gallery").css("width", `${jQuery(window).innerWidth() - 40}px`);
        jQuery(".image-item").css("width", "auto");
        jQuery(".image-item").css("height", "300px");
        jQuery(".image-item > img").css("width", "auto");
        jQuery(".image-item > img").css("height", "300px");

        jQuery(".image-item").each(() =>
        {
            totalImagesWidth += Number(jQuery(this).width());
        });

        jQuery(".image-list").css("width", `${totalImagesWidth / 1.5}px`);
    }
    else {
        jQuery(".product-gallery").css("width", "inherit");
        jQuery(".image-item").css("width", "inherit");
        jQuery(".image-list").css("width", "inherit");
        jQuery(".image-item > img").css("width", "inherit");
        jQuery(".image-item > img").css("height", "inherit");
    }
}

// Resize the iframes accordingly
function resizeIframes()
{
    if (jQuery("iframe[src*='youtube']").length || jQuery("iframe[src*='matterport']").length)
    {
        jQuery("iframe").css("height", `${jQuery("iframe").width() / 1.75}px`);
    }
}

// Apply proper padding to top paragraph (below banner) on Home Designs page
function applyProperPadding()
{
    if (jQuery(".flex.showhide-div").length)
    {
        // Align the padding of the element to match that of properly aligned element
        jQuery(".contain-container > .row.contain > div").css("padding-left", `${Math.max(remPixels(jQuery(".project-list").css("padding-left")), 10)}px`);
        jQuery(".contain-container > .row.contain > div").css("padding-right", `${Math.max(remPixels(jQuery(".project-list").css("padding-left")), 10)}px`);
    }
}

jQuery(document).ready(function()
{
    window.resizeBanner();

    window.setTimeout(function()
    {
        // Homepage only
        if (jQuery("body.page-id-7").length)
        {
            window.repositionSearchForm();

            window.resizeHomepageBanner();
        }

        // Apply proper padding to top paragraph (below banner) on Home Designs page
        window.applyProperPadding();

        // Resize the iframes accordingly
        window.resizeIframes();

        // House Facade images - resize proportionately
        window.resizeGalleryImages();
    }, 10);

    jQuery(window).resize(function()
    {
        window.resizeBanner();

        // Homepage only
        if (jQuery(".page-id-7").length)
        {
            window.repositionSearchForm();

            window.resizeHomepageBanner();
        }

        // Apply proper padding to top paragraph (below banner) on Home Designs page
        window.applyProperPadding();

        // Resize the iframes accordingly
        window.resizeIframes();

        // House Facade images - resize proportionately
        window.resizeGalleryImages();
    });
});