$(document).ready(function () {

    //Initialisation du JS Material Design
    $.material.init();

    /* Initialisation du systeme de pagination
    *
    * */
    if($('#sessionTable').length) {
        $('#sessionTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingSession',
            pagingListClass: 'pagination pagination-sm'
        });
    }

    if($('#lessonTable').length) {
        $('#lessonTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingLesson',
            pagingListClass: 'pagination pagination-sm'
        });
    }

    if($('#brickTable').length) {
        $('#brickTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingBrick',
            pagingListClass: 'pagination pagination-sm'
        });
    }



});