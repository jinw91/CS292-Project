
// Gets the selected value of the supplemental question.
function getSelected()
{
	var tag = document.getElementsByName('type').item(0);
	var new_tag = document.getElementsByName('question_specific').item(0);
	if (tag.value == 1)
	{
		new_tag.innerHTML = shortAnswer();
	}
}

// For handling 1==SHORT ANSWER. 
function shortAnswer()
{
	return('');
}