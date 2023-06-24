// Monitorear cuando se intenta postear cada uno de los formularios
// Realizar una validacion de los campos, si uno o mas de los campos estan vacios, mostrar un alerta nombrando dichos campos y debajo de dichos campos, tu nombre y apellido


//Sabiendo el input del formulario y que solo tiene espacios en blanco, lo colorea con rojo al borde, mientras que si tiene texto valido, lo colorea con verde

$("#categoria_nombre").on("input", () => {
  let nombre = $.trim($("#categoria_nombre").val());
  $("#categoria_nombre").css("border-color", nombre == "" ? "red" : "green");
});


$("form#form_alta_categoria").on("submit", function () {
  let nombre = $.trim($("#categoria_nombre").val());
  let error = [];

  if (nombre == "") {
    error.push("Por favor, complete correctamente el nombre de la categoria");
  }
  if (error.length > 0) {
    alert(error.join("/n"));
    return false;
  }
  return true
});