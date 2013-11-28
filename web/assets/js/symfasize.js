var $collectionHolder;

// setup an "add a bundle" link
var $addBundleLink = $('<a href="#" class="btn btn-default">Add a Bundle</a>');
var $newLinkLi = $('<li class="clearfix add-button"></li>').append($addBundleLink);

jQuery(document).ready(function () {
    // Get the ul that holds the collection of bundles
    $collectionHolder = $('ul.bundles');

    // add the "add a Bundle" anchor and li to the bundles ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addBundleLink.on('click', function (e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new bundle form (see next code block)
        addBundleForm($collectionHolder, $newLinkLi);
    });

    initializeButtons();

    $('.popover-me').popover();
});

function addBundleForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a Bundle" link li
    var $newFormLi = $('<li class="clearfix"></li>').append(newForm);
    $newLinkLi.before($newFormLi);

    initializeButtons();
}

function initializeButtons() {
    $('ul.bundles a.delete').each(function () {
        $(this).click(function (event) {
            $(this).closest('li').remove();
            event.preventDefault();
        });
    });
}
