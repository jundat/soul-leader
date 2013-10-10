


function Enum() { }
Enum.ETurn = {
    Player: 0,
    Computer: 1
}
Enum.EBall = {
    Blue: 0,
    Green: 1,
    Red: 2,
    Yellow: 3
}


var MainGame = cc.LayerColor.extend({
    m_fPower: 0.0,
    isPower: false,
    _fMaxPower: 25,
    m_fPlusPower: 15,
    m_eTurn: 0,
    
    //Jundat

    m_sBG: null,
    m_ball: null,
    m_computerBall: null,
    m_player: null,
    m_computer: null,

    //End-Jundat


    OnReceiveData: function (data) {
        console.log('Receive Data', data);

        //if ((this.m_eTurn == 1) && (this.m_ball.getPosition().y <= 0)) {
        this.m_computer.fire(data.x, data.y, data.p);
        
        //    this.m_eTurn = 0;
        //}

        /////////////////////////////////////////////////////////////////////////
    },

    SendData: function (data) {
        //alert('send data', data);
        console.log('Send data', data);
        socket.emit('SendData', data);
    },

    init: function () {
        this._super(new cc.Color4B(255, 0, 0, 255));
        var size = cc.Director.getInstance().getWinSize();
        this.setTouchEnabled(true);
        this.schedule(this.update);

        //background
        this.m_sBG = cc.Sprite.create(s_tBackground);
        this.m_sBG.setPosition(cc.p(size.width / 2, size.height / 2));
        this.m_sBG.setAnchorPoint(cc.p(0.5, 0.5));
        this.addChild(this.m_sBG);

        //ball
        this.m_ball = new CBall();
        this.addChild(this.m_ball);

        //computer ball
        this.m_computerBall = new CBall();
        this.addChild(this.m_computerBall);


        //player
        this.m_player = new CPlayer();
        this.m_player.setPosition(cc.p(200, 100));
        this.m_player.init(this.m_ball);
        this.addChild(this.m_player);

        //computer
        this.m_computer = new Computer();
        this.m_computer.setPosition(cc.p(1100, 100));
        this.m_computer.init(this.m_computerBall);
        this.m_computer.setScaleX(-1);

        g_computer = this.m_computer;

        this.addChild(this.m_computer);

        //heal point player label
        this.m_lPoint1 = cc.LabelTTF.create(this.m_player.m_iHP.toString(), "Arial", 38);
        this.m_lPoint1.setPosition(cc.p(200, 500));
        this.m_lPoint1.setFontFillColor(new cc.Color3B(255, 0, 0))
        this.addChild(this.m_lPoint1);

        //heal point computer label
        this.m_lPoint2 = cc.LabelTTF.create(this.m_computer.m_iHP.toString(), "Arial", 38);
        this.m_lPoint2.setPosition(cc.p(1100, 500));
        this.m_lPoint2.setFontFillColor(new cc.Color3B(255, 0, 0))
        this.addChild(this.m_lPoint2);

        //power label
        this.m_lPower = cc.LabelTTF.create(this.m_fPower.toString(), "Arial", 38);
        this.m_lPower.setPosition(cc.p(size.width / 2, 500));
        this.m_lPower.setFontFillColor(new cc.Color3B(255, 0, 0))
        this.addChild(this.m_lPower);

        //angle label
        this.m_lAngle = cc.LabelTTF.create(this.m_ball.m_fAngle.toString(), "Arial", 38);
        this.m_lAngle.setPosition(cc.p(700, 670));
        this.m_lAngle.setFontFillColor(new cc.Color3B(255, 0, 0))
        this.addChild(this.m_lAngle);

        // Menu
        this.menuSetting();

        //load plist        
        cc.SpriteFrameCache.getInstance().addSpriteFrames("res/xvn/Ball/Player.plist");
        cc.SpriteFrameCache.getInstance().addSpriteFrames("res/xvn/explosion.plist");

        var _sBluePowerBar = cc.Sprite.create(s_tPowerBar);
        _sBluePowerBar.setScale(0.25);
        _sBluePowerBar.setScaleX(-0.25);
        _sBluePowerBar.setPosition(cc.p(300, 300));
        this.addChild(_sBluePowerBar);


        var p = cc.Sprite.create(s_tPowerBar2);
        this.m_sRedPowerBar = cc.ProgressTimer.create(p);
        this.m_sRedPowerBar.setType(cc.PROGRESS_TIMER_TYPE_RADIAL);
        this.m_sRedPowerBar.setReverseDirection(true);
        this.m_sRedPowerBar.setScale(0.25);
        this.m_sRedPowerBar.setScaleX(-0.25);
        this.m_sRedPowerBar.setPercentage(0);
        this.m_sRedPowerBar.setPosition(cc.p(300, 300));
        this.addChild(this.m_sRedPowerBar);

        this.m_sHealthBar1 = cc.Sprite.create(s_tHealthBar);
        this.m_sHealthBar1.setPosition(cc.p(130, 470));
        this.m_sHealthBar1.setAnchorPoint(cc.p(0.0, 0.5));
        this.m_sHealthBar1.setScaleY(5);

        this.m_sHealthBar2 = cc.Sprite.create(s_tHealthBar);
        this.m_sHealthBar2.setPosition(cc.p(1020, 470));
        this.m_sHealthBar2.setAnchorPoint(cc.p(0.0, 0.5));
        this.m_sHealthBar2.setScaleY(5);

        this.addChild(this.m_sHealthBar1);
        this.addChild(this.m_sHealthBar2);


        //NODE JS
        socket.on('SendData', this.OnReceiveData);


        //END - NODE JS


        return true;
    },

    menuSetting: function () {
        var menuItem1 = cc.MenuItemImage.create(
            s_tBallBlue,
            s_tBallBlueSelected,
            function () {
                this.m_ball.changeBall(Enum.EBall.Blue);
            },
            this);
        var menuItem2 = cc.MenuItemImage.create(
            s_tBallGreen,
            s_tBallGreenSelected,
            function () {
                this.m_ball.changeBall(Enum.EBall.Green);
            },
            this);
        var menuItem3 = cc.MenuItemImage.create(
            s_tBallRed,
            s_tBallRedSelected,
            function () {
                this.m_ball.changeBall(Enum.EBall.Red);
            },
            this);
        var menuItem4 = cc.MenuItemImage.create(
            s_tBallYellow,
            s_tBallYellowSelected,
            function () {
                this.m_ball.changeBall(Enum.EBall.Yellow);
            },
            this);

        menuItem1.setAnchorPoint(cc.p(0.5, 0.5));
        menuItem2.setAnchorPoint(cc.p(0.5, 0.5));
        menuItem3.setAnchorPoint(cc.p(0.5, 0.5));
        menuItem4.setAnchorPoint(cc.p(0.5, 0.5));

        var menu = cc.Menu.create(menuItem1, menuItem2, menuItem3, menuItem4);
        menu.setPosition(cc.PointZero());
        menuItem1.setPosition(cc.p(200, 300));
        menuItem2.setPosition(cc.p(400, 300));
        menuItem3.setPosition(cc.p(600, 300));
        menuItem4.setPosition(cc.p(800, 300));

        this.addChild(menu, 1);
    },

    update: function (dt) {
        this.m_player.updateCollision(this.m_computerBall);
        //this.m_computer.updateCollision();

//         if ((this.m_eTurn == 1) && (this.m_ball.getPosition().y <= 0)) {
//             this.m_computer.fire(300, 300, 20);
//             this.m_eTurn = 0;
//         }


        this.m_ball.update(dt);
        this.m_computerBall.update(dt);

        if (this.isPower)
            this.m_fPower += this.m_fPlusPower * dt;
        if (this.m_fPower >= this._fMaxPower) {
            this.m_fPower = this._fMaxPower;
            this.m_fPlusPower = -this.m_fPlusPower;
        }
        if (this.m_fPower < 0) {
            this.m_fPower = 0;
            this.m_fPlusPower = -this.m_fPlusPower;
        }
        this.m_sRedPowerBar.setPercentage(this.m_fPower * 50 / this._fMaxPower);
        this.m_sHealthBar1.setScaleX(this.m_player.m_iHP);
        this.m_sHealthBar2.setScaleX(this.m_computer.m_iHP);
        this.m_lPower.setString("power : " + this.m_fPower.toFixed(2).toString());
        this.m_lPoint1.setString("Hp1 : " + this.m_player.m_iHP.toString());
        this.m_lPoint2.setString("Hp2 : " + this.m_computer.m_iHP.toString());
        
        this.m_lAngle.setString("Angle : " + this.m_ball.m_fAngle.toFixed(0).toString());
    },
    onTouchesBegan: function (touches, event) {
        if (this.m_computerBall.m_enabled == true || this.m_ball.m_enabled == true)
            return;
        this.isPower = true;
    },

    onTouchesEnded: function (touches, event) {
        if (touches[0] == null)
            return;
        if (!this.isPower)
            return;
        var location = touches[0].getLocation();
        if (this.m_eTurn == 0) {
            this.m_player.fire(location.x, location.y, this.m_fPower);

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            console.log('Fire');
            this.SendData({ x: location.x, y: location.y, p: this.m_fPower });

            // goi 1 ham, hàm nay tien hanh truyen location, m_fPower, truyen co va cham hay k, neu co truyen pos va cham

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //this.m_eTurn = 1;
        }

        this.m_fPower = 0;
        this.isPower = false;
    }
});

var MainGameScene = cc.Scene.extend({
    onEnter: function () {
        this._super();
        var layer = new MainGame();
        layer.init();
        layer.setTag(0);
        this.addChild(layer);
    }
});

