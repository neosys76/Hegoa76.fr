var InteractiveMap_index = (function () {
    
    var View = function (settings) {
        this.handlerStartDrag = page.events.handler(this.startDrag, this);
        this.handlerStopDrag = page.events.handler(this.stopDrag, this);
        this.handlerDrag = page.events.handler(this.drag, this);
        this.handlerZoom = page.events.handler(this.zoom, this);
        
        this.longitude = 0;
        this.latitude = 0;
        
        this.startDragX = 0;
        this.startDragY = 0;
        
        this.startDragLongitude = 0;
        this.startDragLatitude = 0;

        this.sectionDirectory = '/';
        
        this.panels = [];
        this.panelSelected = 0;

        this.element = null;
        
        this.layer = null;
        this.layerHash = null;
        this.layerOld = null;
        
        this.applySettings(settings || {});
    };
    
    View.prototype.applySettings = function (settings) {
        if ('section-directory' in settings) {
            this.sectionDirectory = settings['section-directory'];
        }
        if ('panels' in settings) {
            this.panels = settings['panels'];
        }
    };
    
    View.prototype.attach = function (element) {
        if (this.element !== null) {
            throw new Error('Al ready attach');
        }
        this.element = element;
        this.element.style.position = 'relative';
        page.events.bind(this.element, 'mousedown', this.handlerStartDrag);
        page.events.bind(this.element, 'mousewheel', this.handlerZoom);
        
        this.layer = this.createLayerElement();
        this.element.appendChild(this.layer);
        
        this.update();
    };
    
    View.prototype.createLayerElement = function () {
        var layer = document.createElement('DIV');
        layer.setAttribute('style', 'background: #ccc; position: absolute; width: 5px; height: 5px;');
        return layer;
    };
    
    View.prototype.startDrag = function (event) {
        page.events.bind(window, 'mousemove', this.handlerDrag);
        page.events.bind(window, 'mouseup', this.handlerStopDrag);
        
        this.startDragLongitude = this.longitude;
        this.startDragLatitude = this.latitude;
        
        this.startDragX = event.screenX;
        this.startDragY = event.screenY;
    };

    View.prototype.zoom = function (event) {
        page.events.cancelDefault(event);
        
        var panelOldSelected = this.panelSelected;

        if (event.wheelDelta > 0) {
            this.panelSelected++;
            if (this.panelSelected >= this.panels.length) {
                this.panelSelected = this.panels.length - 1;
            }
        } else {
            this.panelSelected--;
            if (this.panelSelected < 0) {
                this.panelSelected = 0;
            }
        }
        
        if (panelOldSelected !== this.panelSelected) {
        
            var pos = this.panels[panelOldSelected]['tile-size'],
            ps = this.panels[this.panelSelected]['tile-size'];
        
            var ratioX = ps.width / pos.width,
            ratioY = ps.height / pos.height;

            var p = page.position(this.element);
        
        
        
            var c = this.getCenter();
        
            this.setCenter(
                (c.longitude + (event.clientX - p.clientX - (this.element.clientWidth / 2))) * ratioX,
                (c.latitude - (event.clientY - p.clientY - (this.element.clientHeight / 2))) * ratioY
                );
        }
    };
    
    View.prototype.setCenter = function (longitude, latitude) {
        this.longitude = longitude - (this.element.clientWidth / 2);
        this.latitude = latitude - (this.element.clientHeight / 2);
        
        this.update(true);
    };
    
    View.prototype.getCenter = function () {
        return {
            longitude: this.longitude + (this.element.clientWidth / 2),
            latitude: this.latitude + (this.element.clientHeight / 2)
        };
    };
    
    View.prototype.stopDrag = function (event) {
        try {
            this.element.removeChild(this.layerOld);
        } catch (e) {
        }
        page.events.unbind(window, 'mousemove', this.handlerDrag);
        page.events.unbind(window, 'mouseup', this.handlerStopDrag);
    };
    
    View.prototype.drag = function (event) {
        this.longitude = this.startDragLongitude + this.startDragX - event.screenX;
        this.latitude = this.startDragLatitude - (this.startDragY - event.screenY);
        
        this.update();
    };

    View.prototype.createSectionElement = function (x, y) {
        var panel = this.panels[this.panelSelected];
        var sw = panel['section-size'].width;
        var sh = panel['section-size'].height;
        var tw = panel['tile-size'].width;
        var th = panel['tile-size'].height;
        
        var section = document.createElement('DIV');
        var t = (y + sh) / th,
        b = y / th,
        l = x / tw,
        r = (x + sw) / tw;
        
        console.debug(y);

        var image = this.sectionDirectory+'/'+
        panel['name']+'/'+
        r.toString(36)+','+
        t.toString(36)+','+
        l.toString(36)+','+
        b.toString(36)+'.png'
        section.setAttribute('style', 'background:url('+image+'); left:'+x+'px; bottom:'+y+'px; position:absolute; width:'+sw+'px; height:'+sh+'px;');
        return section;
    };
    
    View.prototype.update = function (force_update) {
        var panel = this.panels[this.panelSelected];
        var sw = panel['section-size'].width;
        var sh = panel['section-size'].height;
        
        var t = Math.ceil((this.latitude + this.element.clientHeight) / sh) * sh,
        b = Math.floor(this.latitude / sh) * sh,
        l = Math.floor(this.longitude / sw) * sw,
        r = Math.ceil((this.longitude  + this.element.clientWidth) / sw) * sw;
        
        this.layer.style.bottom = - this.latitude + 'px';
        this.layer.style.left = - this.longitude + 'px';
        
        var layerHash = t+':'+r+':'+b+':'+l;
        
        if (force_update || this.layerHash !== layerHash) {
            var i = 0, li = (t - b) / sh;
            var j = 0, lj = (r - l) / sw;
            
            this.layerHash = layerHash;
            this.layer.innerHTML = '';
            for (i = 0; i < li; i++) {
                for (j = 0; j < lj; j++) {
                    console.debug(b, i, sw);
                    var s = this.createSectionElement(l + (j * sw), b + (i * sh));
                    if (s) {
                        this.layer.appendChild(s);
                    }
                }
            }
        }
    };
    
    return function (settings) {
        settings = settings || {}

        var map = new View({
            'section-directory' : settings['section-directory'],
            'panels' : settings['panels']
        });
        map.attach(page.element('#interactive-map'));
        
        map.setCenter(0,0);
        
    };
})();