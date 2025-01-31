jQuery(document).ready(function ($) {
    $(".acf-field-group").hide(); // Hide all ACF groups initially
    $(".acf-field-group:first").show(); // Show first group

    // Add tabs dynamically
    let tabs = $("<ul class='acf-tab-menu'></ul>");
    $(".acf-field-group").each(function (index) {
        let groupTitle = $(this).find(".acf-label label").first().text();
        let tabID = "tab-" + index;
        $(this).attr("id", tabID);
        
        tabs.append(`<li class="acf-tab-link" data-tab="${tabID}">${groupTitle}</li>`);
    });

    $(".acf-field-group").first().before(tabs);
    $(".acf-tab-link:first").addClass("active");

    $(".acf-tab-link").click(function () {
        let tabID = $(this).data("tab");

        $(".acf-tab-link").removeClass("active");
        $(this).addClass("active");

        $(".acf-field-group").hide();
        $("#" + tabID).show();
    });
});
