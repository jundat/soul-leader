function Enum() { }
Enum.EBall = {
    Blue: 0,
    Green: 1,
    Red: 2,
    Yellow: 3
}
var CComputerBall = cc.Sprite.extend({
    m_fSpeed: null,
    m_fDam: 1,
    m_fAngle: 0,
    m_eType: Enum.EBall.Blue,
    m_enabled : false,
    ctor: function () {
        this._super();
        this.initWithFile(s_tBallBlue);
        this.setVisible(false);
        this.setAnchorPoint(cc.p(0.5, 0.5));
        this.m_fSpeed = cc.p(0, 0);
        return true;
    },

    set: function (startX, startY, directionX, directionY, distance, power) {
        this.m_fSpeed.x = directionX * power;
        this.m_fSpeed.y = directionY * power;
        this.setPosition(cc.p(startX, startY));
        this.m_enabled = true;
    },
    
    update: function (dt) {
        if (!this.m_enabled)
            return;

        var x = this.getPosition().x;
        var y = this.getPosition().y;

        if (y <= 0 - this.getBoundingBox().height) {
            this.m_enabled = false;
            return;
        }

        this.setPosition(cc.p(x + this.m_fSpeed.x, y + this.m_fSpeed.y));
        this.m_fSpeed.y -= 0.4;
        this.m_fAngle = Math.atan2(this.m_fSpeed.x, this.m_fSpeed.y);
        this.m_fAngle *= 180 / 3.14;
        this.setRotation(this.m_fAngle);
    },

    changeBall: function (type) {
        switch (type) {
            case Enum.EBall.Blue:
                m_eType = type;
                this.initWithFile(s_tBallBlue);
                this.m_fDam = 1;
                break;
            case Enum.EBall.Green:
                m_eType = type;
                this.initWithFile(s_tBallGreen);
                this.m_fDam = 2;
                break;
            case Enum.EBall.Red:
                m_eType = type;
                this.initWithFile(s_tBallRed);
                this.m_fDam = 3;
                break;
            case Enum.EBall.Yellow:
                m_eType = type;
                this.initWithFile(s_tBallYellow);
                this.m_fDam = 4;
                break;
        }
    }
});