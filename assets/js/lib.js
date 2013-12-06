/*
|------------------------------|
|      JavaScript Library      |
|Howe Isamu <xi4oh4o@gmail.com>|
|------------------------------|
*/

/**
 * generate compatibility of xmlHttp Object
 */
function GetXmlHttpObject() {
    var xmlHttp=null;
    //Geckos,Presto,Webkit etc.
    try {
        xmlHttp=new XMLHttpRequest();
    } catch (e) {
        //Trident
        try {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTPD");
        }
    }
    return xmlHttp;
}
/*
|------------------------------
|     JavaScript Toolkit
|do somethings toolkit in below
|------------------------------
*/
var toolkit = new Object;
toolkit.Check = function(){ alert("This Check methods") };
/**
 * Check loginNull
 * return errorMessage
 */
toolkit.Check.loginNull = function() {
  if (document.getElementById('LoginBoxem').value == "" ||
      document.getElementById('LoginBoxPs').value == "") {
    document.getElementById('LoginErrorMessage').innerHTML="Account password cannot be empty";
  } else {
    document.getElementById("LoginErrorMessage").innerHTML="";
  }
}
