var removeLastPart = function(url) {
    var lastSlashIndex = url.lastIndexOf("/");
    if (lastSlashIndex > url.indexOf("/") + 1) { // if not in http://
        return url.substr(0, lastSlashIndex); // cut it off
    } else {
        return url;
    }
}
$(function() {
    $("#calendar").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        defaultDate: window.location.href.split("/").pop(),
        onSelect: function() {
            window.location.href = removeLastPart(window.location.href) + "/" + $(this).val();
        }, });
    $("#periods").tabs();
    $(".present").on('change', function() {
        var state = $(this).is(':checked');
        var id = $(this).attr('id').substring(7, $(this).attr('id').indexOf('_'));
        var tabs = $('#periods');
        var index = tabs.tabs('option', 'active');
        var key = tabs.find('.ui-tabs-panel').eq(index).prop('id');
        var time_id = key.substring(9);
        if (!state)
        {
            $('#makeup' + id + '_' + time_id).prop('checked', false);
            $('#pass' + id + '_' + time_id).prop('checked', false);
        }
        window.location.href.split("/").pop();
        $.get('../set_present/' + id + '/' + time_id + '/' + window.location.href.split("/").pop() + '/' + state);
    })
    $(".makeup").on('change', function() {
        var state = $(this).is(':checked');
        var id = $(this).attr('id').substring(6, $(this).attr('id').indexOf('_'));
        var tabs = $('#periods');
        var index = tabs.tabs('option', 'active');
        var key = tabs.find('.ui-tabs-panel').eq(index).prop('id');
        var time_id = key.substring(9);
        if (!state)
        {
            $('#pass' + id + '_' + time_id).prop('checked', false);
        }
        $('#present' + id + '_' + time_id).prop('checked', true);
        $.get('../set_makeup/' + id + '/' + time_id + '/' + window.location.href.split("/").pop() + '/' + state);
    })
    $(".pass").on('change', function() {
        var state = $(this).is(':checked');
        var id = $(this).attr('id').substring(4, $(this).attr('id').indexOf('_'));
        var tabs = $('#periods');
        var index = tabs.tabs('option', 'active');
        var key = tabs.find('.ui-tabs-panel').eq(index).prop('id');
        var time_id = key.substring(9);
        $('#present' + id + '_' + time_id).prop('checked', true);
        $('#makeup' + id + '_' + time_id).prop('checked', true);
        $.get('../set_pass/' + id + '/' + time_id + '/' + window.location.href.split("/").pop() + '/' + state);
    })
    $(".submitAttendance").on('submit', function() {
        var id = $(this).children('input').val();
        var tabs = $('#periods');
        var index = tabs.tabs('option', 'active');
        var key = tabs.find('.ui-tabs-panel').eq(index).prop('id');
        var time_id = key.substring(9);
        $.get("../present/" + time_id + '/' + window.location.href.split("/").pop() + "/" + id, function(data) {

            if (data.length<50)
            {
                $('#present' + eval(data) + '_' + time_id).prop('checked', true);
            }else{
            $('#table-' + time_id).append(data);
            }

        }, 'html');
    });
});

