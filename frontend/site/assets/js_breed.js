/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function generateBreedURL() {

    if (document.form.DadURL.value !== '') {
        var re = new RegExp("&pny=([0-9]*)");
        var m = re.exec(document.form.DadURL.value);

        document.form.DadID.value = m[1];
    }
    if (document.form.MomURL.value !== '') {
        var re = new RegExp("&pny=([0-9]*)");
        var m = re.exec(document.form.MomURL.value);

        document.form.MomID.value = m[1];
    }

    if ((document.forms[0].DadID.value > 19814133) || (document.forms[0].MomID.value > 19814133)) {
//        Pony lookup from PonyIsland failed
        alert("JwebGen can not currently lookup ponies made after the site change.\n Waiting on a fix from PI");
        return false;
    }

    ajaxURL = '';

    ajaxURL = 'controller?';
    ajaxURL += '&DadID=' + document.forms[0].DadID.value;
    ajaxURL += '&MomID=' + document.forms[0].MomID.value;

    ajaxURL += '&age=' + document.forms[0].age[document.forms[0].age.selectedIndex].value;

    ajaxURL += '&bspattern=' + document.forms[0].bspattern[document.forms[0].bspattern.selectedIndex].value;
    ajaxURL += '&bssocks=' + document.forms[0].bssocks[document.forms[0].bssocks.selectedIndex].value;
    ajaxURL += '&bshair=' + document.forms[0].bshair[document.forms[0].bshair.selectedIndex].value;
    ajaxURL += '&bsface=' + document.forms[0].bsface[document.forms[0].bsface.selectedIndex].value;

    ajaxURL += '&nextAction=ponyBreed';


    return ajaxURL;
}
