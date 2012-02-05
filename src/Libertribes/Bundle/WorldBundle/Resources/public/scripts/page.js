var page = (function () {
    
    var Browser = function () {
        var agent = navigator.userAgent.toLowerCase();
        this.version = (agent.match( /.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1];
        this.webkit = /webkit/.test( agent );
        this.opera = /opera/.test( agent );
        this.msie = /msie/.test( agent ) && !/opera/.test( agent );
        this.gecko = /mozilla/.test( agent ) && !/(compatible|webkit)/.test( agent );
        this.name = navigator.appName.toLowerCase();
    };
    var browser = new Browser();
    
    var EventHandler = function (closure, context){
        this.closure = closure;  
        this.context = context;
    };

    EventHandler.prototype.handleEvent = function (event) {
        //+fix gecko
        if (browser.gecko && event.type === 'DOMMouseScroll') {
            event.wheelDelta = event.detail;
            event.wheelDeltaX = (event.axis == event.HORIZONTAL_AXIS)?event.detail:0;
            event.wheelDeltaY = (event.axis == event.VERTICAL_AXIS)?event.detail:0;
            event.wheelDeltaZ = 0;
        }
        //-fix gecko
        this.closure.call(this.context, event);
    };

    EventHandler.prototype.bind = function (element, type) {
        //+fix gecko
        if (browser.gecko && type === 'mousewheel') {
            type = 'DOMMouseScroll';
        }
        //-fix gecko
        element.addEventListener(type, this, false);
        return this;
    };

    EventHandler.prototype.unbind = function (element, type) {
        //+fix gecko
        if (browser.gecko && type === 'mousewheel') {
            type = 'DOMMouseScroll';
        }
        //-fix gecko
        element.removeEventListener(type, this, false);
        return this;
    };
    

    
    var Page = function () {
        this.browser = browser; 
    };
    
    Page.prototype.handler = function (closure, context) {
        return new EventHandler(closure, context);
    };
    
    Page.prototype.cancel = function (event) {
        event.preventDefault(event);
    };
    
    /**
     * 
     * @param selector string
     * @param parent Element|null
     * @return Element
     */
    Page.prototype.element = function (selector, parent) {
        return (parent || document).querySelector(selector);
    };
    
    /**
     * 
     * @param selector string
     * @param parent Element|null
     * @return NodeList
     */
    Page.prototype.elements = function (selector, parent) {
        return (parent || document).querySelectorAll(selector);
    };
    
    Page.prototype.position = function (element) {
        var l = 0, t = 0, o = element;
        do {
                l += o.offsetLeft;
                t += o.offsetTop;
                if (o.offsetParent) {
                    l -= o.offsetParent.scrollLeft;
                    t -= o.offsetParent.scrollTop;
                }
        } while (o = o.offsetParent);
        return {
            clientX: l, 
            clientY: t
        };
    };
    
    return new Page();
})()

