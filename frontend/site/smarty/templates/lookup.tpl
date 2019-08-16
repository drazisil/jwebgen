<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>JWebGen Pony Generator; Lookup a pony</title>
        <meta name="Keywords" content="pony generator, dream generator, starter, pony, generator">
        <meta name="Description" content="This pony generator lets you create dream ponies, starter ponies, or test breed between two existing ponies. This pony generator uses images from PonyIsland.">
        <meta name="Author" content="jwbecher@jwebnet.net">
        <link rel="shortcut icon" href="/assets/favicon.ico">
        <link rel="StyleSheet" href="/assets/screen.css" type="text/css" media="screen">
        <link rel="stylesheet" href="assets/screen.css" type="text/css"/>

        <script type="text/javascript" src="/assets/js.php?page=lookup"></script>
        <script type="text/javascript" src="/assets/google_analytics.js"></script>
        <script type="text/javascript" src="/assets/support_banner.js"></script>
    </head>

    <body id="{$bodyID}" onload="placeIt();">

        {include file='disclamer_ad_nav.tpl'}

        <div id="content">
            <div>
                <table>
                    <tr>
                        <td  id="tdponyLookupForm">
                            <form name="ponyLookupForm" id="ponyLookupForm" method="get" action="controller.php" onsubmit="return ajaxQuery('GET', generateLookupURL(), 'ponyLookupZone');
                                    return false;">
                                <table>
                                    <tr>
                                        <td>Please paste the profile or image URL </td>
                                        <td><input type="text" size="20" maxlength="255" name="ponyurl" id="ponyurl"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>OR</td>
                                    </tr>
                                    <tr>
                                        <td>Please post the Pony ID </td>
                                        <td><input type="text" size="20" maxlength="20" id="ponyid" name="ponyid"/></td>
                                    </tr>
                                    <tr>
                                        <td>Would you like an adult or baby image? </td>
                                        <td>
                                            <select id="idage" name="idage">
                                                <option value="Adult" selected="selected">Adult</option>
                                                <option value="Baby">Baby</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input name="nextAction" value="ponyLookup" type="hidden"/>
                                            <input name="DecodeByIDExport" id="DecodeByIDExport" value="Lookup" type="submit"/>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                        <td><div id="ponyLookupZone"></div></td>
                    </tr>
                </table>
            </div>
        </div>
        {include file='footer.tpl'}