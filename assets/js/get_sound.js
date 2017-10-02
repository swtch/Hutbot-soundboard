function get_sound(){
    $.ajax({
        url: 'http://35.156.99.232:3000/sb',
        hearders : {
            'cache-control': 'no-cache',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: 'get',
        dataType: "jsonp",
        success :function (data) {
            createData(data);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function getVoiceChannels(){
    $.ajax({
        url: 'http://35.156.99.232:3000/voiceChannel',
        hearders : {
            'cache-control': 'no-cache',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: 'get',
        dataType: "jsonp",
        success :function (data) {
            createVoiceChannels(data);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}


function createData(data){

    var voiceChannels =  getVoiceChannels();

    $.each(data, function (index, value) {

        $(".tiles").append("<article class='style1'> <span class='image'> <img src='images/category/" + getCategoryImg(value.category) + ".jpg' alt='' /> </span> <a href='javascript:submit(\""+ value.name + "\");'> <h2>"+ value.name +"</h2> <div class='content'> <p> " + value.description + "</p> </div> </a> </article>");
    });


}

function getCategoryImg(category) {

    category = category.replace('[', '');
    category = category.replace(']', '');

    return category;
}

function createVoiceChannels(data)
{
    $.each(data, function (index, value) {
        $("#VoiceChannel").append(" <option value=\""+ value.id +"\"> "+ value.name +" </option> ");
    });
}

