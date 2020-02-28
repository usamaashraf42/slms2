// Uses CommonJS, AMD or browser globals to create a jQuery plugin.
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        // Node/CommonJS
        module.exports = function (root, jQuery) {
            if (jQuery === undefined) {
                // require('jQuery') returns a factory that requires window to
                // build a jQuery instance, we normalize how we use modules
                // that require this pattern but the window provided is a noop
                // if it's defined (how jquery works)
                if (typeof window !== 'undefined') {
                    jQuery = require('jquery');
                }
                else {
                    jQuery = require('jquery')(root);
                }
            }
            factory(jQuery);
            return jQuery;
        };
    } else {
        // Browser globals
        factory(jQ171 || jQuery);
    }
}(function ($) {
    // OVERRIDES MICROSOFTS BUILT IN VALDATION CODE.
    // REMOVES THE window.scrollTo(0, 0) LINE OF CODE THAT CAN BE ANNOYING;
    // ALWAYS PLACE THIS FILE AT THE BOTTOM OF YOUR CODE.
    eval(function (p, a, c, k, e, r) { e = function (c) { return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36)) }; if (!''.replace(/^/, String)) { while (c--) r[e(c)] = k[c] || e(c); k = [function (e) { return r[e] }]; e = function () { return '\\w+' }; c = 1 }; while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]); return p }('u v(a){1(7(9)=="w")x;d b,2,s;d c,3,4,5,6;k(2=0;2<9.l;2++){b=9[2];b.m.n="y";1(!z&&A(b,a)){d i;1(b.B!="C"){b.m.n="";1(7(b.e)!="f"){b.e="o"}D(b.e){g"E":c="<h>";3="";4="";5="<h>";6="";j;g"o":F:c="";3="<p>";4="<q>";5="</q>";6="</p>";j;g"G":c=" ";3="";4="";5=" ";6="<h>";j}s="";1(7(b.r)=="f"){s+=b.r+c}s+=3;k(i=0;i<8.l;i++){1(!8[i].H&&7(8[i].t)=="f"){s+=4+8[i].t+5}}s+=6;b.I=s}}}}', 45, 45, '|if|sums|first|pre|post|end|typeof|Page_Validators|Page_ValidationSummaries||||var|displaymode|string|case|br||break|for|length|style|display|BulletList|ul|li|headertext||errormessage|function|__ValidationSummaryOnSubmit|undefined|return|none|Page_IsValid|IsValidationGroupMatch|showsummary|False|switch|List|default|SingleParagraph|isvalid|innerHTML'.split('|'), 0, {}))

    $(document).ready(function () {
        ValidationSummaryOnSubmit = __ValidationSummaryOnSubmit;
    });
}));