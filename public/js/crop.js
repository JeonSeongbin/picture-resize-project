// Crop obj
var select_image;

$(document).ready(function(){
    initialize_crop();
});

function initialize_crop(){
    $('#target').Jcrop({
        onChange: showCoords,
        onSelect: showCoords,
    }, function(){
        select_image = this;
    });
}

function showCoords(c){
    $('#x').val( typeof(c) == "object" ? c.x : 0 );
    $('#y').val( typeof(c) == "object" ? c.y : 0 );
    $('#w').val( typeof(c) == "object" ? c.w : 0 );
    $('#h').val( typeof(c) == "object" ? c.h : 0 );

    showPreview(c);
};

function showPreview(coords){
    var rx = 100 / coords.w;
    var ry = 100 / coords.h;

    $('#preview').css({
        width: Math.round(rx * 500) + 'px',
        height: Math.round(ry * 370) + 'px',
        marginLeft: '-' + Math.round(rx * coords.x) + 'px',
        marginTop: '-' + Math.round(ry * coords.y) + 'px'
    });
}

function deselect(){
    // Clear image attribute text box
    showCoords(0);
    // Crop destroy
    select_image.destroy();
    // Crop initialize
    initialize_crop();
    // Hidden preview
    $('#previewFlg').css('display', 'none');
}

function select(){
    showPreview(select_image);
    // Show preview
    $('#previewFlg').css('display', 'block');
}
