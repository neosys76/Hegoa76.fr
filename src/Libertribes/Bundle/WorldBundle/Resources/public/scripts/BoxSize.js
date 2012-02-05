var LibertribesWorldBundle = LibertribesWorldBundle || {};

LibertribesWorldBundle.BoxSize = (function () {
    var BoxSize = function (w, h) {
        this.mWidth = w;
        this.mHeight = h;
    };
    BoxSize.prototype.getWidth = function () {return this.mWidth;};
    BoxSize.prototype.getHeight = function () {return this.mHeight;};
    
    return BoxSize;
})();


