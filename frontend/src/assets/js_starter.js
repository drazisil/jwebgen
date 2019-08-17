/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function generateStarterURL() {

    ajaxURL = '';

    ajaxURL = 'controller.php?';

    if (document.forms[0].surprise.checked) {

        document.forms[0].Mbreed.selectedIndex = randMax(17);

        document.forms[0].Meyes.selectedIndex = randMax(8);
        document.forms[0].Meyes.style.backgroundColor = '#'+document.forms[0].Meyes[document.forms[0].Meyes.selectedIndex].value;
        document.forms[0].Mhair.selectedIndex = randMax(8);
        document.forms[0].Mhair.style.backgroundColor = '#'+document.forms[0].Mhair[document.forms[0].Mhair.selectedIndex].value;
        document.forms[0].Mhair2.selectedIndex = randMax(8);
        document.forms[0].Mhair2.style.backgroundColor = '#'+document.forms[0].Mhair2[document.forms[0].Mhair2.selectedIndex].value;
        document.forms[0].Mbody.selectedIndex = randMax(8);
        document.forms[0].Mbody.style.backgroundColor = '#'+document.forms[0].Mbody[document.forms[0].Mbody.selectedIndex].value;
        document.forms[0].Mextra1.selectedIndex = randMax(8);
        document.forms[0].Mextra1.style.backgroundColor = '#'+document.forms[0].Mextra1[document.forms[0].Mextra1.selectedIndex].value;
        document.forms[0].Mextra2.selectedIndex = randMax(8);
        document.forms[0].Mextra2.style.backgroundColor = '#'+document.forms[0].Mextra2[document.forms[0].Mextra2.selectedIndex].value;

        document.forms[0].Msgene.selectedIndex = randMax(34);

        document.forms[0].Fbreed.selectedIndex = randMax(16);

        document.forms[0].Feyes.selectedIndex = randMax(8);
        document.forms[0].Feyes.style.backgroundColor = '#'+document.forms[0].Feyes[document.forms[0].Feyes.selectedIndex].value;
        document.forms[0].Fhair.selectedIndex = randMax(8);
        document.forms[0].Fhair.style.backgroundColor = '#'+document.forms[0].Fhair[document.forms[0].Fhair.selectedIndex].value;
        document.forms[0].Fhair2.selectedIndex = randMax(8);
        document.forms[0].Fhair2.style.backgroundColor = '#'+document.forms[0].Fhair2[document.forms[0].Fhair2.selectedIndex].value;
        document.forms[0].Fbody.selectedIndex = randMax(8);
        document.forms[0].Fbody.style.backgroundColor = '#'+document.forms[0].Fbody[document.forms[0].Fbody.selectedIndex].value;
        document.forms[0].Fextra1.selectedIndex = randMax(8);
        document.forms[0].Fextra1.style.backgroundColor = '#'+document.forms[0].Fextra1[document.forms[0].Fextra1.selectedIndex].value;
        document.forms[0].Fextra2.selectedIndex = randMax(8);
        document.forms[0].Fextra2.style.backgroundColor = '#'+document.forms[0].Fextra2[document.forms[0].Fextra2.selectedIndex].value;

        document.forms[0].Fsgene.selectedIndex = randMax(34);
    }

    ajaxURL += '&Mbreed='+document.forms[0].Mbreed[document.forms[0].Mbreed.selectedIndex].value;
    ajaxURL += '&Meyes='+document.forms[0].Meyes[document.forms[0].Meyes.selectedIndex].value;
    ajaxURL += '&Mhair='+document.forms[0].Mhair[document.forms[0].Mhair.selectedIndex].value;
    ajaxURL += '&Mhair2='+document.forms[0].Mhair2[document.forms[0].Mhair2.selectedIndex].value;
    ajaxURL += '&Mbody='+document.forms[0].Mbody[document.forms[0].Mbody.selectedIndex].value;
    ajaxURL += '&Mextra1='+document.forms[0].Mextra1[document.forms[0].Mextra1.selectedIndex].value;
    ajaxURL += '&Mextra2='+document.forms[0].Mextra2[document.forms[0].Mextra2.selectedIndex].value;

    ajaxURL += '&Msgene='+document.forms[0].Msgene[document.forms[0].Msgene.selectedIndex].value;

    ajaxURL += '&Fbreed='+document.forms[0].Fbreed[document.forms[0].Fbreed.selectedIndex].value;
    ajaxURL += '&Feyes='+document.forms[0].Feyes[document.forms[0].Feyes.selectedIndex].value;
    ajaxURL += '&Fhair='+document.forms[0].Fhair[document.forms[0].Fhair.selectedIndex].value;
    ajaxURL += '&Fhair2='+document.forms[0].Fhair2[document.forms[0].Fhair2.selectedIndex].value;
    ajaxURL += '&Fbody='+document.forms[0].Fbody[document.forms[0].Fbody.selectedIndex].value;
    ajaxURL += '&Fextra1='+document.forms[0].Fextra1[document.forms[0].Fextra1.selectedIndex].value;
    ajaxURL += '&Fextra2='+document.forms[0].Fextra2[document.forms[0].Fextra2.selectedIndex].value;

    ajaxURL += '&Fsgene='+document.forms[0].Fsgene[document.forms[0].Fsgene.selectedIndex].value;

    if (document.forms[0].surprise.checked) {
        ajaxURL += '&surprise='+document.forms[0].surprise.value;
    }
    ajaxURL += '&gender='+document.forms[0].gender[document.forms[0].gender.selectedIndex].value;
    ajaxURL += '&age='+document.forms[0].age[document.forms[0].age.selectedIndex].value;
    ajaxURL += '&nextAction=ponyStarter';
    
    return ajaxURL;
}

function randMax(max) {
    return Math.round(Math.random()*max);
}

