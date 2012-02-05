var LibertribesWorldBundle = LibertribesWorldBundle || {};

LibertribesWorldBundle.View = (function () {
    
    var LayerContainer = LibertribesWorldBundle.LayerContainer;
    var MapLayer = LibertribesWorldBundle.MapLayer;
    
    var View = function (panels) {
        this.mPanels = panels;

        this.mLeft = 0;
        this.mBottom = 0;
        
        this.mStartDragX = 0;
        this.mStartDragY = 0;
        
        this.mStartDragLeft = 0;
        this.mStartDragBottom = 0;

        this.mPanelSelected = 0;

        this.mElement = null;
        
        this.mLayerContainer = new LayerContainer();
        this.mLayerContainer.appendLayer(new MapLayer());
        
        this.mHandlerStartDrag = page.handler(this.startDrag, this);
        this.mHandlerStopDrag = page.handler(this.stopDrag, this);
        this.mHandlerDrag = page.handler(this.drag, this);
        this.mHandlerZoom = page.handler(this.zoom, this);
        this.mHandlerClick = page.handler(this.click, this);
        this.mHandlerResize = page.handler(this.resize, this);
    };
    
    View.prototype.resize = function (event){
        this.updateViewport();
    };
    
    View.prototype.appendTo = function (parent, x, y) {
        this.mElement = document.createElement('DIV');
        this.mElement.setAttribute('style', 'position: relative; width: 0px; height: 0px; width: 100%; height: 100%;');

        parent.appendChild(this.mElement);
        
        this.mHandlerStartDrag.bind(this.mElement, 'mousedown');
        this.mHandlerZoom.bind(this.mElement, 'mousewheel');
        this.mHandlerClick.bind(this.mElement, 'click');
        this.mHandlerResize.bind(window, 'resize');

        this.mLayerContainer.appendTo(this.mElement);
        
        this.setCenter(x, y);
    };
    
    View.prototype.click = function (event) {
        var p = page.position(this.mElement);
        var x = event.clientX - p.clientX;
        var y = this.mElement.clientWidth - (event.clientY - p.clientY);
        var ts = this.mPanels[this.mPanelSelected].getTileSize();
        var tw = ts.getWidth();
        var th = ts.getHeight();
        
        x = Math.floor((x + this.mLeft) / tw);
        y = Math.floor((y + this.mBottom) / th);
        
        alert(x + ', '+ y);
    };
    
    View.prototype.startDrag = function (event) {
        this.mHandlerDrag.bind(window, 'mousemove');
        this.mHandlerStopDrag.bind(window, 'mouseup');
        
        this.mStartDragLeft = this.mLeft;
        this.mStartDragBottom = this.mBottom;
        
        this.mStartDragX = event.screenX;
        this.mStartDragY = event.screenY;
    };

    View.prototype.zoom = function (event) {
        page.cancel(event);
        
        var panelOldSelected = this.mPanelSelected;

        if (event.wheelDelta > 0) {
            this.mPanelSelected++;
            if (this.mPanelSelected >= this.mPanels.length) {
                this.mPanelSelected = this.mPanels.length - 1;
            }
        } else {
            this.mPanelSelected--;
            if (this.mPanelSelected < 0) {
                this.mPanelSelected = 0;
            }
        }
        
        if (panelOldSelected !== this.mPanelSelected) {
        
            var pos = this.mPanels[panelOldSelected].getTileSize(),
            ps = this.mPanels[this.mPanelSelected].getTileSize();
        
            var ratioX = ps.getWidth() / pos.getWidth(),
            ratioY = ps.getHeight() / pos.getHeight();

            var p = page.position(this.mElement);
            var c = this.getCenter();
            this.setCenter(
                (c.x + (event.clientX - p.clientX - (this.mElement.clientWidth / 2))) * ratioX,
                (c.y - (event.clientY - p.clientY - (this.mElement.clientHeight / 2))) * ratioY
                );
        }
    };

    View.prototype.setCenter = function (x, y) {
        this.mLeft = x - (this.mElement.clientWidth / 2);
        this.mBottom = y - (this.mElement.clientHeight / 2);
        this.updateViewport();
    };
    
    View.prototype.getCenter = function () {
        return {
            x: this.mLeft + (this.mElement.clientWidth / 2),
            y: this.mBottom + (this.mElement.clientHeight / 2)
        };
    };
    
    View.prototype.stopDrag = function (event) {
        this.mHandlerDrag.unbind(window, 'mousemove');
        this.mHandlerStopDrag.unbind(window, 'mouseup');
    };
    
    View.prototype.drag = function (event) {
        this.mLeft = this.mStartDragLeft + this.mStartDragX - event.screenX;
        this.mBottom = this.mStartDragBottom - (this.mStartDragY - event.screenY);
        this.updateViewport();
    };

    View.prototype.updateViewport = function () {
        this.mLayerContainer.setViewport(
            this.mPanels[this.mPanelSelected],
            this.mBottom + this.mElement.clientHeight,
            this.mLeft  + this.mElement.clientWidth,
            this.mBottom,
            this.mLeft
         );
    };
  
    return View;
})();

