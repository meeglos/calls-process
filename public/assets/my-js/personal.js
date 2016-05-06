/**
 * Created by miguel on 30/04/2016.
 */
$(document).ready(function () {
    $('#my-rangedate').daterangepicker({
        "ranges": {
            "Today": [
                "2016-04-30T22:08:06.276Z",
                "2016-04-30T22:08:06.276Z"
            ],
            "Yesterday": [
                "2016-04-29T22:08:06.276Z",
                "2016-04-29T22:08:06.276Z"
            ],
            "Last 7 Days": [
                "2016-04-24T22:08:06.276Z",
                "2016-04-30T22:08:06.276Z"
            ],
            "Last 30 Days": [
                "2016-04-01T22:08:06.276Z",
                "2016-04-30T22:08:06.276Z"
            ],
            "This Month": [
                "2016-04-30T22:00:00.000Z",
                "2016-05-31T21:59:59.999Z"
            ],
            "Last Month": [
                "2016-03-31T22:00:00.000Z",
                "2016-04-30T21:59:59.999Z"
            ]
        },
        "linkedCalendars": false,
        "startDate": "04/25/2016",
        "endDate": "05/01/2016",
        "opens": "center"
    }, function(start, end, label) {
        console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
    });
});