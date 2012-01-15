var InteractiveMap_index = (function () {
    
    var Map = function (settings) {
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
        
        this.sectionsWidth = 512;
        this.sectionsHeight = 512;
        this.sectionsDirectory = '/';
        
        this.panels = [];
        this.panelSelected = 0;

        this.tilesHeight = 16;
        this.tilesWidth = 16;
        
        this.element = null;
        
        this.layer = null;
        this.layerHash = null;
        this.layerOld = null;
        
        this.applySettings(settings || {});
    };
    
    Map.prototype.applySettings = function (settings) {
        if ('sections-width' in settings) {
            this.sectionsWidth = settings['sections-width'];
        }
        if ('sections-height' in settings) {
            this.sectionsHeight = settings['sections-height'];
        }
        if ('sections-directory' in settings) {
            this.sectionsDirectory = settings['sections-directory'];
        }
        if ('panels' in settings) {
            this.panels = settings['panels'];
        }
    };
    
    Map.prototype.attach = function (element) {
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
    
    Map.prototype.createLayerElement = function () {
        var layer = document.createElement('DIV');
        layer.setAttribute('style', 'background: #ccc; position: absolute; width: 5px; height: 5px;');
        return layer;
    };
    
    Map.prototype.startDrag = function (event) {
        page.events.bind(window, 'mousemove', this.handlerDrag);
        page.events.bind(window, 'mouseup', this.handlerStopDrag);
        
        this.startDragLongitude = this.longitude;
        this.startDragLatitude = this.latitude;
        
        this.startDragX = event.screenX;
        this.startDragY = event.screenY;
    };

    Map.prototype.zoom = function (event) {
        page.events.cancelDefault(event);
        
        var panelOldSelected = this.panelSelected;

        if (event.wheelDeltaY > 0) {
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
        
            var pos = this.panels[panelOldSelected],
            ps = this.panels[this.panelSelected];
        
            var ratioX = ps['tiles-width'] / pos['tiles-width'],
            ratioY = ps['tiles-height'] / pos['tiles-height'];

            var p = page.position(this.element);
        
        
        
            var c = this.getCenter();
        
            this.setCenter(
                (c.longitude + (event.clientX - p.clientX - (this.element.clientWidth / 2))) * ratioX,
                (c.latitude - (event.clientY - p.clientY - (this.element.clientHeight / 2))) * ratioY
                );
        }
    };
    
    Map.prototype.setCenter = function (longitude, latitude) {
        this.longitude = longitude - (this.element.clientWidth / 2);
        this.latitude = latitude - (this.element.clientHeight / 2);
        
        this.update(true);
    };
    
    Map.prototype.getCenter = function () {
        return {
            longitude: this.longitude + (this.element.clientWidth / 2),
            latitude: this.latitude + (this.element.clientHeight / 2)
        };
    };
    
    Map.prototype.stopDrag = function (event) {
        try {
            this.element.removeChild(this.layerOld);
        } catch (e) {
        }
        page.events.unbind(window, 'mousemove', this.handlerDrag);
        page.events.unbind(window, 'mouseup', this.handlerStopDrag);
    };
    
    Map.prototype.drag = function (event) {
        this.longitude = this.startDragLongitude + this.startDragX - event.screenX;
        this.latitude = this.startDragLatitude - (this.startDragY - event.screenY);
        
        this.update();
    };

    Map.prototype.createSectionElement = function (x, y) {
        var panel = this.panels[this.panelSelected];
        var section = document.createElement('DIV');
        var t = (y + this.sectionsHeight) / panel['tiles-height'],
        b = y / panel['tiles-height'],
        l = x / panel['tiles-width'],
        r = (x + this.sectionsWidth) / panel['tiles-width'];

        var image = this.sectionsDirectory+'/'+
        panel['name']+'/'+
        r.toString(36)+','+
        t.toString(36)+','+
        l.toString(36)+','+
        b.toString(36)+'.png'
        section.setAttribute('style', 'background: url('+image+'); left: '+x+'px; bottom: '+y+'px; position: absolute; width: '+this.sectionsWidth+'px; height: '+this.sectionsHeight+'px;');
        return section;
    };
    
    Map.prototype.update = function (force_update) {
        var t = Math.ceil((this.latitude + this.element.clientHeight) / this.sectionsHeight) * this.sectionsHeight,
        b = Math.floor(this.latitude / this.sectionsHeight) * this.sectionsHeight,
        l = Math.floor(this.longitude / this.sectionsWidth) * this.sectionsWidth,
        r = Math.ceil((this.longitude  + this.element.clientWidth) / this.sectionsWidth) * this.sectionsWidth;
        
        var h = t - b, w = r - l;
        
        var sh = h / this.sectionsHeight;
        var sw = w / this.sectionsWidth;
        
        var layerHash = t+':'+r+':'+b+':'+l;
        
        this.layer.style.bottom = - this.latitude + 'px';
        this.layer.style.left = - this.longitude + 'px';
        
        if (force_update || this.layerHash !== layerHash) {
            this.layerHash = layerHash;
            this.layer.innerHTML = '';
            for (var i = 0; i < sh; i++) {
                for (var j = 0; j < sw; j++) {
                    var s = this.createSectionElement(l + (j * this.sectionsWidth), b + (i * this.sectionsHeight));
                    if (s) {
                        this.layer.appendChild(s);
                    }
                }
            }
        }
    /*       
        page.element('#javascript-debug-console').innerHTML = 
        '<pre>t:'+t+', b:'+b+', l:'+l+', r:'+r+'</pre>' +
        '<pre>sw:'+sw+', sh:'+sh+'</pre>' +
        '<pre>w:'+w+', h:'+h+'</pre>' +
        '<pre>lo:'+this.longitude+', la:'+this.latitude+'</pre>';
*/
    };
    
    return function (settings) {
        settings = settings || {}

        var map = new Map({
            'sections-width' : settings['sections-width'],
            'sections-height' : settings['sections-height'],
            'sections-directory' : settings['sections-directory'],
            'panels' : settings['panels']
        });
        map.attach(page.element('#interactive-map'));
        
        map.setCenter(0,0);
        
        var c = map.getCenter();
        
        console.debug(c.longitude, c.latitude);
        
    };
})();