
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
var gravShortcodeGptQueue = gravShortcodeGptQueue || [];

$(function () {
    // on ready, load google code
    var gads = document.createElement('script');
    gads.async = true;
    gads.type = 'text/javascript';
    var useSSL = 'https:' === document.location.protocol;
    gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
    var node = document.getElementsByTagName('script')[0];
    node.parentNode.insertBefore(gads, node);

    googletag.cmd.push(function () {
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();

        // and then display queued ads
        var queueLength = gravShortcodeGptQueue.length;
        for (var i = 0; i < queueLength; i++) {
            googletag.display(gravShortcodeGptQueue[i]);
        }
    });
});