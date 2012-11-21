// JavaScript Document
function months()
{
	document.write("<option value='01'>January</option>");
	document.write("<option value='02'>February</option>");
    document.write("<option value='03'>March</option>");
	document.write("<option value='04'>April</option>");
	document.write("<option value='05'>May</option>");
	document.write("<option value='06'>June</option>");
	document.write("<option value='07'>July</option>");
	document.write("<option value='08'>August</option>");
	document.write("<option value='09'>September</option>");
	document.write("<option value='10'>October</option>");
	document.write("<option value='11'>November</option>");
	document.write("<option value='12'>December</option>");
    document.write("</select>");
}
function years()
{
	for (i = 0; i< 50; i++)
	{
		document.write("<option>"+(2016-i)+"</option>");
	}
	document.write("</select>");
}
function years(year)
{
	for (i = 0; i< 50; i++)
	{
		if (2016-i==year)
		{
			document.write("<option selected='selected'>"+(2016-i)+"</option>");
		}
		else
		{
			document.write("<option>"+(2016-i)+"</option>");
		}
	}
	document.write("</select>");
}

function states(default_state)
{
	var states_array = new Array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
	for (i in states_array)
	{
		if (default_state == states_array[i])
		{
			document.write("<option selected='selected'>"+states_array[i]+"</option>");
		}
		else
		{
			document.write("<option>"+states_array[i]+"</option>");
		}
	}
    //document.write("</select>");
}

function addfield(divName)
{
	var newdiv = document.createElement('div');
	newdiv.innerHTML = "<label class='field' for='organization"+counter+"'>Organization: </label><input name='organization"+counter+"' /><label for='leadership"+counter+"'> Position: (if applicable) </label><input name='leadership"+counter+"' />";
	var before = document.getElementById(divName);
	var parent = before.parentNode;
	parent.insertBefore(newdiv, before);
	counter++;
}
function addothercollege()
{
	var college = document.getElementById("college").value;
	if (college == "other")
	{
		var oth = document.getElementById("school");
		oth.innerHTML = "<label class='field' for='other'>Name: </label><input id='other' type='text' name='other' width='100'/>";
	}
	else
	{
		var oth = document.getElementById("school");
		oth.innerHTML = "";
	}
}
function selectMonth(name, month)
{
	var l_tag = document.getElementsByName(name).item(0);
	for (var i = 0; i < l_tag.length; i++)
	{
		if (l_tag[i].value==month)
		{
			l_tag.selectedIndex = i;
			return true;
		}
	}
}
function selectDefault(name, value)
{
	var l_tag = document.getElementsByName(name).item(0);
	for (var i = 0; i < l_tag.length; i++)
	{
		if (l_tag[i].value==value)
		{
			l_tag.selectedIndex = i;
			return true;
		}
	}
}

/**
Selecting defaults for searches
**/
function selectMultipleId(idname, array)
{
	var l_tag = document.getElementById(idname);
	for (var i = 0; i < l_tag.length; i++)
	{
		if (array.indexOf(l_tag[i].value) >= 0)
		{
			l_tag[i].selected = true;
		}
	}
	return true;
}

function hideEnd(name1, name2)
{
	var l_tag = document.getElementsByName(name1).item(0);
	l_tag.parentNode.removeChild(l_tag);
	l_tag = document.getElementsByName(name2).item(0);
	l_tag.parentNode.removeChild(l_tag);
}

/**
Adding months and years.
**/
function college_form()
{
	document.write("<select name='college_month_start'>");
	months();
	document.write("<select style='width: 60px;' name='college_year_start'>");
	years();
	document.write("<label for='college_month_end'> - </label>");
	document.write("<select name='college_month_end'>");
	months();
	document.write("<select style='width: 60px;' name='college_year_end'>");
	years();
}

function work_form()
{
	document.write("<select name=\"work_month_start\">");
	months();
	document.write("<select name=\"work_year_start\">");
	years();
	document.write("<label for=\"work_month_end\"> - </label>");
	document.write("<select name=\"work_month_end\">");
	months();
	document.write("<select name=\"work_year_end\">");
	years();
}

function img_up()
{
	var tag = document.getElementById("image_mes");
	tag.innerHTML = "Uploading picture, do not change the page.";
	return true;
}

function validate_education()
{
	
	var major = document.getElementById('major');
	var message = "";
	if (major.value == "")
	{
		message+="Please fill in your area(s) of study.";
		window.alert(message);
		return false;
	}
	return true;
}

function validate_work()
{
	
	var name = document.getElementById('name');
	var title = document.getElementById('title');
	var state = document.getElementById('state');
	var city = document.getElementById('city');
	var skip = document.getElementById('skip');
	if (skip.value =="Skip")
	{
		return true;
	}
	var message = "";
	if (name.value == "")
	{
		message+="Please fill in your company name.";
		window.alert(message);
		return false;
	}
	if (title.value == "")
	{
		message+="Please fill in your title.";
		window.alert(message);
		return false;
	}
	if (city.value == "")
	{
		message+="Please fill in the city of where you worked.";
		window.alert(message);
		return false;
	}
	if (state.value == "")
	{
		message+="Please fill in the state of where you worked.";
		window.alert(message);
		return false;
	}
	return true;
}

function validate_extra()
{
	
	var name = document.getElementById('name');
	var title = document.getElementById('title');
	var skip = document.getElementById('skip');
	if (skip.value == "Skip")
	{
		return true;
	}
	var message = "";
	if (name.value == "")
	{
		message+="Please fill in your organization name.";
		window.alert(message);
		return false;
	}
	if (title.value == "")
	{
		message+="Please fill in your title.";
		window.alert(message);
		return false;
	}
	return true;
}

function hideIfPresent() {
	$(".hide_if_present").toggle();
}

function showSummerIntern(value) {
    if (value == 'yes') {
        $("#summer").show();
    } else {
        $("#summer").hide();
    }
}

function select_all() {
    $(".candidate_checkbox").attr("checked", $("#selectall").prop("checked"));
}

function select_one() {
    $("#selectall").attr("checked", $(".candidate_checkbox:checked").length == $(".candidate_checkbox").length);
}

function confirm_add_friend(name) {
    var message = "Are you sure you want to add " + name + " as your friend?";
    var confirmed = confirm(message);
    if (confirmed) {
        alert(name + " is now your friend.");
        return true;
    }
    return false;
}

function slideDown(clickId, toggleId) {
    $("#"+clickId).attr("src", ($("#"+clickId).attr("src") == "site_im/plussign.jpg") ? "site_im/minussign.jpg" : "site_im/plussign.jpg");
    $("#"+toggleId).slideToggle("fast");
}

function copy_group() {
    var group_name = "";
    if (jQuery('#select_group').val() == "new_group") {
        group_name = prompt('Enter a new group name:');
    } else {
        group_name = jQuery('#select_group').val();
    }
    jQuery('#hidden_group_name').val(group_name);
}
/**
Generic Profile.
**/
