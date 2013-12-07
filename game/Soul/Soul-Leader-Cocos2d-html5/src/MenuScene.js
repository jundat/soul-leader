var Menu = cc.LayerColor.extend({
    init: function () {
        this._super(new cc.Color4B(0, 0, 0, 255));
        var size = cc.Director.getInstance().getWinSize();
        //this.setTouchEnabled(true);
        //this.schedule(this.update);

        this.m_sBG = cc.Sprite.create(s_tMenuBackground);
        this.m_sBG.setPosition(cc.p(size.width / 2, size.height / 2));
        this.m_sBG.setAnchorPoint(cc.p(0.5, 0.5));
        this.addChild(this.m_sBG);

        var menuItem = cc.MenuItemImage.create(
            s_tPlay,
            s_tPlaySelected,
            function () {
                cc.Director.getInstance().replaceScene(new MainGameScene());
            },
            this);

        menuItem.setAnchorPoint(cc.p(0.5, 0.5));
        menuItem.setPosition(cc.p(687, 668-298));

        var menu = cc.Menu.create(menuItem);
        menu.setPosition(cc.PointZero());
        this.addChild(menu, 1);

        return true;
    }
});

var MenuScene = cc.Scene.extend({
    onEnter: function () {
        this._super();
        var layer = new Menu();
        layer.init();
        this.addChild(layer);
    }
});