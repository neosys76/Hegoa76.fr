var LibertribesWorldBundle = LibertribesWorldBundle || {};
LibertribesWorldBundle.InteractiveMap = LibertribesWorldBundle.InteractiveMap || {};

LibertribesWorldBundle.InteractiveMap.index = (function () {

    var View = LibertribesWorldBundle.View;
    var BoxSize = LibertribesWorldBundle.BoxSize;
    var TilePanel = LibertribesWorldBundle.TilePanel;

    function main (settings) {
        settings = settings || {}
        var panels = [];
        for (i in settings['panels']) {
            var panel = settings['panels'][i];
            panels.push(new TilePanel(
                panel['name'],
                settings['section-directory'],
                new BoxSize(
                    panel['section-size']['width'],
                    panel['section-size']['height']
                    ),
                new BoxSize(
                    panel['tile-size']['width'],
                    panel['tile-size']['height']
                    )
                ));
        }
        var map = new View(panels);
        map.appendTo(page.element('#interactive-map'), 0,0);
    };
    
    return main;
})();