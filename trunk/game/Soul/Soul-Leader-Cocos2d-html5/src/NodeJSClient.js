
function NodeJSClient() {

    //connect socket
    this.socket = null;


    //username of this user
    this.username = null;

    /*
        {
            username: username,
            password: password,
            gender: gender,
            coin: coin
        }
    */
    this.user = null;

    
    /*
        {
            matchId: matchId,
            mapId: mapId,
            turn: turn,
            players: [
                {
                    username: username0,
                    gender: gender0,
                    coin: coin0
                },
                {
                    username: username1,
                    gender: gender1,
                    coin: coin1
                }
            ],
            status: [
                {
                    position: position0,
                    direction: direction0
                    angle: angle0
                },{
                    position: position1,
                    direction: direction1,
                    angle: angle1           
                }
            ]
        }
    */
    this.match = null;

    /*
        {
            position: position0,
            direction: direction0
            angle: angle0
        }
    */
    this.matchStatus = null;
    

    //Connect to NodeJS server
    //ip: string, default = 127.0.0.1
    //port: integer, default = 5000
    this.Connect = function (ip, port) {
        if (ip == undefined) ip = '127.0.0.1';
        if (port == undefined) port = 5000;

        var strConnect = ip + ':' + port;
        socket = io.connect(strConnect);
    };


    //Add a handler to handle an event
    //eventName: string, Ex: 'SendData'
    //handler: function, receive data, with 1 argument as a object, Ex: handler(data)
    this.AddHandler = function (eventName, handler) {
        this.socket.on(eventName, handler);
    };


    //Send a object to server
    //eventName: string, name of event, Ex: 'Fire'
    //data: object, contain data you want to send to server
    this.SendData = function (eventName, data) {
        this.socket.emit(eventName, data);
    };


    //Init all default handler
    this.Init = function () {

    };
};


