$(document).ready(function () {
    $('#existing_school').hide();
    $('#students_numbers').hide();
    $("#conversion_franchise").click(function () {
        $("#existing_school").show();
        $("#students_numbers").show();
    })
    $(".single_franchise").click(function () {
        $("#existing_school").hide();
        $("#students_numbers").hide();
    })
    $(".country_franchise").click(function () {
        $("#existing_school").hide();
        $("#students_numbers").hide();
    })
});






setCarouselHeight('#carousel-example');

function setCarouselHeight(id)
{
    var slideHeight = [];
    $(id+' .item').each(function()
    {
        // add all slide heights to an array
        slideHeight.push($(this).height());
    });

    // find the tallest item
    max = Math.max.apply(null, slideHeight);

    // set the slide's height
    $(id+' .carousel-content').each(function()
    {
        $(this).css('height',max+'px');
    });
}