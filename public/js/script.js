  function Export() {
    html2canvas(document.getElementById('example'), {
      onrendered: function (canvas) {
        var data = canvas.toDataURL();
        var docDefinition = {
          content: [{
            image: data,
            width: 500
          }]
        };
        pdfMake.createPdf(docDefinition).download("Table.pdf");
      }
    });

  }


  function ocultar(){

    $("#example thead th.opciones").hide(); 
    $("#example tbody td.opciones").hide(); 
    $("#example tfoot th.opciones").hide(); 
  }

  function mostrar(){

    $("#example thead th.opciones").show(); 
    $("#example tbody td.opciones").show(); 
    $("#example tfoot th.opciones").show(); 
  }


  function exportar_mostrar(){
    Export();
    window.setTimeout("mostrar()",1500);


  }



  function Export1() {
    html2canvas(document.getElementById('example3'), {
      onrendered: function (canvas) {
        var data = canvas.toDataURL();
        var docDefinition = {
          content: [{
            image: data,
            width: 500
          }]
        };
        pdfMake.createPdf(docDefinition).download("Table.pdf");
      }
    });

  }


  function ocultar1(){

    $("#example3 thead th.opciones").hide(); 
    $("#example3 tbody td.opciones").hide(); 
    $("#example3 tfoot th.opciones").hide(); 
  }

  function mostrar1(){

    $("#example3 thead th.opciones").show(); 
    $("#example3 tbody td.opciones").show(); 
    $("#example3 tfoot th.opciones").show(); 
  }


  function exportar_mostrar1(){
    Export1();
    window.setTimeout("mostrar1()",1500);


  }




  function Export2() {
    html2canvas(document.getElementById('example2'), {
      onrendered: function (canvas) {
        var data = canvas.toDataURL();
        var docDefinition = {
          content: [{
            image: data,
            width: 500
          }]
        };
        pdfMake.createPdf(docDefinition).download("Table.pdf");
      }
    });

  }


  function ocultar2(){

    $("#example2 thead th.opciones").hide(); 
    $("#example2 tbody td.opciones").hide(); 
    $("#example2 tfoot th.opciones").hide(); 
  }

  function mostrar1(){

    $("#example2 thead th.opciones").show(); 
    $("#example2 tbody td.opciones").show(); 
    $("#example2 tfoot th.opciones").show(); 
  }


  function exportar_mostrar2(){
    Export2();
    window.setTimeout("mostrar2()",1500);


  }