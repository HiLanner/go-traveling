window.onload=function(){highLightPage()};
function highLightPage() {
  if (!document.getElementsByTagName) return false;
  if (!document.getElementById) return false;  
  var headers = document.getElementsByTagName('header');
  if (headers.length == 0) return false;
  var navs = headers[0].getElementsByTagName('nav');
  if (navs.length == 0) return false;
  var links = navs[0].getElementsByTagName("a");
  for (var i=0; i<links.length; i++) {
      var linkurl;
      for (var j=0; j<links.length; i++) {
        linkurl = links[i].getAttribute("href");
        if (window.location.href.indexOf(linkurl) != -1) {
          links[i].className = "here";
           var linktext = links[i].lastChild.nodeValue.toLowerCase();
           document.body.setAttribute("id",linktext);
        }
      }
  }
}