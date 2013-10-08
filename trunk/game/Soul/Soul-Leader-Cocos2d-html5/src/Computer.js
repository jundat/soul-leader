var Computer = cc.Sprite.extend({
    m_fAngle: 0,
    m_computerBall: null,
    m_iHP: 10,
    ctor: function () {
        this._super();
        return true;
    },

    init: function (computerBall) {
        var size = cc.Director.getInstance().getWinSize();
        this.schedule(this.update);
        this.initWithFile(s_tPlayer);
        this.setAnchorPoint(cc.p(0.5, 0.5));
        this.m_computerBall = computerBall;
    },
    update: function (dt) {
    },
    fire: function (targetX, targetY, power) {
        var dx = targetX - this.getPosition().x;
        var dy = targetY - this.getPosition().y;
        this.m_fAngle = Math.atan2(dy, dx);
        var distance = Math.sqrt(dx * dx + dy * dy);
        var dirX = Math.cos(this.m_fAngle);
        var dirY = Math.sin(this.m_fAngle);

        //this.m_computerBall.initWithFile(s_tBallBlue);        

        var startX = this.getPosition().x + dirX * this.m_computerBall.m_width * 2;
        var startY = this.getPosition().y + dirY * this.m_computerBall.m_height * 2;

        this.m_computerBall.setVisible(true);
        this.m_computerBall.set(startX, startY, dirX, dirY, distance, power);
        var animate = FactoryAnimate.getInstance().createAnimate("res/xvn/Ball/Player.plist", "Ball_", 4, 0.1);
        var initSprite = cc.CallFunc.create(
        function () {
            this.initWithFile(s_tPlayer);
        },
        this);
        this.runAction(cc.Sequence.create(animate, initSprite));
    },
    
    updatecollision: function () {
    }
});
