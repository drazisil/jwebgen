/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function generateStarterOOURL() {

    ajaxURL = '';
    ajaxURL = 'controller?';

    if (document.forms[0].surprise.checked) {

        for (i=1;i<=4;i++)
        {
            document.forms[0]['S'+i+'breed'].selectedIndex = randMax(16);
            document.forms[0]['S'+i+'eyes'].selectedIndex = randMax(8);
            document.forms[0]['S'+i+'eyes'].style.backgroundColor = '#'+document.forms[0]['S'+i+'eyes'][document.forms[0]['S'+i+'eyes'].selectedIndex].value;
            document.forms[0]['S'+i+'hair'].selectedIndex = randMax(8);
            document.forms[0]['S'+i+'hair'].style.backgroundColor = '#'+document.forms[0]['S'+i+'hair'][document.forms[0]['S'+i+'hair'].selectedIndex].value;
            document.forms[0]['S'+i+'hair2'].selectedIndex = randMax(8);
            document.forms[0]['S'+i+'hair2'].style.backgroundColor = '#'+document.forms[0]['S'+i+'hair2'][document.forms[0]['S'+i+'hair2'].selectedIndex].value;
            document.forms[0]['S'+i+'body'].selectedIndex = randMax(8);
            document.forms[0]['S'+i+'body'].style.backgroundColor = '#'+document.forms[0]['S'+i+'body'][document.forms[0]['S'+i+'body'].selectedIndex].value;
            document.forms[0]['S'+i+'extra1'].selectedIndex = randMax(8);
            document.forms[0]['S'+i+'extra1'].style.backgroundColor = '#'+document.forms[0]['S'+i+'extra1'][document.forms[0]['S'+i+'extra1'].selectedIndex].value;
            document.forms[0]['S'+i+'extra2'].selectedIndex = randMax(8);
            document.forms[0]['S'+i+'extra2'].style.backgroundColor = '#'+document.forms[0]['S'+i+'extra2'][document.forms[0]['S'+i+'extra2'].selectedIndex].value;
            document.forms[0]['S'+i+'sgene'].selectedIndex = randMax(12);
        }
    }

    for (i=1;i<=4;i++)
    {
        ajaxURL += '&S'+i+'breed='+document.forms[0]['S'+i+'breed'][document.forms[0]['S'+i+'breed'].selectedIndex].value;
        ajaxURL += '&S'+i+'eyes='+document.forms[0]['S'+i+'eyes'][document.forms[0]['S'+i+'eyes'].selectedIndex].value;
        ajaxURL += '&S'+i+'hair='+document.forms[0]['S'+i+'hair'][document.forms[0]['S'+i+'hair'].selectedIndex].value;
        ajaxURL += '&S'+i+'hair2='+document.forms[0]['S'+i+'hair2'][document.forms[0]['S'+i+'hair2'].selectedIndex].value;
        ajaxURL += '&S'+i+'body='+document.forms[0]['S'+i+'body'][document.forms[0]['S'+i+'body'].selectedIndex].value;
        ajaxURL += '&S'+i+'extra1='+document.forms[0]['S'+i+'extra1'][document.forms[0]['S'+i+'extra1'].selectedIndex].value;
        ajaxURL += '&S'+i+'extra2='+document.forms[0]['S'+i+'extra2'][document.forms[0]['S'+i+'extra2'].selectedIndex].value;
        ajaxURL += '&S'+i+'sgene='+document.forms[0]['S'+i+'sgene'][document.forms[0]['S'+i+'sgene'].selectedIndex].value;
    }

    if (document.forms[0].surprise.checked) {
        ajaxURL += '&surprise='+document.forms[0].surprise.value;
    }
    ajaxURL += '&gender='+document.forms[0].gender[document.forms[0].gender.selectedIndex].value;
    ajaxURL += '&age='+document.forms[0].age[document.forms[0].age.selectedIndex].value;
    ajaxURL += '&nextAction=ponyStarterOO';

    return ajaxURL;
}

function randMax(max) {
    return Math.round(Math.random()*max);
}