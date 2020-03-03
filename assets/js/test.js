var result = null;	//shortlink result to copym

//API URL
function getapi(){
	if (window.location.protocol != "https:"){
		return "http://wev.se/etc/api";
	} else{
		return "https://wev.se/etc/api";
	}
}

function getuserapi(){
	if (window.location.protocol != "https:"){
		return "http://wev.se/etc/usrapi";
	} else{
		return "https://wev.se/etc/usrapi";
	}
}


//--------------------------------- Shortlink input form action -------------------------------------
function submit(){
	$('#result b').html('');
	$('#error').html('');
	$('#result').css('display', 'none');
	if($('#linkInput').val()!=''){
		$(".loader").fadeIn("normal");
		document.getElementById("tombol").disabled = true;		//Prevent sapm or misclick

		var postdata;
		if($('#idInput').val()==''){
			postdata = {
				url:$('#linkInput').val()
			}
		}else{
			postdata = {
				url:$('#linkInput').val(),
				id:$('#idInput').val(),
				random:'false'
			}
		}
		$.ajax({
			url: getapi(),
			type: "POST",
			data: postdata,
			success:function(data){
				$('#result b').html(data.shortlink);
				$('#result').css('display', '');
				result = data.shortlink;
				
				if(addentry){		//Table add new entry
					var row = document.getElementById("usertable").insertRow(1);
					row.insertCell(0).innerHTML = "<a href='https://" + data.shortlink + "' >" + data.shortlink + "</a>";
					row.insertCell(1).innerHTML = "0";
					row.insertCell(2);
					row.insertCell(3).innerHTML = "<button class='btn btn-success' data-toggle='modal' data-target='#editform' onclick='editopen(&quot;" +  data.shortlink.split('/')[1] + "&quot;,&quot;" + $('#linkInput').val() + "&quot;)'>Edit</button>  <button class='btn btn-danger' data-toggle='modal' data-target='#deleteform' onclick='deleteopen(&quot;" +  data.shortlink.split('/')[1] + "&quot;)'>Delete</button>";
					addentry = false;
				}
			},
			error:function(xhr){
				var err = eval("(" + xhr.responseText + ")");
				$('#error').html(err.error);
			},
			complete:function(){
				$(".loader").css('display', 'none');
				setTimeout(function(){
					document.getElementById("tombol").disabled = false;
				},5000);
			}
		});
	}else{
		$('#error').html("Harap isi url input!");
	}
}

//Customize button
function customize() {
	var checkBox = document.getElementById("myCheck");
	var text = document.getElementById("customizepart");

	if (checkBox.checked == true){
		text.style.display = "inline";
	} else {
		text.style.display = "none";
	}
}

//Copy hasil shortlink
function copy() {
	var fullLink = document.createElement('input');
	document.body.appendChild(fullLink);
	fullLink.value = result;
	fullLink.select();
	fullLink.setSelectionRange(0, 99999); /*For mobile devices*/
	document.execCommand("copy");
	fullLink.remove();
	$('#copybtn').attr('class','btn btn-success');
	$('#copybtn').css('cursor', 'default');
	$('#copybtn').html('Copied!');
	setTimeout(function(){
		$('#copybtn').attr('class','btn btn-outline-secondary');
		$('#copybtn').css('cursor', 'pointer');
		$('#copybtn').html('Copy');
	},3000);
}

//-------------------------------------- USER PANEL -----------------------------------------
var addentry = false;

function enableAddEntry(){
	addentry = true;
}

//untuk user panel pas click edit di tabel
function editopen(id, url) {
	$('#idedit').val(id);
	$('#urledit').val(url);
}

//untuk user panel pas click delete di tabel
function deleteopen(id) {
	$('#deleteid').html(id);
}

//untuk user panel edit item
function edit() {
	document.getElementById("editbtn").disabled = true;		//Prevent sapm or misclick
	$.ajax({
		url: getapi(),
		type: "POST",
		data: {
			edit:$('#idedit').val(),
			url:$('#urledit').val()
		},
		success:function(){
			$('#status').css('display','inline');
			$('#status').attr('class','alert alert-success');
			$('#status').html('Success!');
			setTimeout(function(){
				location.reload();
			},2000);
		},
		error:function(xhr){
			var err = eval("(" + xhr.responseText + ")");
			$('#status').css('display','inline');
			$('#status').attr('class','alert alert-danger');
			$('#status').html(err.error);
			document.getElementById("editbtn").disabled = false;
		}
	});
}

//untuk user panel delete item
function deletee() {
	document.getElementById("deletebtn").disabled = true;		//Prevent sapm or misclick
	$.ajax({
		url: getapi(),
		type: "POST",
		data: {
			delete:$('#deleteid').html(),
		},
		success:function(){
			location.reload();
		},
		error:function(xhr){
			var err = eval("(" + xhr.responseText + ")");
			alert(err.error);
			document.getElementById("deletebtn").disabled = false;
		}
	});
}
