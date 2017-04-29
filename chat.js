function getContacts( ){
    // <!-- retreive old chat -->
    var xhttpInit;
    if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xhttpInit = new XMLHttpRequest();
    } else {
	// code for IE6, IE5
	xhttpInit = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xhttpInit.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	    text = "<bookstore><book>" +
		"<title>Everyday Italian</title>" +
		"<author>Giada De Laurentiis</author>" +
		"<year>2005</year>" +
		"</book></bookstore>";
	    
	    parser = new DOMParse( );
	    xmlDoc = parser.parseFromString(text, "text/xml");
	    document.getElementById( "contacts" ).innerHTML =
		xmlDoc.getElementsByTagName("title")[0].childNodes[0].nodeValue;;
	    
	}
    }
    
    xhttpInit.open("GET", "chatHistoryFetcher.php?who=<?php echo $who;?>&whom=<?php echo $whom;?>", true);
    xhttpInit.send();
    
}
