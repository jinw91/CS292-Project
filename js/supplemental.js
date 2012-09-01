
// Gets the selected value of the supplemental question.
function getSelected()
{
	var tag = document.getElementsByName('type').item(0);
	var new_tag = document.getElementsByName('question_specific').item(0);
	alert(tag.value);
	if (tag.value <= 2)
	{
		new_tag.innerHTML = "";
	}
	else if (tag.value == 3)
	{
		new_tag.innerHTML = "";
		new_tag.innerHTML = multipleChoice();
	}
}

function clearQuestion()
{
	var new_tag = document.getElementsByName('question_specific').item(0);
	new_tag.innerHTML = "";
}
// For handling 1==SHORT ANSWER. 
function multipleChoice()
{
	return("<ul><li><label class='field'></label><input type='radio'><input type='text' name='1' size='200'></li><li><label class='field'></label><input type='radio'><a href='#' onClick='addAnotherChoice(this);'>Add Another Choice</a></li></ul>");
}

var counter = 1;
//Adds another choice for multiple choice questions.
function addAnotherChoice(tag)
{
	var type = document.getElementsByName('type').item(0);
	var newNode = document.createElement('li');
	if (type == 3 || type == 5) //choose from multiple or list.
	{
		newNode.innerHTML += "<input type='radio' style='margin-left: 300px;'>";
	}
	else //choose from checkbox.
	{
		newNode.innerHTML += "<input type='checkbox' style='margin-left: 300px;'>";
	}
	newNode.innerHTML += "<input type='text' name='"+counter+"' size='200'>";
	counter++;
	tag.parentNode.parentNode.insertBefore(newNode, tag.parentNode);
}

//Adds a new question.
var question_counter = 2;
function addAnotherQuestion(tag)
{
	
}