function checkifempty()
{
    if (!document.formaRegistro.terminosYCondiciones.checked)
  {
    document.formaRegistro.botonRegistrar.disabled=true;
  }
    else
  {     
    document.formaRegistro.botonRegistrar.disabled=false;
  }
 
}