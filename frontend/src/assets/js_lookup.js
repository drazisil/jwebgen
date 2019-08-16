/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function generateLookupURL() {

    if (document.ponyLookupForm.ponyurl.value !== '') {
        var re = new RegExp("&pny=([0-9]*)");
        var m = re.exec(document.ponyLookupForm.ponyurl.value);

        document.ponyLookupForm.ponyid.value = m[1];
    }

    if (document.ponyLookupForm.ponyid.value > 19814133) {
//        Pony lookup from PonyIsland failed
        alert("JwebGen can not currently lookup ponies made after the site change.\n Waiting on a fix from PI");
        return false;
    }

    ajaxURL = '';

    ajaxURL = 'controller?';
    ajaxURL += '&ponyid=' + document.forms[0].ponyid.value;

    ajaxURL += '&idage=' + document.forms[0].idage.options[document.forms[0].idage.selectedIndex].value;

    ajaxURL += '&nextAction=ponyLookup';

    return ajaxURL;
}
