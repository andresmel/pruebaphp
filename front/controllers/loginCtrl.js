class loginCtrl {

    user;
    pass;

    constructor() {
        this.user = document.getElementById("user");
        this.pass = document.getElementById("pass");
    }

    enviarCtrl() {
        var ser = new loginService();
        var obj = {};
        obj.usuario = this.user.value;
        obj.pass = this.pass.value;
        ser.postData(jsonUrl[0].apiLogin, obj)
            .then((data) => {
                console.log(data);
                if (data.Res) {
                    alert("ok");
                    location.href="producto.html";
                } else {
                    alert("no Existe el Usuario");
                }
            });
    }

    registro(){
      location.href="registro";
    }


}
var login = new loginCtrl();
