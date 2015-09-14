/*
**
**	js/editor.js
**	9/14/15 - PG 159
**	editor form - catch empty title & send msg
**
*/

//	detect editor form sub - prevent sub, message if empty title
function checkTitle(event) {
	/*
	**	**** HTML DOM querySelector() Method ****
	**	The querySelector() method returns the first element that matches
	**	a specified CSS selector(s) in the document.
	*/
	var title = document.querySelector("input[name='title']");
	var warning = document.querySelector("form #title-warning");

	if (title.value === "") {
		/*
		**	**** preventDefault() Method ****
		**	The preventDefault() method cancels the event if it is cancelable, 
		**	meaning that the default action that belongs to the event will not occur.
		*/
		event.preventDefault();
		/*
		**	**** HTML DOM innerHTML() Method ****
		**	The innerHTML property sets or returns the HTML content (inner HTML) of an element.
		*/
		warning.innerHtml = "You must write a title for the entry";
	}
}

function init(){
	var editorForm = document.querySelector("form #editor");
		/*
		**	**** HTML DOM addEventListener() Method ****
		**	The innerHTML property sets or returns the HTML content (inner HTML) of an element.
		*/
	editorForm.addEventListener("submit", checkTitle, false);
}
		/*
		**	**** HTML DOM innerHTML() Method ****
		**	The addEventListener() method attaches an event handler to the specified element.
		**
		**	Tip: Use the removeEventListener() method to remove an event handler that has been attached with the addEventListener() method.
		**
		** Tip: Use the document.addEventListener() method to attach an event handler to the document.
		*/
document.addEventListener("DOMContentLoaded", init, false);
		/*
		**	****  ****
		**	The innerHTML property sets or returns the HTML content (inner HTML) of an element.
		*/
