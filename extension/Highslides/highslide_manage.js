// JavaScript Document

//Highslides ////
    
hs.Expander.prototype.printHtml = function ()
{
    var pw = window.open("about:blank", "_new");
    pw.document.open();
    pw.document.write(this.getHtmlPrintPage());
    pw.document.close();
    return false;
};
hs.Expander.prototype.getHtmlPrintPage = function()
{
    // We break the closing script tag in half to prevent
    // the HTML parser from seeing it as a part of
    // the *main* page.
    var body = hs.getElementByClass(this.innerContent, 'DIV', 'highslide-body') 
        || this.innerContent;

    return "<html>\n" +
        "<head>\n" +
        "<title>Newsletter View Window</title>\n" +
        "<script>\n" +"function step1() {\n" +
        "  setTimeout('step2()', 10);\n" +
        "}\n" +
        "function step2() {\n" +
        "  window.print();\n" +
        "  window.close();\n" +
        "}\n" +
        "</scr" + "ipt>\n" +
        "</head>\n" +
        "<body onLoad='step1()'>\n" +
        body.innerHTML +
        "</body>\n" +
        "</html>\n";
};