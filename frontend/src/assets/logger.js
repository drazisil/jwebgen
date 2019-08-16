/**
 * Credit: Erorus @ theunderminejournal.com
 */

window.onerror = function(errmsg, errurl, errline) {
    if ((typeof errmsg != 'string') || (typeof errurl != 'string') || (errurl == '')) return false;
 
    /**
     * Do not report if triggered by the 'Game Play Labs' FireFox addon
     */
    if (errurl.indexOf('d3lvr7yuk4uaui.cloudfront.net')) return false;
    
    /**
     * Do not report if triggered by the 'Playbryte' FireFox addon
     */
    if (errurl.indexOf('inline.ibryte.com')) return false;

    /**
     * Do not report if triggered by an invalid Chrome extension
     */
    if (errurl.indexOf('RendererExtensionBindings')) return false;

    /**
     * Do not report if triggered by Google Adsense
     */
    if (errurl.indexOf('googlesyndication.com')) return false;

    /**
     * Do not report if triggered by Google Analytics
     */
    if (errurl.indexOf('google-analytics.com')) return false;

    this.prevline = this.prevline || -2;
    if (this.prevline == errline) return true;
    this.prevline = errline;
	
    try {
        var codesnip = "";
        for (var p in navigator)
            switch (typeof navigator[p]) {
                case 'string':
                    if (navigator[p] == '') break;
                case 'boolean':
                case 'number':
                    codesnip += "Browser "+p+": "+navigator[p]+"\n";
            }
 
        codesnip += "\nMessage: " + errmsg + "\nLocation: "+location.href+"\nError URL: " + errurl + "\nLine: " + errline + "\n\n";
 
        if (document.documentElement) {
            var pagecode = document.documentElement.outerHTML || document.documentElement.innerHTML;
            var pagecodelines = pagecode.split("\n");
	
            var lb = Math.max(errline-15,1);
            var ub = Math.min(errline+5,pagecodelines.length);
            var pagenumlen = ub.toString().length;
            for (x = lb; x <= ub; x++) 
                codesnip += '' + ((x.toString().length < pagenumlen)?'0':'') + x.toString() + "\t" + pagecodelines[x-1] + "\n";
        }
			
        var req = window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
        var params = 'codesnip='+encodeURIComponent(codesnip);
        req.open('POST', 'jserror.php', true);
        req.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        req.setRequestHeader('Content-length', params.length);
        req.send(params);
 
    } catch (e) {
    // nothing
    }
	
    return false;
}
		
