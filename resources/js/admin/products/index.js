$(function () {
    let template = $('#repeat-template');
    let appendSelector = $('#variation-form');
    let addVariation = $('#add-variations');
    let delVariation = $('.del-variation');

    addVariation.on('click', function (e) {
        let variationId = $(this).data('count');
        $(this).data('count', variationId + 1);

        appendSelector.append(
            template.html().replaceAll('__i__', variationId)
        );
    });

});
