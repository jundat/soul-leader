

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
    menuItem1: null,
    menuItem2: null,
    menuItem3: null,
    menuItem4: null,
    m_fPower: 0.0,
    isPower: false,
    _fMaxPower: 25,
    m_fPlusPower: 15,
    m_eTurn: 0, //player first, computer 2nd

    //Jundat
    nodeJSClient: null,

    m_sBG: null,
    m_ball: null,
    m_computerBall: null,
    m_player: null,
    m_computer: null,
    turnPlay : null,

    isEndGame: false,
    m_lose: null,
    m_win: null,
    //End-Jundat

    //other player call to fire
    computerFire: function (data) {
        if ((this.m_eTurn == 1) && (this.m_ball.getPosition().y <= 0)) {
            /*if (GisFirst)
                this.m_computer.fire(-1, 1, data.p);
            else
                this.m_computer.fire(1, 1, data.p);*/

            this.m_computer.fire(data.x, data.y, data.p);
            this.m_eTurn = 0;
        }
    },


    //Call ChangePosition(deltaX, deltaY)
    //if you want to change position
    //receive here
    //when other player change his position
    changeComputerPosition: function (deltaX, deltaY) {
        //your code here
        //alert('Your opponent changes position');
        var tempX = deltaX - this.m_computer.getPosition().x;
        this.m_computer.setPosition(cc.p(deltaX, deltaY));
        
    },

    //you change pos
    playerMoveX: function (_x) {
        var tempX = this.m_player.getPosition().x;
        var tempY = this.m_player.getPosition().y;
        var bonusX = tempX + _x;

        //alert(this.nodeJSClient.isPlayFirst);

        if (this.nodeJSClient.isPlayFirst == true) {
            if ((bonusX > (1366 / 2 - 150)) || (bonusX < 100)) {
                return;
            }
        }
        else {
            if ((bonusX < (1366 - (1366 / 2 - 150))) || (bonusX > (1366 - 100))) {
                return;
            }
        }
        this.m_player.setPosition(cc.p(bonusX, tempY));
        this.nodeJSClient.ChangePosition(bonusX, tempY);
    },


    changePlayerBall: function (ballType) {
        this.nodeJSClient.ChangeBallType(ballType);
    },

    //opponent change ball type
    changeComputerBall: function (ballType) {
        this.m_computerBall.changeBall(ballType);
    },



    init: function () {
        this._super(new cc.Color4B(255, 0, 0, 255));
        var size = cc.Director.getInstance().getWinSize();
        this.setTouchEnabled(true);
        this.setKeyboardEnabled(true);
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
        this.m_player.setPosition(cc.p(PLAYER_LEFT.x, PLAYER_LEFT.y));
        this.m_player.init(this.m_ball);

        var animate = FactoryAnimate.getInstance().createAnimate("res/xvn/char.plist", "Stand1_", 3, 0.4);
        this.m_player.runAction(cc.RepeatForever.create(animate));

        this.addChild(this.m_player);

        //computer
        this.m_computer = new CPlayer();
        this.m_computer.setPosition(cc.p(PLAYER_RIGHT.x, PLAYER_RIGHT.y));
        this.m_computer.init(this.m_computerBall);
        this.m_computer.setScaleX(-1);
        var animate = FactoryAnimate.getInstance().createAnimate("res/xvn/char.plist", "Stand2_", 3, 0.4);
        this.m_computer.runAction(cc.RepeatForever.create(animate));
        this.addChild(this.m_computer);

        this.m_computer.setRotationY(180);
        this.m_player.setRotationY(0);

        //heal point player label
        this.m_lPoint1 = cc.LabelTTF.create(this.m_player.m_iHP.toString(), "Arial", 38);
        this.m_lPoint1.setPosition(cc.p(335 + 130, 668 - 203));
        this.m_lPoint1.setFontFillColor(new cc.Color3B(255, 0, 0));
        this.addChild(this.m_lPoint1);

        //heal point computer label
        this.m_lPoint2 = cc.LabelTTF.create(this.m_computer.m_iHP.toString(), "Arial", 38);
        this.m_lPoint2.setPosition(cc.p(811 + 90, 668 - 203));
        this.m_lPoint2.setFontFillColor(new cc.Color3B(255, 0, 0));
        this.addChild(this.m_lPoint2);


        this.turnPlay = cc.LabelTTF.create("", "Arial", 50);
        this.turnPlay.setPosition(cc.p(size.width/2,size.height/2));
        this.turnPlay.setFontFillColor(new cc.Color3B(255, 0, 0));
        this.addChild(this.turnPlay);

        //power label
        //this.m_lPower = cc.LabelTTF.create(this.m_fPower.toString(), "Arial", 38);
        //this.m_lPower.setPosition(cc.p(size.width / 2, 500));
        //this.m_lPower.setFontFillColor(new cc.Color3B(255, 0, 0))
        //this.addChild(this.m_lPower);

        //angle label
        /*this.m_lAngle = cc.LabelTTF.create(this.m_ball.m_fAngle.toString(), "Arial", 38);
        this.m_lAngle.setPosition(cc.p(700, 670));
        this.m_lAngle.setFontFillColor(new cc.Color3B(255, 0, 0))
        this.addChild(this.m_lAngle);*/

        // Menu
        this.menuSetting();

        //load plist        
        cc.SpriteFrameCache.getInstance().addSpriteFrames("res/xvn/char.plist");
        cc.SpriteFrameCache.getInstance().addSpriteFrames("res/xvn/explosion.plist");
        /*
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
        */
        this.m_sRedPowerBar = cc.Sprite.create(s_tHealthBar);
        this.m_sRedPowerBar.setPosition(cc.p(236, 29));
        this.m_sRedPowerBar.setAnchorPoint(cc.p(0.0, 0.5));
        this.m_sRedPowerBar.setScaleY(4);
        
        this.addChild(this.m_sRedPowerBar);

        this.m_sHealthBar1 = cc.Sprite.create(s_tHealthBar);
        this.m_sHealthBar1.setPosition(cc.p(250 - 100, 668 - 25));
        this.m_sHealthBar1.setAnchorPoint(cc.p(0.0, 0.5));
        this.m_sHealthBar1.setScaleY(5);

        this.m_sHealthBar2 = cc.Sprite.create(s_tHealthBar);
        this.m_sHealthBar2.setPosition(cc.p(1116 - 100, 668 - 25));
        this.m_sHealthBar2.setAnchorPoint(cc.p(0.0, 0.5));
        this.m_sHealthBar2.setScaleY(5);

        this.addChild(this.m_sHealthBar1);
        this.addChild(this.m_sHealthBar2);

        this.menuItem1.setPosition(cc.p(110, 668 - 630));
        this.menuItem2.setPosition(cc.p(190, 668 - 630));


        this.m_lose = cc.Sprite.create(s_tLose);
        this.m_lose.setPosition(cc.p(size.width / 2, size.height / 2));
        this.m_lose.setAnchorPoint(cc.p(0.5, 0.5));
        this.addChild(this.m_lose, 2);
        this.m_win = cc.Sprite.create(s_tWin);
        this.m_win.setPosition(cc.p(size.width / 2, size.height / 2));
        this.m_win.setAnchorPoint(cc.p(0.5, 0.5));
        this.addChild(this.m_win, 2);
        this.m_lose.setVisible(false);
        this.m_win.setVisible(false);

        //NODE JS
        this.nodeJSClient = new NodeJSClient(this);

        this.nodeJSClient.connectSuccessHandler = function () {
            this.CreateRandomMatch();
        };


        this.nodeJSClient.Connect('127.0.0.1', 5000);

        //END - NODE JS



        return true;
    },

    menuSetting: function () {
        this.menuItem1 = cc.MenuItemImage.create(
            s_tBall,
            s_tBallSelected,
            function () {
                Log("change ball type: " + Enum.EBall.Blue);
                this.m_ball.changeBall(Enum.EBall.Blue);
                this.changePlayerBall(Enum.EBall.Blue);
            },
            this);
        this.menuItem2 = cc.MenuItemImage.create(
            s_tBall,
            s_tBallSelected,
            function () {
                Log("change ball type: " + Enum.EBall.Green);
                this.m_ball.changeBall(Enum.EBall.Green);
                this.changePlayerBall(Enum.EBall.Green);
            },
            this);
        this.menuItem3 = cc.MenuItemImage.create(
            s_tBall,
            s_tBallSelected,
            function () {
                Log("change ball type: " + Enum.EBall.Red);
                this.m_ball.changeBall(Enum.EBall.Red);
                this.changePlayerBall(Enum.EBall.Red);
            },
            this);
        this.menuItem4 = cc.MenuItemImage.create(
            s_tBall,
            s_tBallSelected,
            function () {
                Log("change ball type: " + Enum.EBall.Yellow);
                this.m_ball.changeBall(Enum.EBall.Yellow);
                this.changePlayerBall(Enum.EBall.Yellow);
            },
            this);

        this.menuItem1.setAnchorPoint(cc.p(0.5, 0.5));
        this.menuItem2.setAnchorPoint(cc.p(0.5, 0.5));
        this.menuItem3.setAnchorPoint(cc.p(0.5, 0.5));
        this.menuItem4.setAnchorPoint(cc.p(0.5, 0.5));


        this.menuItem1.setPosition(cc.p(1117, 668 - 93));
        this.menuItem2.setPosition(cc.p(1192, 668 - 93));
        this.menuItem3.setPosition(cc.p(1117, 668 - 167));
        this.menuItem4.setPosition(cc.p(1192, 668 - 167));

        var menu = cc.Menu.create(this.menuItem1, this.menuItem2, this.menuItem3, this.menuItem4);
        //var menu = cc.Menu.create(menuItem1, menuItem2, menuItem3, menuItem4);
        menu.setPosition(cc.PointZero());
        /*if (this.nodeJSClient.isPlayFirst == true) {
            menuItem1.setPosition(cc.p(110, 668 - 630));
            menuItem2.setPosition(cc.p(190, 668 - 630));
        }
        else {
            menuItem1.setPosition(cc.p(1180, 668 - 630));
            menuItem2.setPosition(cc.p(1260, 668 - 630));
        }*/
        this.addChild(menu, 1);
    },

    update: function (dt) {
        document.getElementById("gameCanvas").focus();

        if (this.m_player.m_iHP <= 0)
        {
            this.m_lose.setVisible(true);
            this.isEndGame = true;
        }

        if (this.m_computer.m_iHP <= 0)
        {
            this.m_win.setVisible(true);
            this.isEndGame = true;
        }
        if (this.isEndGame == true)
            return;

        this.m_player.updateCollision(this.m_computerBall);
        this.m_computer.updateCollision(this.m_ball);

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
        //this.m_sRedPowerBar.setPercentage(this.m_fPower * 50 / this._fMaxPower);
        this.m_sRedPowerBar.setScaleX(this.m_fPower * 1.8);
        this.m_sHealthBar1.setScaleX(this.m_player.m_iHP);
        this.m_sHealthBar2.setScaleX(this.m_computer.m_iHP);
        //this.m_lPower.setString("power : " + this.m_fPower.toFixed(2).toString());
        this.m_lPoint1.setString("Hp : " + this.m_player.m_iHP.toString());
        this.m_lPoint2.setString("Hp : " + this.m_computer.m_iHP.toString());

        //this.m_lAngle.setString("Angle : " + this.m_ball.m_fAngle.toFixed(0).toString());

        if (this.m_computer.m_iHP <= 0)
            this.nodeJSClient.SendMatchResult();
    },

    onTouchesBegan: function (touches, event) {
        if (this.turnPlay.isVisible)
            this.turnPlay.setVisible(false);
        if (this.isEndGame == true)
        {
            cc.Director.getInstance().replaceScene(new MenuScene());
        }
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
            /*if (GisFirst)
                this.m_player.fire(1, 1, this.m_fPower);
            else
                this.m_player.fire(-1, 1, this.m_fPower);*/
            this.m_player.fire(location.x, location.y, this.m_fPower);

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            this.nodeJSClient.Fire({ x: location.x, y: location.y, p: this.m_fPower });

            // goi 1 ham, hàm nay tien hanh truyen location, m_fPower, truyen co va cham hay k, neu co truyen pos va cham

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            this.m_eTurn = 1;
        }

        this.m_fPower = 0;
        this.isPower = false;
    },

    onKeyUp: function (e) {

    },
    onKeyDown: function (e) {
        if (e === cc.KEY.left) {
            if (this.m_eTurn == 0) {

                this.playerMoveX(-10);
                //this.m_player.setRotationY(180);
            }
        }
        else if (e === cc.KEY.right) {
            if (this.m_eTurn == 0) {

                this.playerMoveX(10);
                //this.m_player.setRotationY(0);
            }
        }
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

