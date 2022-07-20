var url = 'pages/page.html';
var url = 'dajs.html';

var el = document.getElementById('ifrm');
el.src = url; // assign url to src property
var el = document.getElementById('ifrm');
el.src = url; // assign url to src property
window.frames['ifrm'].location = url;
window.frames['ifrm'].location.replace(url);


function setIframeSrc(id, url) {
    document.getElementById(id).src = url;
}

function setIframeLoc(nm, url) {
    window.frames[nm].location = url;
}

function replaceIframeURL(nm, url) {
    window.frames[nm].location.replace(url);
}
var ifrm = document.createElement('iframe');
ifrm.setAttribute('id', 'ifrm'); // assign an id

document.body.appendChild(ifrm); 

// to place before another page element
var el = document.getElementById('marker');
el.parentNode.insertBefore(ifrm, el);

// assign url
ifrm.setAttribute('src', 'demo.html');



 

 


 
 


    


    


