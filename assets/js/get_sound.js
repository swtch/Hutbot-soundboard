function get_sound(){
    $.ajax({
        url: getHost()+"sb",
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
        url: getHost()+"voiceChannel",
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

        $(".listSound").append("<tr class='list "+ getCategoryImg(value.category) +"'> <td> "+ value.name +"</td> <td>"+ value.description +"</td> <td>"+  getCategoryImg(value.category) +"</td> <td><a href='javascript:submit(\""+ value.name + "\");'><i class=\"fa fa-play\" aria-hidden=\"true\"></i></a></td> </tr>");
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

