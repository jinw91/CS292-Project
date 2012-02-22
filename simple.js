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
	for (i = 0; i< 30; i++)
	{
		document.write("<option>"+(1990+i)+"</option>");
	}
	document.write("</select>");
}
function years(year)
{
	for (i = 0; i< 30; i++)
	{
		if (1990+i==year)
		{
			document.write("<option selected='selected'>"+(1990+i)+"</option>");
		}
		else
		{
			document.write("<option>"+(1990+i)+"</option>");
		}
	}
	document.write("</select>");
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
/**
Generic Profile.
**/
