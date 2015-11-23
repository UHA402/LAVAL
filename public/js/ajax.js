function showLog(message, type, title)
{
	testLog();

	if (typeof type === "undefined")
		type = 'info';
	
	if (typeof title === "undefined")
		title = 'null';
	
	var div = document.createElement('div');
	div.className = 'alert alert-'+type+' fade out';
	div.id = 'log';
	
	var button = document.createElement('button');
	button.type = 'button';
	button.className = 'close';
	button.setAttribute("data-dismiss", "alert");
	button.innerHTML = '&times;';
	div.appendChild(button);
	
	if (title != 'null')
	{
		var strong = document.createElement('strong');
		strong.innerHTML = title;
		div.appendChild(strong);
	}
	
	div.innerHTML += " " + message;
	
	document.body.appendChild(div);
}

function testLog()
{
	if (document.getElementById('log') != null)
		document.body.removeChild(log);
}

function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("This browser does not support object XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function addSequence(path)
{
	var tab = new Array();
	var objetSequence = document.getElementById('lessonlist');
	var tabAllSequence = new Array();
	
	for (var i = 0; i < objetSequence.length; i++)
	{
		if (objetSequence.options[i].selected)
		{
			tabAllSequence.push(objetSequence.options[i].value);
			objetSequence.options[i].selected = false;
		}
	}
        
	if (tabAllSequence.length > 0)
	{
		var xhr = getXMLHttpRequest();
		
		xhr.onreadystatechange = function()
		{
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
			{
				var tabJSON = JSON.parse(xhr.responseText);
                                
				var tabSequence = $('#lessonSessionTable').datatable('select');
				var idLastSequence = 0;
				
				if (tabSequence.length > 0)
					idLastSequence = tabSequence[tabSequence.length - 1].id;
				
				
				for (var i = 0; i < tabJSON.length; i++)
				{
					var tabTemp = [
					{
						id: idLastSequence + i + 1,
						idSequence: tabJSON[i]['id'],
						title: tabJSON[i]['title'],
						nbBrick: tabJSON[i]['nbBrick'],
						button: "<button type='button' id='del' class='btn btn-flat btn-warning btn-sm btn-td' onclick='delSequence("+(idLastSequence + i + 1)+");'>Delete</button>"
					}
					];
					
					$('#lessonSessionTable').datatable('insert', tabTemp);
				}
			}
		};
		
		xhr.open("POST", path + "session/readSequenceById", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("idAddSequence=" + tabAllSequence);
	}
}

function addSession(path)
{
	var tab = new Array();
	var tabSession = $('#lessonSessionTable').datatable('select');
	var tabSequence = $('#lessonSessionTable').datatable('select');
	var btnPublish = document.getElementById('publish');
	var i = 0, nbSequence = tabSequence.length;
	var publish = false;
	
	if (btnPublish.checked)
		publish = true;
	
	var sessionToAdd = "";
	
	for (sequence of tabSequence)
	{
		if (++i < tabSequence.length)
			sessionToAdd += sequence.idSequence + ',';
		else
			sessionToAdd += sequence.idSequence;
	}

	var xhr = getXMLHttpRequest();
	
	xhr.onreadystatechange = function()
	{
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
		{
			var response = xhr.responseText;
			
			if (response != "null" && isNaN(response))
			{
				var tabJSON = response.split(",");
				var tabActualSession = $('#sessionTable').datatable('select');
				var idLastSession = 0;
				
				if (tabActualSession.length > 0)
					idLastSession = tabActualSession[tabActualSession.length - 1].id;
				
				var strBtnDelete = "<a href='delete/"+parseInt(tabJSON[0])+"'><button type='button' id='del' class='btn btn-flat btn-warning btn-sm btn-td'>Delete</button></a>";
				var strBtnEdit = "<button type='button' id='edit' class='btn btn-flat btn-info btn-sm btn-td' onclick='showEditSession(&quot;"+path+"&quot;, "+(idLastSession + i + 1)+");'>Edit</button>";
				
				var tabTemp = [
				{
					id: idLastSession + i + 1,
					idSession: tabJSON[0],
					title: tabJSON[1],
					nbBrick: tabJSON[2],
					button: strBtnEdit + strBtnDelete
				}
				];
				
				$('#sessionTable').datatable('insert', tabTemp);
				
				for (j = 0; j < nbSequence; j++)
					$('#lessonSessionTable').datatable('delete', (j+1));
				
				$('#name').val("");
				
				idEdit = null;
				
				showLog("Session Sucessfully created", 'info', 'INFO');
			}
			else
				showLog("Fail to create this session", 'danger', 'ERROR');
		}
	};
	
	xhr.open("POST", path + "session/create", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("idSession=" + idEdit + "&titleSession=" + $('#name').val() + "&sequenceToAdd=" + sessionToAdd + "&publish=" + publish);
}

function showEditSession(path, id)
{
	
	var session = $('#sessionTable').datatable('select', id);
	var tabSequence = $('#lessonSessionTable').datatable('select');
	var i = 0, nbSequence = tabSequence.length;
	
	var sessionToAdd = "";
	
	for (sequence of tabSequence)
	{
		if (++i < tabSequence.length)
			sessionToAdd += sequence.idSequence + ',';
		else
			sessionToAdd += sequence.idSequence;
	}
	
	for (j = 0; j < nbSequence; j++)
		$('#lessonSessionTable').datatable('delete', (j+1));
	
	$('#name').val(session["title"]);
	document.getElementById("title").innerHTML = "Edit Session";
	document.getElementById("save").innerHTML = "EDIT";
	
	var xhr = getXMLHttpRequest();
	
	xhr.onreadystatechange = function()
	{
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
		{
			var response = xhr.responseText;
			var tabJSON = JSON.parse(response);
                        
			document.getElementById("publish").checked = tabJSON["publish"];
			
			var tabActualSession = $('#sessionTable').datatable('select');
			var idLastSession = 0;
			
			if (tabActualSession.length > 0)
				idLastSession = tabActualSession[tabActualSession.length - 1].id;
			
			var strBtnDelete = "<a href='delete/"+parseInt(tabJSON[0])+"'><button type='button' id='del' class='btn btn-flat btn-warning btn-sm btn-td'>Delete</button></a>";
			var strBtnEdit = "<button type='button' id='edit' class='btn btn-flat btn-info btn-sm btn-td' onclick='showEditSession(&quot;"+path+"&quot;, "+(idLastSession + i + 1)+");'>Edit</button>";
			
			for (var j = 0; j < tabJSON['nbSequence']; j++)
			{
				var tabTemp = [
				{
					id: j + 1,
					idSequence: tabJSON[j]['id'],
					title: tabJSON[j]['title'],
					nbBrick: tabJSON[j]['nbBrick'],
					button: "<button type='button' id='del' class='btn btn-flat btn-warning btn-sm btn-td' onclick='delSequence("+(j + 1)+");'>Delete</button>"
				}
				];
				
				$('#lessonSessionTable').datatable('insert', tabTemp);
			}
			
			idEdit = parseInt(session["idSession"]);
		}
	};
	
	xhr.open("POST", path + "session/readTabSequence", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("idSession=" + session["idSession"]);
}

function editSession(path)
{
	var tab = new Array();
	var tabSession = $('#sessionTable').datatable('select');
	var tabSequence = $('#lessonSessionTable').datatable('select');
	var btnPublish = document.getElementById('publish');
	var i = 0, nbSequence = tabSequence.length;
	var publish = false;
	
	if (btnPublish.checked)
		publish = true;
	
	var sessionToAdd = "";
	
	for (sequence of tabSequence)
	{
		if (++i < tabSequence.length)
			sessionToAdd += sequence.idSequence + ',';
		else
			sessionToAdd += sequence.idSequence;
	}
	
	var xhr = getXMLHttpRequest();
	
	xhr.onreadystatechange = function()
	{
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
		{
			var response = xhr.responseText;
			
			if (isNaN(response))
			{
				var tabJSON = response.split(",");
				var tabActualSession = $('#sessionTable').datatable('select');
				var idIndex = 0, tabIdSequence = [];
				
				for (session of tabActualSession)
				{
					if (parseInt(session['idSession']) === idEdit)
						idIndex = parseInt(session['id']);
				}
				
				
				var strBtnDelete = "<a href='delete/"+parseInt(tabJSON[0])+"'><button type='button' id='del' class='btn btn-flat btn-warning btn-sm btn-td'>Delete</button></a>";
				var strBtnEdit = "<button type='button' id='edit' class='btn btn-flat btn-info btn-sm btn-td' onclick='showEditSession(&quot;"+path+"&quot;, "+idIndex+");'>Edit</button>";
				
				var tabTemp = {
					id: idIndex,
					idSession: tabJSON[0],
					title: tabJSON[1],
					nbBrick: tabJSON[2],
					button: strBtnEdit + strBtnDelete
				};
				
				$('#sessionTable').datatable('update', idIndex, tabTemp);
				
				for (j = 0; j < nbSequence; j++)
					tabIdSequence[j] = tabSequence[j].id;
				
				for (j = 0; j < nbSequence; j++)
					$('#lessonSessionTable').datatable('delete', tabIdSequence[j]);
				
				$('#name').val("");
				document.getElementById("title").innerHTML = "Add Session";
				document.getElementById("save").innerHTML = "CREATE";
				
				idEdit = null;
			}
		}
	};
	
	xhr.open("POST", path + "session/update", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("idSession=" + idEdit + "&titleSession=" + $('#name').val() + "&sequenceToAdd=" + sessionToAdd + "&publish=" + publish);
}

function delSequence(id)
{
	$('#lessonSessionTable').datatable('delete', id);
}