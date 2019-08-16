/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function ajaxQuery(requestType, requestURL, outputNode) {

    if (requestURL === false) {
        return false;
    }

    var xmlHttp;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
            }
        }
    }
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 2) {
        }
        if (xmlHttp.readyState == 3) {
        }
        if (xmlHttp.readyState == 4) {
            document.getElementById(outputNode).innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open(requestType, requestURL + "&Now=" + Date(), true);
    xmlHttp.send(null);
    return false;
}