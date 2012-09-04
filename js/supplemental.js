var counter = 1;

var question_counter = 1;
// Gets the selected value of the supplemental question.
function getSelected()
{
	var type = "type"+question_counter;
	var question_specific = "question_specific"+question_counter;
	var tag = document.getElementsByName(type).item(0);
	var new_tag = document.getElementById(question_specific);
	if (tag.value >= 3 && tag.value < 5)
	{
		clearQuestion();
		new_tag.innerHTML = multipleChoice();
	}
	else if (tag.value == 5)
	{
		clearQuestion();
		new_tag.innerHTML = checkBoxes();
	}
	else if (tag.value == 6)
	{
		clearQuestion();
		new_tag.innerHTML = scale();
	}
	else
	{
		clearQuestion();
	}
}

function clearQuestion()
{
	var question_specific = "question_specific"+question_counter;
	var new_tag = document.getElementById(question_specific);
	new_tag.innerHTML = "";
}
// For handling 1==SHORT ANSWER. 
function multipleChoice()
{
	alert("reached mc");
	return("<ul><li><input type='radio' style='margin-left: 300px;'><input type='text' name='"+(counter++)+"' size='200'></li><li><input type='radio' style='margin-left: 300px;'><a class='lato' href='#' onClick='addAnotherChoice(this);'>Add Another Choice</a></li></ul>");
}

function checkBoxes()
{
	return("<ul><li><input type='checkbox' style='margin-left: 300px;'><input type='text' name='"+(counter++)+"' size='200'></li><li><input type='checkbox' style='margin-left: 300px;'><a class='lato' href='#' onClick='addAnotherCheckbox(this);'>Add Another Choice</a></li></ul>");
}

function scale()
{
	return("<ul><li><label class='field'>Scale</label><select name='from'><option>0</option><option>1</option></select> To <select name='to'><option>3</option><option>5</option><option>9</option><option>10</option></select></li><li><label class='field'>Minimum: </label><input name='minimum' type='text' style='width:150px;'></li><li><label class='field'>Maximum: </label><input name='maximum' type='text' style='width:150px;'></li></ul>");
}

//Adds another choice for multiple choice questions.
function addAnotherChoice(tag)
{
	var newNode = document.createElement('li');
	newNode.innerHTML += "<input type='radio' style='margin-left: 300px;'>";
	newNode.innerHTML += "<input type='text' name='"+counter+"' size='200'>";
	counter++;
	tag.parentNode.parentNode.insertBefore(newNode, tag.parentNode);
}

function addAnotherCheckbox(tag)
{
	var newNode = document.createElement('li');
	newNode.innerHTML += "<input type='checkbox' style='margin-left: 300px;'>";
	newNode.innerHTML += "<input type='text' name='"+counter+"' size='200'>";
	counter++;
	tag.parentNode.parentNode.insertBefore(newNode, tag.parentNode);
}

//Adds a new question.
function addAnotherQuestion(tag)
{
	question_counter++;
	var node = tag.parentNode;
	var newNode = document.createElement('section');
	newNode.innerHTML += "<h3 class='header_question'>Question "+question_counter+"</h3><li><label class='field'>Question: </label><input name='question"+question_counter+"' type='text' style='width: 150px;' /></li><li><label class='field'>Type: </label><select name='type"+question_counter+"' style='width: 150px;' onchange='getSelected();'><option value='1'>Single-line Answer</option><option value='2'>Paragraph Answer</option><option value='3'>Multiple Choice</option><option value='4'>Choose From List</option><option value='5'>Checkboxes</option><option value='6'>Scale</option><option value='7'>Fill in the Blank</option></select></li><li id='question_specific"+question_counter+"'></li>";
	node.parentNode.insertBefore(newNode, node);
}