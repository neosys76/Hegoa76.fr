var LibertribesWorldBundle = LibertribesWorldBundle || {};

LibertribesWorldBundle.TilePanel = (function () {
    var TilePanel = function (name, section_directory, section_size, tile_size) {
        this.mName = name;
        this.mSectionSize = section_size;
        this.mTileSize = tile_size;
        this.mSectionDirectory = section_directory;
    };
    
    TilePanel.prototype.getName = function () {
        return this.mName;
    };
    
    TilePanel.prototype.getSectionSize = function () {
        return this.mSectionSize;
    };
    
    TilePanel.prototype.getTileSize = function () {
        return this.mTileSize;
    };
    
    TilePanel.prototype.getSectionPath = function (x, y) {
        if (x < 0 || y < 0) {
            return null;
        }
        return this.mSectionDirectory + '/' + this.mName+'/'+ x.toString(36)+'_'+ y.toString(36)+'.png';
    };
    
    return TilePanel;
})();
