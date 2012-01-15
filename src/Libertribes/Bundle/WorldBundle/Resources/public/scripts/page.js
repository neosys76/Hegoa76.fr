var page = (function () {
    var undefined;
    
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
        element.addEventListener(type, handler, true);
    };

    /**
     * 
     * @param element Element
     * @param type string
     * @param listener EventListener
     */
    Events.prototype.unbind = function (element, type, handler) {
        element.removeEventListener(type, handler, true);
    };
    
    /**
     * @param event Event
     */
    Events.prototype.cancelDefault = function (event) {
        if (event.preventDefault) {
            event.preventDefault(event);
        }
        event.returnValue = false;
    };
    
    var Page = function () {
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

