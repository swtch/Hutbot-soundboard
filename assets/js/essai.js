function submit(sound){
    $.ajax({
        url: 'http://35.156.99.232:3000/play',
        hearders : {
            'cache-control': 'no-cache',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: 'post',
        data: { "voiceChannel": $('#VoiceChannel :selected').val(),
            "sound": sound
        },
        success: function(response) { alert(response); }
    });
}