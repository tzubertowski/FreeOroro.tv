// ==UserScript==
// @name         frororo, ororo.tv unlimited
// @namespace    http://zadnychlag.blogspot.com
// @version      0.1
// @description  This user script allows you to watch ororo.tv for unlimited time.
// @author       tzubertowski
// @downloadURL  https://github.com/tzubertowski/FreeOroro.tv/raw/master/unlimitedOro.user.js
// @match        http://ororo.tv/*/shows/*
// @match        http://*.ororo.tv/uploads/video/file/*
// ==/UserScript==


// Modified ajax XHR interceptor, thanks to http://stackoverflow.com/questions/5202296/add-a-hook-to-all-ajax-requests-on-a-page

// Used to redirect to rendering
var baseUrl = 'http://vps180892.ovh.net/FreeOroro.tv/gibit/index.php';
var pathUrl;

// Vid url from player rather than from request
document.addEventListener("DOMNodeInserted", function(e) {
    var videoBeforeRedirect = document.getElementsByClassName('vjs-tech');
    if(typeof videoBeforeRedirect  !== 'undefined' && videoBeforeRedirect.length > 0) {
       pathUrl = videoBeforeRedirect[0].src
    }
}, false);

// Try fetching english subs, if didn't fetch -> go without them
// Intercepting XMLHttpRequest that comes from ororo.tv js player
// Sadly srt url is generated based on DB data, which means I cannot simply generate it
(function(open) {
    XMLHttpRequest.prototype.open = function() {
        this.addEventListener("readystatechange", function() {
            var res = this.responseURL;
            if(res.match(/(http(s?):)|([\/|.|\w|\s])*\.(?:srt)/g)) {
                if(pathUrl) {
                	location.replace(baseUrl+'?subs='+res+'&vid='+pathUrl);
                } else {
	                console.log('Failed to fetch original vid url');
                }
            }
        }, false);
				// window.location.replace(pathUrl);
        open.apply(this, arguments);
    };
})(XMLHttpRequest.prototype.open);
