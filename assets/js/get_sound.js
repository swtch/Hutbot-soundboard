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
    var categories = [];

    $.each(data, function (index, value) {
        if (jQuery.inArray(value.category, categories ) == -1 ){
            categories.push(value.category);
        }

        $(".tiles").append("<article class='style1' id=\""+ value.name +"\" data-category=\""+ getCategoryImg(value.category) +"\" > <span class='image'> <img src='images/category/" + getCategoryImg(value.category) + ".jpg' alt='' /> </span> <a href='javascript:submit(\""+ value.name + "\");'> <h2>"+ value.name +"</h2> <div class='content'> <p> " + value.description + "</p> </div> </a> </article>");
    });

    $.each(categories, function (index, category) {
        $("#sort-category").append(" <option value=\""+ getCategoryImg(category) +"\"> "+ getCategoryImg(category) +" </option> ");
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
        $("#VoiceChannel").append(" <option value=\""+ value.id +"\">"+ value.name +"</option> ");
    });
}

function isGranted(){
    alert(arguments[0]);
    $.ajax({
        url: "http://35.156.99.232:3000/accessGranted",
        type: "get", //send it through get method
        data: {
            UserID: arguments[0]
        },
        hearders : {
            'cache-control': 'no-cache',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        dataType: "jsonp",
        success :function (data) {
            createData(data);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

