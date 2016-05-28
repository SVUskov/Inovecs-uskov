// General object
var App = {
    Config: {
        url: "application/search.php",
        searchForm: '#search-form',
        action: 'make_call',
        module: '#module',
        command: '#command',
        filter: '#filter',
        filterValue: '#filter-value',
        sendButton: '.send-request',
        resultsBlock: '.results'
    },
    Search: {}
};

// Performs AJAX request to get data
App.Search.getData = function () {

    var data = {
        action: app.Config.action,
        module: $(app.Config.module).val(),
        command: $(app.Config.command).val(),
        filter: $(app.Config.filter).val(),
        filtervalue: $(app.Config.filterValue).val()
    };

    $.ajax({
        url: app.Config.url,
        crossDomain: true,
        async: false,
        type: "POST",
        data: data,
        success: function (data) {
            $(app.Config.resultsBlock).html(data);
        },
        error: function (xhr, status, error) {
            $(app.Config.resultsBlock).html(status + '; ' + error);
        }
    });
};

// Change "Filter value" attributes after "Filter by" change
App.Search.selectFilter = function (filter) {
    if (filter === 'email') {
        $(app.Config.filterValue).attr('type', 'email').attr('placeholder', 'enter email address');
    } else {
        $(app.Config.filterValue).attr('type', 'number').attr('placeholder', 'enter ID number');
    }
    $(app.Config.filterValue).val('').focus();
};

var app = App;

$(document).ready(function () {

    // "Enter" press handler
    $(app.Config.filterValue).keyup(function (event) {
        if (event.keyCode == 13) {
            app.Search.getData();
        }
    });

    // "Search" button handler
    $(app.Config.sendButton).on('click', function () {
        app.Search.getData();
    });

    // "Filter by" change handler
    $(app.Config.filter).on('change', function () {
        app.Search.selectFilter($(this).val());
    });
});