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

    ajaxURL = '';

    ajaxURL = 'controller.php?';
    ajaxURL += '&ponyid=' + document.forms[0].ponyid.value;

    ajaxURL += '&idage=' + document.forms[0].idage.options[document.forms[0].idage.selectedIndex].value;

    ajaxURL += '&nextAction=ponyLookup';

    return ajaxURL;
}
