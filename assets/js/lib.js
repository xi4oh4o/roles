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
|do somethings Toolkit in below
|------------------------------
*/
var Toolkit = new Object;
Toolkit.Check = function(){ alert("This Check methods") };
/**
 * Check loginNull
 * return errorMessage
 */
Toolkit.Check.loginNull = function() {
  if (document.getElementById('LoginBoxem').value == "" ||
      document.getElementById('LoginBoxPs').value == "") {
    document.getElementById('LoginErrorMessage').innerHTML="Account password cannot be empty";
  } else {
    document.getElementById("LoginErrorMessage").innerHTML="";
  }
}
/*
|---------------------------
|     Ajax interaction
|do somethings ajax in below
|---------------------------
*/
var Ajax = new Object;
Ajax.Query = function(){ alert("This Query Methods") };

Ajax.Query.login = function() {
    xmlHttp=GetXmlHttpObject();
    if (xmlHttp==null) {
        alert("You Browser does not support AJAX");
        return;
    }

    var url="/user/verify/";
    var username = document.getElementById('LoginBoxem').value;
    var password = document.getElementById('LoginBoxPs').value;
    var post     = "username="+username+"&password="+password;

    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("POST",url,true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlHttp.send(post);

    function stateChanged() {
            if(xmlHttp.readyState=4||xmlHttp.readyState=="complete"){
                if(xmlHttp.responseText == "succeed") {
                    window.location.href="/user/panel";
                }else if(xmlHttp.responseText == "failure"){
                    document.getElementById("LoginErrorMessage").innerHTML=
                      "Incorrect username or password.";
                } else {
                    return "Interactive error, please try again.";
                }
            }
    }
}
Ajax.Query.userList = function() {
    xmlHttp=GetXmlHttpObject();
    if (xmlHttp==null) {
        alert("You Browser does not support AJAX");
        return;
    }

    var url="/user/list/";
    var action   = "";
    var condition = 'getList';
    var post     = "condition="+condition;

    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("POST",url,true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlHttp.send(post);

    function stateChanged() {
            if(xmlHttp.readyState=4||xmlHttp.readyState=="complete"){
                if(xmlHttp.responseText != null) {
                    document.getElementById("users").innerHTML=xmlHttp.responseText;
                }
            }
    }
}
