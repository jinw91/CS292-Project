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
var counter = 1;
var limit = 3;
function addmajor(divName)
{
	if (counter == limit)  
	{
		alert("Only 3 majors allowed per institution.");
	}
	else 
	{
		var newdiv = document.createElement('div');
		newdiv.innerHTML = "<label class='field' for='major"+counter+"'>Major: </label> <input type='text' name='major"+counter+"'/>";
		var before = document.getElementById(divName);
		var parent = before.parentNode;
		parent.insertBefore(newdiv, before);
		counter++;
	}
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
		var oth = document.getElementById("other");
		oth.type = "text";
		oth.width = "100";
	}
	else
	{
		document.getElementById("other").type = "hidden";
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