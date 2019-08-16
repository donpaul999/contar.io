function alphanum(e) { var k; document.all ? k = e.keyCode : k = e.which; return ((k > 47 && k < 58) || (k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==13);}
function alphanumdash(e) { var k; document.all ? k = e.keyCode : k = e.which; return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k==13 || k == 45 || k == 32);}
