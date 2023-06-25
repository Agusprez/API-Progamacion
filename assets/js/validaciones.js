//Sabiendo el input del formulario y que solo tiene espacios en blanco, colorea con rojo al borde, mientras que si tiene texto valido, lo colorea con verde
function colorearCampos(valorID) {
  let valor = $.trim($(valorID).val());
  $(valorID).css("border-color", valor == "" ? "red" : "green");
}
$("#categoria_nombre").on("input", () => { colorearCampos("#categoria_nombre") });
$("#producto_nombre").on("input", () => { colorearCampos($("#producto_nombre")) });
$("#producto_descripcion").on("input", () => { colorearCampos("#producto_descripcion") });
$("#producto_precio").on("input", () => { colorearCampos("#producto_precio") });

// Monitorear cuando se intenta postear cada uno de los formularios
// Realizar una validacion de los campos, si uno o mas de los campos estan vacios, mostrar un alerta nombrando dichos campos y debajo de dichos campos, tu nombre y apellido
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
$("form#form_alta_producto").on("submit", function () {
  let nombre = $.trim($("#producto_nombre").val());
  let descripcion = $.trim($("#producto_descripcion").val());
  let precio = $.trim($("#producto_precio").val());
  let categoria = $("#producto_categoria").val();
  let imagen = $("#producto_imagen").val();
  let error = [];
  if (nombre == "") {
    error.push("Por favor, cargue el nombre para su producto.");
  }
  if (descripcion == "") {
    error.push("Por favor, cargue una descripción para su producto.");
  }
  if (precio == "") {
    error.push("Por favor, cargue el precio para su producto.");
  }
  if (categoria == "" || categoria == null) {
    error.push("Por favor, seleccione una categoría para su producto.");
  }
  if (imagen == "") {
    error.push("Por favor, elija una imagen para su producto.");
  }
  if (error.length > 0) {
    alert(error.join("\n"));
    return false;
  }
  return true;
});
