$(window).load(function()
{
   var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-##############"}];
    $('#phonenumbertextbox').inputmask({ 
        mask: phones, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
});