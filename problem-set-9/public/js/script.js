$(document).ready(function() {
    $('#add-glyph').click(function() {
        if($('#addform').hasClass('hidden')){
            $('#addform').removeClass('hidden');
            $('#editform').addClass('hidden'); 
            $('#deleteform').addClass('hidden');
        } else{
            $('#addform').addClass('hidden');
        }      
    });
    
    $('#canceladd').click(function() {
        $('#addform').addClass('hidden');    
    });
    
    $('#canceledit').click(function() {
        $('#editform').addClass('hidden');    
    });
    
    $('#canceldelete').click(function() {
        $('#deleteform').addClass('hidden');    
    });
});
