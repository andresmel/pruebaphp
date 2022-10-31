class productoCtrl {
  constructor() {


  }

  getProducto() {
    var pro = new productoService();
    pro.postProductos(jsonUrl[1].apiProducto).then((data) => {
      console.log(data);
      var table = document.getElementById("tablaBd");
      for (var x = 0; x < data.length; x++) {
        var tr = document.createElement("tr");
        tr.id="id"+x;
        var td = document.createElement("td");
        td.innerHTML = data[x].id;
        td.id = "id";
        var td2 = document.createElement("td");
        td2.innerHTML = data[x].idCategoria;
        var td3 = document.createElement("td");
        td3.innerHTML = data[x].name;
        var td4 = document.createElement("td");
        td4.innerHTML = data[x].date;
        var td5 = document.createElement("td");
        td5.innerHTML = "eliminar";
        var tdconimg = document.createElement("td");
        var img=document.createElement("img");
        img.src=data[x].img;
        img.width=40;
        img.height=40;
        tdconimg.appendChild(img);
        td5.onclick = function () {
          var valores = [];
          $(this).parents("tr").find("#id").each(function () {
            valores += $(this).html();
          });
          var num=parseInt(valores);
          console.log(valores);
          var obj = {};
          obj.id = num;
          var pro = new productoService();
          pro.postEliminarPro(jsonUrl[2].apiEliminarPro, obj).then((data) => {
          location.reload();
          });
        }
        td5.style.cursor="pointer";
        var td6 = document.createElement("td");
        td6.innerHTML = "editar";
        td6.style.cursor="pointer";
        td6.onclick = function () {
       
          $(".modaleEdit").css("display","block");
          var valores = [];
          $(this).parents("tr").find("td").each(function () {
            valores.push($(this).html());
          });
          console.log(valores);
          $("#prodAct").val(valores[1]);
          $("#idAct").val(valores[0]);
          
        }
        tr.appendChild(td);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(tdconimg);
        tr.appendChild(td5);
        tr.appendChild(td6);
        table.appendChild(tr);
      }
    });
  }


  enviar(){
    var input=document.getElementById("file");
    var data = new FormData();
    for (var x = 0; x < input.files.length; x++) {
      var file = input.files[x];
     
      data.append('files', file);
    }
    console.log(data);
    var producto=document.getElementById("prod").value;
    var tipo=document.getElementById("tipo").value; 
    var pr = new productoService();
    pr.postInsertarPro(jsonUrl[3].apiInsertar,producto,tipo,data).then((data)=>{
      console.log(data);
      location.reload();
    })
  }

  act(){
    var input=document.getElementById("fileAct");
    var data = new FormData();
    var id=document.getElementById("idAct").value;
    for (var x = 0; x < input.files.length; x++) {
      var file = input.files[x];
     
      data.append('files', file);
    }
    console.log(data);
    var producto=document.getElementById("prodAct").value;
    var tipo=document.getElementById("tipoAct").value; 
    var pr = new productoService();
    pr.postActualizarPro(jsonUrl[4].apiActpro,id,producto,tipo,data).then((data)=>{
      console.log(data);
      location.reload();
    })
  }
  cancel(){
    $(".modaleEdit").css("display","none");
    
  }



}



var pr = new productoCtrl();
setTimeout(() => {
  pr.getProducto();
}, 100);
