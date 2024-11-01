//Create a varaiable to store the true/false value of the use of legacy links
var legacyLinks = null;
//Check if the legacy links are supposed to be used or not
if (document.body.className.match('useLegacyLinks')) {
  legacyLinks = true;
} else {
  legacyLinks = false;
}



function windowPopup(url, target, width, height) {
  // Calculate the position of the popup so
  // it’s centered on the screen.
  var left = (screen.width / 2) - (width / 2);
  var top = (screen.height / 2) - (height / 2);

  window.open(
    url,
    target,
    "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left
  );
}
//windowPopup(url, target, '600px', '300px');


//Function to create the "link" on the page
function destination(e) {
  var url, target = e.getAttribute("data-target"); //Get the target attribute of the link
  //Check whether or not to decode the link
  if (legacyLinks) {
    //Use standard link as is on the page
    url = e.getAttribute("data-destination");
  } else {
    //Parse the base64 encoding of the link on the page
    url = window.atob(e.getAttribute("data-destination"));
  }
  //Move to the new page
  window.open(url, target);
}



//Function to create the "link" on the page
function sharing_destination(e) {
  var url, target = e.getAttribute("data-target"); //Get the target attribute of the link
  //Check whether or not to decode the link
  if (legacyLinks) {
    //Use standard link as is on the page
    url = e.getAttribute("data-destination");
  } else {
    //Parse the base64 encoding of the link on the page
    url = window.atob(e.getAttribute("data-destination"));
  }
  //Open link in a popup window
  windowPopup(url, target, '800px', '450px');
}