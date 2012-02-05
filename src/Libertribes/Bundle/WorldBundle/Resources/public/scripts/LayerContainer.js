var LibertribesWorldBundle = LibertribesWorldBundle || {};

LibertribesWorldBundle.LayerContainer = (function () {

    var LayerContainer = function () {
        this.mElement = null;
        
        this.mTop = null;
        this.mRight = null;
        this.mBottom = null;
        this.mLeft = null;
        
        this.mLayers = [];
        this.mLayersElement = [];        
    };
    
    LayerContainer.prototype.appendLayer = function (layer) {
        this.mLayers.push(layer);
        this.mLayersElement.push(null);
    };

    LayerContainer.prototype.updateLayers = function (panel, t, r, b, l) {
        var i, layer, element;
        for (i in this.mLayers) {
            layer = this.mLayers[i];
            element = document.createElement('DIV');
            element.setAttribute('style', 'position: absolute; bottom: '+b+'px; left: '+l+'px; width: '+(r - l)+'px; height: '+(t - b)+'px;');

            layer.handleUpdate(element, panel, t, r, b, l);

            this.mElement.appendChild(element);
            (function (p, e) {
                window.setTimeout(function () {
                    if (p && e) {
                        p.removeChild(e);
                    }
                }, 100);
            })(this.mElement, this.mLayersElement[i]);
            this.mLayersElement[i] = element;
        }
    };
    
    LayerContainer.prototype.setViewport = function (panel, t, r, b, l) {
        var sw = panel.getSectionSize().getWidth(),
            sh = panel.getSectionSize().getHeight();

        this.mElement.style.bottom = (-b) + 'px';
        this.mElement.style.left = (-l) + 'px';
        
        t = Math.ceil(t / sh) * sh,
        r = Math.ceil(r / sw) * sw,
        b = Math.floor(b / sh) * sh,
        l = Math.floor(l / sw) * sw;
        
        if (this.mTop == t && this.mRight == r && this.mBottom == b && this.mLeft == l) {
            return;
        }

        this.mTop = t;
        this.mRight = r;
        this.mBottom = b;
        this.mLeft = l;

        this.updateLayers(panel, t, r, b, l);
    };
    
    LayerContainer.prototype.appendTo = function (parent) {
        var element = document.createElement('DIV');
        element.setAttribute('style', 'position: absolute; width: 0px; height: 0px;');
        this.mElement = element;
        parent.appendChild(this.mElement);
    };
    
    return LayerContainer;
})();


