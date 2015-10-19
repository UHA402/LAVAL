$(document).ready(function () {

    //Initialisation du JS Material Design
    $.material.init();

    /* Initialisation du systeme de pagination
     *
     * */
    if ($('#sessionTable').length) {
        $('#sessionTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingSession',
            pagingListClass: 'pagination pagination-sm'
        });
    }

    if ($('#lessonTable').length) {
        $('#lessonTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingLesson',
            pagingListClass: 'pagination pagination-sm'
        });
    }

    if ($('#brickTable').length) {
        $('#brickTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingBrick',
            pagingListClass: 'pagination pagination-sm'
        });
    }

    //Formulaire dynamique pour la création d'une brique
    var htmlType1 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[media]" name="brick[media]" type="text" readonly=""class="form-control floating-label"placeholder="Upload File..."> <input type="file" id="inputFile"></div></div>';
    var htmlType2 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[media]" name="brick[media]" type="text"placeholder="Text to speech"class="form-control input-md"></div></div>';
    var htmlType3 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[media]" name="brick[media]" type="text"placeholder="Text 1, Text 2, Text 3, Text 4"class="form-control input-md"></div></div>';
    var htmlType4 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[media]" name="brick[media]" type="text" readonly=""class="form-control floating-label"placeholder="Upload 4 Files..."> <input type="file" id="inputFile" multiple=""></div></div>';
    var htmlType5 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[media]" name="brick[media]" type="text"placeholder="Text to record"class="form-control input-md"></div></div>';


    $('#brickTypeSelector').on('change', function () {
        var value = $(this).val();
        console.log(value);
        //si c'est un stimuli auditif
        if(value == 1) {
            $('#dynamicForm').html(htmlType1);
        } else if(value == 2) {
            $('#dynamicForm').html(htmlType2);
        } else if(value == 3) {
            $('#dynamicForm').html(htmlType3);
        } else if(value == 4) {
            $('#dynamicForm').html(htmlType4);
        } else if(value == 5) {
            $('#dynamicForm').html(htmlType5);
        }
        $.material.init();
    });
});