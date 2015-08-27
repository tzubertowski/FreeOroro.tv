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
var subsUrl;

// Prepare frororo functional buttons
$( document ).ready( function() {
    $('<style>#notification{z-index:10000;transition:opacity .8s}#notification.hidden{opacity:0}:not(button){margin:0;padding:0}#notification{position:relative;width:410px;margin:120px auto 0;padding:14px 0;border:1px solid #eee;background:#fafafa}#notification p{font:500 13px "helvetica neue",helvetica,arial,sans-serif;text-align:center;color:#1A3547}#frobuttons{margin:0 auto;width:150px;padding-top:10px}#frobuttons button{background-color:#E6E6E6;padding:.5em 1em;border:0 rgba(0,0,0,0)}#notification strong{font-size:16px;font-family:sans-serif}</style>').appendTo("head");
    $('<div id="notification"> <p><strong>Free ororo</strong></p> <div id="frobuttons"> <button id="withoutfro">No subs</button> <button id="withfro">Subs</button> </div></div>').prependTo('body');
    $('#notification').hide();
} );



// Vid url from player rather than from request
document.addEventListener("DOMNodeInserted", function(e) {
    var videoBeforeRedirect = document.getElementsByClassName('vjs-tech');
    if(typeof videoBeforeRedirect  !== 'undefined' && videoBeforeRedirect.length > 0) {
       pathUrl = videoBeforeRedirect[0].src
    }
console.log('ndoeinserted');
    // Show functional buttons when player loaded
    if($('#overlay').is(':visible')) {
        $('#notification').show();
    } else {
        $('#notification').hide();
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
                subsUrl = res;
            }
        }, false);
				// window.location.replace(pathUrl);
        open.apply(this, arguments);
    };
})(XMLHttpRequest.prototype.open);

$("#withoutfro").click( function() {
    if(pathUrl) {
        location.replace(pathUrl);
    }
}
);

$("#withfro").click( function() {
    if(pathUrl && subsUrl) {
        location.replace(baseUrl+'?subs='+subsUrl+'&vid='+pathUrl);
    } else {
        console.log('Failed to fetch original vid url');
    }
}
);
