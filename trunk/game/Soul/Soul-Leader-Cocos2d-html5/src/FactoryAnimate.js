var FactoryAnimate = cc.Class.extend({
    init: function () {
        return true;
    },
    createAnimate: function (_plist, _spriteFrameName, _numberFrames, _animationTime) {
        cc.SpriteFrameCache.getInstance().addSpriteFrames(_plist);
        var animFrames = [];
        var str = "";
        for (var i = 1; i < _numberFrames; i++) {
            str = _spriteFrameName + (i < 10 ? ("0" + i) : i) + ".png";
            var frame = cc.SpriteFrameCache.getInstance().getSpriteFrame(str);
            animFrames.push(frame);
        }
        var animation = cc.Animation.create(animFrames, _animationTime);
        var animate = cc.Animate.create(animation);
        return animate;
    },
    createAnimateWithArray: function (_plist, _spriteFrameName, _arrayFrames, _animationTime) {
        cc.SpriteFrameCache.getInstance().addSpriteFrames(_plist);
        var animFrames = [];
        var str = "";
        for (var i = 0; i < _arrayFrames.length; i++) {
            str = _spriteFrameName + (_arrayFrames[i] < 10 ? ("0" + _arrayFrames[i]) : _arrayFrames[i]) + ".png";
            var frame = cc.SpriteFrameCache.getInstance().getSpriteFrame(str);
            animFrames.push(frame);
        }
        var animation = cc.Animation.create(animFrames, _animationTime);
        var animate = cc.Animate.create(animation);
        return animate;
    }
});

FactoryAnimate.getInstance = function () {
    cc.Assert(this._pInstance, "@@");
    if (!this._pInstance) {
        this._pInstance = new FactoryAnimate();
        if (this._pInstance.init()) {
            return this._pInstance;
        }
    } else {
        return this._pInstance;
    }
    return null;
};

FactoryAnimate._pInstance = null;