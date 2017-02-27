$(document).ready(function(){
    $('.button-permute').on('click', function(e){
        e.preventDefault();
        if($('#text-input').val() == ""){
            $('.output').html('Please insert a value.');
            return;
        }
        sendPermRequest($('#text-input').val());
        
        return false;
    });
})

function sendPermRequest (input) {
    $.ajax({
        url:"index.php",   
        method: "POST",
        data: $("#input").serialize(),
        dataType : "JSON",
        success : function(data){
            var permutations = [];
            $.each(data, function(k,v){
                permutations.push(v);
                console.log(k, v);
            });
            $('.output').html("<span class='caret'>></span>" + permutations.join(", "))
        },
        error : function(error){
            $('.output').html('There was a problem. Please try again. <br><br> <span class="error">More information: <br>' + error.status + " : " + error.statusText + "</span>");
        },
        
    })
}

