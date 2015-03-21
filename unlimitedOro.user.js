// ==UserScript==
// @name         ororo.tv unlimited
// @namespace    http://zadnychlag.blogspot.com
// @version      0.1
// @description  This user script allows you to watch ororo.tv for free, unlimited.
// @author       tzubertowski
// @match        http://ororo.tv/pl/shows/*
// @match        http://*.ororo.tv/uploads/video/file/*
// ==/UserScript==
var vid = document.getElementsByName("media");
if(typeof vid  !== 'undefined' && vid.length > 0) {
	vid[0].style.height = '100%';
	console.log('lel');
}

document.addEventListener("DOMNodeInserted", function(e) {
    var videoBeforeRedirect = document.getElementsByClassName('vjs-tech');
    if(typeof videoBeforeRedirect  !== 'undefined' && videoBeforeRedirect.length > 0) {
       var pathUrl = videoBeforeRedirect[0].src
       window.location.replace(pathUrl);     
    }
}, false);