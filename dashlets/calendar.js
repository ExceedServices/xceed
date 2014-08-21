$(document).ready(function () {
    $("#calendar-month-view").load('/ajax/calendar-month.php?');
    $('body').click(function (event) {
        if ($(event.target).is("#edit-appointment")) {
            var id = $("#calendar-details-div").attr("data-key");
            $("#calendar-agenda-view").slideUp();
            $("#calendar-agenda-view").load('ajax/edit-calendar-details.php?id=' + id, function () {
                $("#calendar-agenda-view").slideDown();
                $("#calendar-month-view").slideUp();
            });
        }

        if ($(event.target).is('#calendar-new')) {
            $('#new-calendar-item').load('ajax/new-appointment-item.php');
            $('#new-calendar-item').slideDown();
            $('#color1').colorPicker();
        }

        if ($(event.target).is('#delete-appointment')) {
            $('#calendar-month-view').slideUp();
            $('#calendar-month-view').load('ajax/calendar-month.php', function () {
                $('#calendar-agenda-view').slideUp();
                $('#calendar-month-view').slideDown();
            });
        }

        if ($(event.target).is('#cancel-calendar-button')) {
            $('#new-calendar-item').slideUp();
            $('#calendar-month-view').slideDown();
        }

        if ($(event.target).is('#calendar-show-agenda')) {
            $('#calendar-agenda-view').slideUp();

            $('#calendar-agenda-view').load('ajax/calendar-agenda-view.php', function () {
                $('#calendar-agenda-view').slideDown();
                $('#calendar-month-view').slideUp();
            });
        }

        if ($(event.target).is(".calendar-agenda-item > *") || $(event.target).is(".calendar-agenda-item") || $(event.target).is(".cal-item")) {
            $("#calendar-agenda-view").slideUp();

            var id;
            if ($(event.target).is(".calendar-agenda-item"))
                id = $(event.target).attr("data-appointment-id");
            else if ($(event.target).is(".calendar-agenda-item > *"))
                id = $(event.target).parent(".calendar-agenda-item").attr("data-appointment-id");
            else if ($(event.target).is(".cal-item"))
                id = $(event.target).attr("data-detail-key");

            $("#calendar-agenda-view").load('ajax/calendar-appointment-details.php?id=' + id, function () {
                $("#calendar-agenda-view").slideDown();
                $("#calendar-month-view").slideUp();
            });
        }
        if ($(event.target).is(".cal-nav-item")) {
            //$('#calendar-month-view').slideUp();
            var nav;
            nav = $(event.target).attr("nav-key");
            $("#calendar-show-boxes").attr("nav-key", nav);
            $("#calendar-month-view").load('ajax/calendar-month.php?' + nav, function () {
                $("#calendar-agenda-view").slideUp();
                $('#calendar-month-view').slideDown();
            });
        }
    });
});
