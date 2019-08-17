/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function generateBreedOOURL() {

    for (i=1;i<=4;i++) 	{
        if (document.forms[0]['P'+i+'URL'].value !== '') {
            var re = new RegExp("&pet=([0-9]*)");
            var m = re.exec(document.forms[0]['P'+i+'URL'].value);

            document.forms[0]['P'+i+'ID'].value = m[1];
        }
    }
    
        if ((document.forms[0].P1ID.value > 19814133) || (document.forms[0].P2ID.value > 19814133) || (document.forms[0].P3ID.value > 19814133) || (document.forms[0].P4ID.value > 19814133)) {
//        Pony lookup from PonyIsland failed
        alert("JwebGen can not currently lookup ponies made after the site change.\n Waiting on a fix from PI");
        return false;
    }

    ajaxURL = '';

    ajaxURL = 'controller.php?';
    ajaxURL += '&P1ID='+document.forms[0].P1ID.value;
    ajaxURL += '&P2ID='+document.forms[0].P2ID.value;
    ajaxURL += '&P3ID='+document.forms[0].P3ID.value;
    ajaxURL += '&P4ID='+document.forms[0].P4ID.value;

    ajaxURL += '&age='+document.forms[0].age[document.forms[0].age.selectedIndex].value;

    ajaxURL += '&bspattern='+document.forms[0].bspattern[document.forms[0].bspattern.selectedIndex].value;
    ajaxURL += '&bssocks='+document.forms[0].bssocks[document.forms[0].bssocks.selectedIndex].value;
    ajaxURL += '&bshair='+document.forms[0].bshair[document.forms[0].bshair.selectedIndex].value;
    ajaxURL += '&bsface='+document.forms[0].bsface[document.forms[0].bsface.selectedIndex].value;

    ajaxURL += '&nextAction=ponyBreedOO';


    return ajaxURL;
}
