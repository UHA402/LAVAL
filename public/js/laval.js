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
            pagingListClass: 'pagination pagination-sm',
			identify: 'id',
			lineFormat: function (id, data)
			{ 
				var res = $('<tr></tr>') ;
				res.data('data', data) ; // Store the data
				res.attr('data-id', id) ; // Store the id
				for (var key in data)
				{
					var td = $('<td>' + data[key] + '</td>');
					
					if (key === 'id' || key === 'idSession')
					{
						td.hide() ; // Don't display the id column
					}
					
					res.append(td) ; 
				}
				
				return res;
			}
        });
    }
	
    if ($('#lessonSessionTable').length) {
        $('#lessonSessionTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingLesson',
            pagingListClass: 'pagination pagination-sm',
            identify: 'id',
            lineFormat: function (id, data)
            { 
                    var res = $('<tr></tr>') ;
                    res.data('data', data) ; // Store the data
                    res.attr('data-id', id) ; // Store the id
                    for (var key in data)
                    {
                            var td = $('<td>' + data[key] + '</td>');

                            if (key === 'id' || key === 'idSequence')
                            {
                                    td.hide() ; // Don't display the id column
                            }

                            res.append(td) ; 
                    }

                    return res;
            }
        });
    }
    
    if ($('#lessonTable').length) {
        $('#lessonTable').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingBrick',
            pagingListClass: 'pagination pagination-sm',
            identify: 'id',
            lineFormat: function (id, data)
            { 
                    var res = $('<tr></tr>') ;
                    res.data('data', data) ; // Store the data
                    res.attr('data-id', id) ; // Store the id
                    for (var key in data)
                    {
                            var td = $('<td>' + data[key] + '</td>');
                            console.log(key);
                            if (key === 'id' || key === 'idSequence')
                            {
                                    td.hide() ; // Don't display the id column
                            }

                            res.append(td) ; 
                    }

                    return res;
            }
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

    if ($('#usersList').length) {
        $('#usersList').datatable({
            pageSize: 10,
            sort: '*',
            pagingDivSelector: '.pagingUsers',
            pagingListClass: 'pagination pagination-sm'
        });
    }


    //Formulaire dynamique pour la création d'une brique
    var htmlType1 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[data]" name="brick[data]" type="text" readonly=""class="form-control floating-label"placeholder="Upload File..."> <input type="file" name="inputFile" id="inputFile" required></div></div>';
    var htmlType2 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[data]" name="brick[data]" type="text"placeholder="Text to speech"class="form-control input-md" required></div></div>';
    var htmlType3 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[data]" name="brick[data]" type="text"placeholder="Text 1, Text 2, Text 3, Text 4"class="form-control input-md" required></div></div>';
    var htmlType4 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[data]" name="brick[data]" type="text" readonly=""class="form-control floating-label"placeholder="Upload 4 Files..."> <input type="file" name="inputFile[]" id="inputFile" multiple="" required></div></div>';
    var htmlType5 = '<div class="rows col-lg-6"><div class="form-group"><input id="brick[data]" name="brick[data]" type="text"placeholder="Text to record"class="form-control input-md" required></div></div>';

    $('#brickTypeSelector').on('change', function () {
        var value = $(this).val();
        console.log(value);
        //si c'est un stimuli auditif
        if (value == 'WAVE') {
            $('#dynamicForm').html(htmlType1);
        } else if (value == "TTS") {
            $('#dynamicForm').html(htmlType2);
        } else if (value == "TXT") {
            $('#dynamicForm').html(htmlType3);
        } else if (value == "IMG") {
            $('#dynamicForm').html(htmlType4);
        } else if (value == "RESP") {
            $('#dynamicForm').html(htmlType5);
        }
        $.material.init();
    });

    $("#sort tbody").sortable({
        placeholder: "ui-state-highlight",
        change: function() {
            var order = $('#sort tbody').sortable( "serialize" );
            $('#sequence\\[BrickPos\\]').val(order);
            console.log(order);
        }});
    $("#sort tbody").disableSelection();

	$('#addLesson').on('click', function()
	{
		phpAddSequence();
	});
	
	$('#save').on('click', function()
	{
		saveSession();
	});
	
	initSequence();
        initSequenceSession();
	initSession();
});

function initSequenceSession()
{
	var tabSequence = $('#lessonSessionTable').datatable('select');
	var nbLine = tabSequence.length;
	
	for (var i = 0; i < nbLine; i++)
	{
		var tabTemp = [
		{
			id: i + 1,
			idSequence: tabSequence[i][0],
			title: tabSequence[i][1],
			nbBrick: tabSequence[i][2],
                        button: "<button type='button' id='del' class='btn btn-flat btn-warning btn-sm btn-td' onclick='delSequence("+(i + 1)+");'>Delete</button>"
		}
		];
		
		$('#lessonSessionTable').datatable('insert', tabTemp);
		$('#lessonSessionTable').datatable('delete');
	}
}

function initSequence()
{
	var tabSequence = $('#lessonTable').datatable('select');
	var nbLine = tabSequence.length;
	
	for (var i = 0; i < nbLine; i++)
	{
            var tabTemp = [
            {
                    id: i + 1,
                    idSequence: tabSequence[i][0],
                    title: tabSequence[i][1],
                    nbBrick: tabSequence[i][2],
                    button: tabSequence[i][3]
            }
            ];

            $('#lessonTable').datatable('insert', tabTemp);
            $('#lessonTable').datatable('delete');
	}
}

function initSession()
{
	var tabSession = $('#sessionTable').datatable('select');
	var nbLine = tabSession.length;
	
	for (var i = 0; i < nbLine; i++)
	{
		var strBtnDelete = "<a href='delete/"+parseInt(tabSession[i][0])+"'><button type='button' id='del' class='btn btn-flat btn-warning btn-sm btn-td'>Delete</button></a>";
		var strBtnEdit = "<button type='button' id='edit' class='btn btn-flat btn-info btn-sm btn-td' onclick='showEditSession(&quot;"+path+"&quot;, "+(i + 1)+");'>Edit</button>";
		
		var tabTemp = [
		{
			id: i + 1,
			idSession: tabSession[i][0],
			title: tabSession[i][1],
			nbBrick: tabSession[i][2],
			button: strBtnEdit + strBtnDelete
		}
		];
		
		$('#sessionTable').datatable('insert', tabTemp);
		$('#sessionTable').datatable('delete');
	}
}