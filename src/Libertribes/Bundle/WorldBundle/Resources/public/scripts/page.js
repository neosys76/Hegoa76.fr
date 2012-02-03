var page = (function () {
    var undefined;
    
    var implementsEventsW3C = function () {
        
        var EventListenerProxy = function (closure, context){
            this.closure = closure;  
            this.context = context;
        };

        EventListenerProxy.prototype.handleEvent = function (event) {
            this.closure.call(this.context, event);
        };
        
        var Events = function () {};

        /**
         * 
         * @param closure Function
         * @param context Object
         * @return EventListener
         */
        Events.prototype.handler = function (closure, context) {
            return new EventListenerProxy(closure, context);
        };

        /**
         * 
         * @param element Element
         * @param type string
         * @param listener EventListener
         */
        Events.prototype.bind = function (element, type, handler) {
            element.addEventListener(type, handler, false);
        };

        /**
         * 
         * @param element Element
         * @param type string
         * @param listener EventListener
         */
        Events.prototype.unbind = function (element, type, handler) {
            element.removeEventListener(type, handler, false);
        };

        /**
         * @param event Event
         */
        Events.prototype.cancelDefault = function (event) {
            event.preventDefault(event);
        };
        
        return Events;
    };
    
        
    var implementsEventsGecko = function () {
        
        var EventListenerProxy = function (closure, context){
            this.closure = closure;  
            this.context = context;
        };

        EventListenerProxy.prototype.handleEvent = function (event) {
            if (event.type === 'DOMMouseScroll') {
                event.wheelDelta = event.detail;
                event.wheelDeltaX = (event.axis == event.HORIZONTAL_AXIS)?event.detail:0;
                event.wheelDeltaY = (event.axis == event.VERTICAL_AXIS)?event.detail:0;
                event.wheelDeltaZ = 0;
            }
            this.closure.call(this.context, event);
        };
        
        var Events = function () {};

        /**
         * 
         * @param closure Function
         * @param context Object
         * @return EventListener
         */
        Events.prototype.handler = function (closure, context) {
            return new EventListenerProxy(closure, context);
        };

        /**
         * 
         * @param element Element
         * @param type string
         * @param listener EventListener
         */
        Events.prototype.bind = function (element, type, handler) {
            if (type === 'mousewheel') {
                type = 'DOMMouseScroll';
            }
            element.addEventListener(type, handler, false);
        };

        /**
         * 
         * @param element Element
         * @param type string
         * @param listener EventListener
         */
        Events.prototype.unbind = function (element, type, handler) {
            if (type === 'mousewheel') {
                type = 'DOMMouseScroll';
            }
            element.removeEventListener(type, handler, false);
        };

        /**
         * @param event Event
         */
        Events.prototype.cancelDefault = function (event) {
            event.preventDefault(event);
        };
        
        return Events;
    };
    
    
    var Browser = function () {
        var agent = navigator.userAgent.toLowerCase();
        this.version = (agent.match( /.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1];
        this.webkit = /webkit/.test( agent );
        this.opera = /opera/.test( agent );
        this.msie = /msie/.test( agent ) && !/opera/.test( agent );
        this.gecko = /mozilla/.test( agent ) && !/(compatible|webkit)/.test( agent );
        this.name = navigator.appName.toLowerCase();
    };
    
    
    var Page = function () {
        var browser = new Browser();
        this.browser = browser; 
        
        var Events = null;
        if (browser.gecko) {
            Events = implementsEventsGecko();
        } else {
            Events = implementsEventsW3C();
        }
        
        this.events = new Events();
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

